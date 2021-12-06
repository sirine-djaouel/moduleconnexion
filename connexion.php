<?php

session_start();

$connect = mysqli_connect("localhost","root","","moduleconnexion");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
            <link href="https://fonts.googleapis.com/css2?family=Maitree:wght@300&display=swap" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Connexion</title>
</head>
<body>
<?php require "header.php"; ?>

<section class="login">
		<div class="login_box">
			<div class="left">
				<div class="top_link"><a href="index.php"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Return home</a></div>
				<div class="contact"> 
                    <form method="post" action="">
                        <h3>Connectez-vous</h3>
                        <input type=text name="login" placeholder="Identifiant" required ><br>
                        <input type=password name="password" placeholder="Mot de passe" required ><br>
                        <button class=submit value="Envoyer" name="env">Envoyer</button>
                        <?php
                        if(isset($_POST['login']) && isset($_POST['password'])&& !empty($_POST['login']) && !empty($_POST['password'])){

                            $login=$_POST['login'];
                            $password=$_POST['password'];
                            $sql=mysqli_query ($connect,"SELECT * FROM utilisateurs WHERE login='$login'");
                            $res= mysqli_fetch_all($sql); 
                            
                            if (empty($res)) {
                                echo 'Votre mot de passe et/ou votre identifiant sont faux';
                            }
                            else {
                                if($res[0][4] == $password){
                                    if ( $login == 'admin'){
                                        
										$_SESSION["id"] = $res[0][0];
                                        header ("refresh:4;url=admin.php");
										echo 'Merci de patienter';
                            
                                    }else {
                                        
                                        echo 'Hello '. $res[0][2]. ' !' .' Vous allez être redirigé vers votre page profil';
                                        $_SESSION["id"] = $res[0][0];
                                        header ("refresh:4;url=profil.php");
                        
                                        
                                    }
                                }else {
                                    echo "Votre mot de passe et/ou votre identifiant sont faux";
                                }
                            }                        
                        }
                        ?>  
            
                    </form></br></br></br></br>
                </div>
			</div>
			<div class="right">
				
				<div class="right-inductor"><img src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft" alt=""></div>
			</div>
		</div>
	</section>
        
     <?php require "footer.php"; ?>


</body>
</html>