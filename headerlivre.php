<?php
require_once "connect.php";
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['user'])) {
    echo "";
} 

if (!isset($_SESSION['id']) || !isset($_SESSION['adminname'])) {
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
    <link rel="stylesheet" href="headerlivre.css">
    <title>Document</title>
</head>

<header>
    <div class="blockGlobal">
        <div class="title"><a href="home.php"><h4>B</h4></a></div>
        <div class="blockContenair">
            <div class="useravatar">
                <img src="assets/avatar.png" alt="" srcset="">
                <div class="avatarname"><p><?php echo isset($_SESSION['user']) ? $_SESSION['user'] : ''; ?><?php echo isset($_SESSION['adminname']) ? $_SESSION['adminname'] : ''; ?></p> </div>
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
                    <li><a href="science_fiction.php" id="tesa">Science fiction</a></li>
                    <li><a href="roman.php" id="tesa">Roman</a></li>
                    <li><a href="historique.php" id="tesa">Historique</a></li>
                </ul>
            </li>
            <li><a href="home.php">Livres</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</header>

<body>
    
</body>
</html>

