<?php

session_start();
$id = $_SESSION["id"];
$bdd = mysqli_connect("localhost","root","","moduleconnexion");

$req= mysqli_query($bdd,"SELECT * FROM utilisateurs WHERE id = $id");

$res= mysqli_fetch_all($req,MYSQLI_ASSOC);

$login = $res[0]['login'];
$prenom = $res[0]['prenom'];
$nom = $res[0]['nom'];
$password = $res[0]['password']; 


if (isset($_POST['env']))
{

   
    $nom1 = $_POST['nom'];
    $prenom1 = $_POST['prenom'];
    $password1 = $_POST['password'];
    $login1 = $_POST['login'];
    if ( $login1 == 'admin'){
        
        echo 'Vous ne pouvez pas choisir ce login';

    }else {
        
        echo 'Modifications effectuées avec succès';
        $req2= mysqli_query($bdd,"UPDATE utilisateurs SET login='$login1', prenom='$prenom1', nom='$nom1', password='$password1' WHERE  id = $id ");
        header("Location: profil.php");
    }

} 

 
 




?>

<!DOCTYPE html>
<html lang="Fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>site</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Maitree:wght@300&display=swap" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
    <body class=profil>
    <?php require "header.php"; ?>


    <section class="Modifpro">
		<div class="Modifpro_box">
			<div class="Modifpro_left">
				<div class="top_link"><a href="index.php"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Return home</a></div>
				<div class="Modifpro_contact"> 
            <form name="formu" action="" method="post">
            <h1>Modifiez votre profil<h1>                
                <label for="login">Identifiant</label>
                <input id="login" name="login" value="<?php echo $login?>" type="text" placeholder="Identifiant"/> <br>
                <label for="prenom">Prenom</label>
                <input name="prenom" value="<?php echo $prenom?>" type="text" placeholder="Prenom" /><br>
                <label for="nom">Nom</label>
                <input name="nom" value="<?php echo $nom?>" type="text" placeholder="Nom" /><br>
                <label for="password">Password</label>
                <input name="password" value="<?php echo $password?>" type="password" placeholder="Mot de passe"/><br>
                <button class=submit value="Envoyer" name="env">Envoyer</button>
                
                

            </form>


            </div>
			</div>
		</div>
	</section>

<?php require "footer.php"; ?>
    </body>
</html>

