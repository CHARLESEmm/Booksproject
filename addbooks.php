<?php
$conn = new PDO('mysql:host=localhost;dbname=books;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if (isset($_POST['title']) && isset($_POST['author']) && isset($_POST['summary']) && isset($_POST['price']) && isset($_POST['photo'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $summary = $_POST['summary'];
    $price = $_POST['price'];
    $photo = $_POST['photo'];

    if (!empty($title) && !empty($author) && !empty($summary) && !empty($price)) {
        $stmt = $conn->prepare('INSERT INTO book(title, author, summary, price, poster) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute(array($title, $author, $summary, $price, $photo));
        $erreur = "Votre inscription a bien été enregistrée";
    } else {
        $erreur = "Veuillez remplir tous les champs.";
    }
} else {
    $erreur = "Formulaire non soumis.";
}

session_start();
if (!isset($_SESSION['id']) || !isset($_SESSION['admin'])) {
    // Ajouter une action si l'utilisateur n'est pas connecté
    echo "";
}

if (isset($_POST['deconnexion'])) {
    unset($_SESSION['id']);
    unset($_SESSION['admin']);

    // Redirigez l'utilisateur vers la page de connexion
    
    header('Location: login_admin.php');
    $erreur = "Vous avez bien été deconnecter de votre session admin";
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
                <div class="gestionarticle"><a href="">Gestion d'articles</a> </div>
                <div class="gestionventes"><a href="">Gestion de ventes</a></div>
                <div class="boxdeco">
                    <form class="deconect" method ="POST">
                        <input type="submit" name="deconnexion" id="deconnect" value="deconnexion">
                        
                    </form>
                </div>
                
            </div>
            
        </div>
        
        <div class="formulaire">
                <div class="boxcontenairadminprofil">
                    <div class="image_admin"><img src="assets/avatar.png" alt="" srcset=""></div>
                    <div class="adminname"><?php echo isset($_SESSION['admin']) ? $_SESSION['admin'] : ''; ?></div>
                    
                
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
            <input type="text" id="sizeinput" name="author"><br><br>
            
            <label for="summary">Summary</label>
            <br>
            <textarea  id="story" name="summary"
                rows="10" cols="33"> </textarea><br><br>
            <label for="price">Price</label>
            <br>
            <input type="text" id="sizeinput" name="price"><br><br>
            
            <label for="posteradd">Poster</label><br>
            <input type="file" id="sizeinput" name="photo" placeholder="add photo"><br><br>
            
            <input type="submit" value="add">
            <div class="messageerror">
                        <?php
                            if(isset($_POST['sing']) AND isset($erreur))
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