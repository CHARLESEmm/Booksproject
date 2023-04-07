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
            <div class="avatar">
                <img src="assets/avatar.png" alt="">
                <div class="test"><p><?php echo isset($_SESSION['user']) ? $_SESSION['user'] : ''; ?></p></div>
          
            </div>
        </div>
    </div>
</header>

</header>
</body>
</html>

</header>
</body>
</html>

 
 <section>
    <a href="#">Categories</a>
    <a href="favories.php">Favories</a>
    <a href="#">Livres</a>
    <a href="#">Contact</a>
</section>
</header>
</body>
</html>

