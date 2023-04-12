<?php
require_once "connect.php";
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['user'])) {
    echo "";
} 

if (isset($_POST['deconnexion'])) {
    unset($_SESSION['id']);
    header('Location: login.php');
    $erreur = "Vous avez bien été déconnecté de votre session admin";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="header.css">
    <title>Document</title>
</head>
<body>  
<header>
    <div class="blockGlobal">
        <div class="blockContenair">
            <div class="title"><h1>BOOK'S</h1></div>
            <div class="search"> 
                <form action="" method="post">
                    <label for="motcle"></label>
                    <input type="text" id="motcle" name="motcle" placeholder="Recherche...">
                    <button type="submit" name="Rechercher"><img src="assets/chercher.png" alt=""></button>
                </form>
            </div>
            <div class="useravatar">
                <img src="assets/avatar.png" alt="" srcset="">
                <div class="avatarname"><p><?php echo isset($_SESSION['user']) ? $_SESSION['user'] : ''; ?></p> </div>
                <div class="deco">
                        <form class="deconnect" method="POST">
                            <div class="imagedeco">
                             <button type="submit" name="deconnexion" id="deconnect" alt="deconnect">
                                    <img src="assets/connexion.png" alt="Bouton de déconnexion">
                              </button>
                           </div>
                       </form>
              </div>
            </div>
        </div>
    </div>

    <nav>
        <ul>
            <li>
                <a href="">Categories</a>
                <ul>
                    <li><a href="#">Science fiction</a></li>
                    <li><a href="#">Roman</a></li>
                    <li><a href="#">Historique</a></li>
                </ul>
            </li>
            <li><a href="home.php">Livres</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</header>
</body>
</html>

