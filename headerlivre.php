<?php
require_once "connect.php";
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['user'])) {
    echo "";
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
    <div class="blockheader">
        <div class="title"><a href="home.php"><h4>B</h4></a></div>
        <div class="useravatar">
            <img src="assets/avatar.png" alt="">
            <div class="avatarname"><p><?php echo isset($_SESSION['user']) ? $_SESSION['user'] : ''; ?></p></div>

        </div>
    </div>
</header>
<body>
    
</body>
</html>

