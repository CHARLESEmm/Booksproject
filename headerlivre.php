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
    <link rel="stylesheet" href="headerlivre.css">
    <title>Document</title>
</head>

<header>
<div class="blockGlobal">
<div class="title"><a href="home.php"><h4>B</h4></a></div>
        <div class="blockContenair">
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
<section>
    <a href="#">Categories</a>
    <a href="favories.php">Favories</a>
    <a href="#">Livres</a>
    <a href="#">Contact</a>
</section>
</header>
<body>
    
</body>
</html>

