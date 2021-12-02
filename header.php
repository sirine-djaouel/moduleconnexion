

<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="style.css">
           
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Maitree:wght@300&display=swap" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <title>Accueil</title>
        </head>

        <body>

            <!-- Debut de Navigation-->

            <nav>
                <label for="menu-mobile" class="menu-mobile">Menu</label>
                    <input type="checkbox" id="menu-mobile" role="bouton">
                    <ul class=menu>
                        <li class="menu-mon-compte"><a href="#"><img src="icon.png" alt="Mon compte">&ensp;</a>
                            <ul class="submenu">
                                <?php
                                if(isset($_SESSION["id"]))
                                {
                                    echo "<li><a href='crash.php'>Déconnexion</a></li>";
                                   echo "<li><a href='profil.php'>Profil</a></li>";
                                }
                                else{
                                    echo "<li><a href='connexion.php'>Connexion</a></li>";
                                    echo "<li><a href='inscription.php'>Inscription</a></li>";
                                }

                                ?>                               
                            </ul>
                        </li>

                        <li class="menu-recettes"><a href="#"><img src="recipe.png" alt="Les recettes"></a>
                            <ul class="submenu">
                                <li><a href="#">Entrée</a></li>
                                <li><a href="#">Plat</a></li>
                                <li><a href="#">Dessert</a></li>
                            </ul>
                        </li>

                        <li class="menu-a-propos"><a href="#"><img src="contact.png" alt="Contactez-nous"></a>
                        </li>
                    </ul>
            </nav>
	
            <!-- Fin de Navigation -->
        </body>
</html>