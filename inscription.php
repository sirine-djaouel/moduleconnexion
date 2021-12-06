<?php
session_start();
?>

<!DOCTYPE html>
<html lang="Fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Maitree:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Inscription</title>
</head>
    <body>
    <?php require "header.php"; ?>
  <section class=signup>
    <div class=signup_box>
      <div class=lefty>
        <div class="righty-inductor"><img src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft" alt=""></div>
      </div>
      <div class="righty">
        <div class="contacty">
          <form action="inscription.php" method="POST" class="formulaire">
          <div class="topy_link"><a href="index.php"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Return home</a></div>
            <h2>Inscription</h2>
            <input type="text" name="login" placeholder="Identifiant">
            <input name="prenom" type="text" placeholder="Prenom" />
            <input name="nom" type="text" placeholder="Nom" />
            <input type="password" name="password" placeholder="Mot de passe">
            <input type="password" name="confpw" placeholder="Confirmation Mot de passe">
            <button class=submit value="S'inscrire" name="inscription">S'inscrire</button>
            <p class="message">Tu as déjà un compte ?<a href="connexion.php">Par ici !</a></p>
            <?php
            $bdd = mysqli_connect("localhost","root","","moduleconnexion");
            if (isset($_SESSION['login']) == false)
            {
              
                if (isset($_POST['inscription']) && !empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['confpw']) && !empty($_POST['nom']) && !empty($_POST['prenom']))
                {
                  
                    	$login = $_POST['login'];
                    	$mdp = $_POST['password'];
					            $nom = $_POST['nom'];
					            $prenom = $_POST['prenom'];
					            $password = $_POST['password'];
					            $conf = $_POST['confpw'];
                   		$checklogin = "SELECT login FROM utilisateurs WHERE login = '$login'";
                    	$query = mysqli_query($bdd, $checklogin);
                    	$veriflogin = mysqli_fetch_all($query);

                    if (empty($veriflogin))
                    {
                        if ($_POST['password'] == $_POST['confpw'])
                        {
                           
                            $ajoutbdd = 'INSERT INTO utilisateurs (login, prenom, nom, password) VALUES ("'.$login.'", "'.$prenom.'", 									"'.$nom.'", "'.$password.'")';
                            $ajout = mysqli_query($bdd, $ajoutbdd);
							echo '<p style="color:#3895D3;">Bienvenue ! Veuillez vous connecter pour accéder à votre profil.</p>';
							header('Location:connexion.php');
							
                        }
						 
                        else
                        {
                           echo '<p style="color:#ff0000;">La mot de passe et sa confirmation ne sont pas semblable. Réessayez.</p>';
                        }
                    }

                    
                    else
                    {   
                        echo '<p style="color:#ff0000;">login pas disponible, trouvez-en un autre.</p>';
                    }
                }
				
                mysqli_close($bdd);
            }
         
                
        ?>
            
            
      
            </form>
  

        </div>
      </div>
    </div>
  </section>

  <?php require "footer.php"; ?>

    </body>
</html>