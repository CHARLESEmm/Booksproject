<?php
require_once "connect.php";
require_once 'seachengine.php';
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['user'])) {
    echo "";
} 

if (!isset($_SESSION['id']) || !isset($_SESSION['adminname'])) {
    echo "";
}

if (isset($_POST['deconnexion'])) {
    session_destroy();
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="header.css">
    <title>Document</title>
</head>
<body>  
<header>
    <div class="blockGlobal">
        <div class="blockContenair">
            <div class="title"><h1>BOOK'S</h1></div>
            
            </div>
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

    
 
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorie
          </a>
          <ul class="dropdown-menu">

          
                    <li><a class="dropdown-item" href="science_fiction.php" id="tesa">Science fiction</a></li>
                    <li><a class="dropdown-item" href="roman.php" id="tesa">Roman</a></li>
                    <li><a  class="dropdown-item" href="historique.php" id="tesa">Historique</a></li>
                
            
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="home.php">Livres</a>
        </li>
      </ul>
      <form action="" method="post" class="d-flex" role="search">
                    <label for="motcle"></label>
                    <input type="text" id="motcle" class="form-control me-2" name="motcle" placeholder="Recherche...">
                    <button class="btn btn-outline-success" type="submit">Search</button>
     </form>
    </div>
  </div>
</nav>

    

  
</header>
</body>
</html>

