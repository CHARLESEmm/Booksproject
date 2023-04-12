<?php
require_once 'connect.php';

$erreur;

if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['summary']) && isset($_POST['details']) && isset($_POST['price']) && isset($_POST['photo'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $summary = $_POST['summary'];
    $details = $_POST['details'];
    $price = $_POST['price'];
    $photo = $_POST['photo'];

    if (!empty($title) && !empty($author) && !empty($summary) && !empty($details) && !empty($price)) {
        $stmt = $conn->prepare('INSERT INTO book(title, author, summary, details, price, poster) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute(array($title, $author, $summary, $details, $price, $photo));
        $erreur = "Votre article a bien été enregistré";
    } else {
        $erreur = "Veuillez remplir tous les champs.";
    }
} else {
    $erreur = "Formulaire non soumis.";
}

session_start();
if (!isset($_SESSION['id']) || !isset($_SESSION['adminname'])) {
    echo "";
}

if (isset($_POST['deconnexion'])) {
    unset($_SESSION['id']);
    header('Location: login_admin.php');
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
    <link rel="stylesheet" href="addbooks.css">
    <title>Document</title>
</head>
<body>
    <div class="contenairarticles">
        <div class="cotegauche">
            <div class="titrebooks">
                <h1>BOOK'S</h1>
            </div>
            <div class="bouton">
                <div class="gestionarticle"><a href="">Gestion d'articles</a></div>
                <div class="gestionventes"><a href="">Gestion de ventes</a></div>
                <div class="gestionventes"><a href="home.php">Voir le site</a></div>
                <div class="boxdeco">
                    <form class="deconect" method="POST">
                        <input type="submit" name="deconnexion" id="deconnect" value="Déconnexion">
                    </form>
                </div>
            </div>
        </div>
        <div class="formulaire">
            <div class="boxcontenairadminprofil">
                <div class="image_admin"><img src="assets/avatar.png" alt="" srcset=""></div>
                <div class="adminname"><?php echo isset($_SESSION['adminname']) ? $_SESSION['adminname'] : ''; ?></div>
            </div>
            <div class="titre">
                <h2>Gestion d'articles</h2>
            </div>
        <div class="formbox">
            <form action="" method="post" class="gestionarticlesform">
            <label for="title">Title</label><br>
            <input type="text" id="sizeinput" name="title">
             <br>
            <label for="author">Author</label><br>
            <input type="text" id="sizeinput" name="author"><br>
            
            <label for="summary">Summary</label>
            <br>
            <textarea  id="story" name="summary"
                rows="10" cols="33"> </textarea><br>
            <label for="summary">Details</label>
            <br>
            <textarea  id="story" name="details"
                rows="8" cols="33"> </textarea><br><br>   
            <label for="price">Price</label>
            <br>
            <input type="text" id="sizeinput" name="price"><br>
            <label for="posteradd">Poster </label><br>
            
            <input type="text" id="sizeinput" name="photo" placeholder="assets/filename.png"><br><br>
            
            <input type="submit" value="add" id="boutton_add">
            <div class="messageerror">
                        <?php
                            if (isset($erreur))
                            {
                                echo '<font color="orange">' .$erreur."</font>";
                                exit();
                        
                            }
                          
                        ?>
                    </div>
        </form>
        </div>
        
        </div>
</div>
</body>
</html>