<?php
// Inclusion du fichier de connexion à la base de données
require_once 'connect.php';

// Initialisation de la variable d'erreur
$erreur = '';


      

if (isset($_POST['addbooks'])) {

    $title = $_POST['title'];
    $author = $_POST['author'];
    $summary = $_POST['summary'];
    $details = $_POST['details'];
    $price = $_POST['price'];
    $categories = $_POST['categories'];
    $link = NULL;
    $poster = NULL;

    if (isset($_FILES['photo']) && getimagesize($_FILES['photo']['tmp_name'])) {
        $target_dir = 'upload/';
        $target_file = $target_dir . uniqid() . basename($_FILES['photo']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (!in_array($imageFileType, array('jpg', 'jpeg', 'png'))) {
            $erreur = 'Le fichier doit être au format JPG, JPEG ou PNG.';
        } else {
            if (!move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
                $erreur = 'Erreur lors du téléchargement de l\'image.';
            } else {
                $poster = $target_file;
            }
        }
    } else {
        $erreur = 'Veuillez sélectionner une image.';
    }

    if (isset($_FILES['link']) && $_FILES['link']['error'] == UPLOAD_ERR_OK) {
        $target_dir = 'livrestest/';
        $target_file = $target_dir . uniqid() . basename($_FILES['link']['name']);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (!in_array($file_type, array('pdf', 'epub'))) {
            $erreur = 'Le fichier doit être au format PDF ou EPUB.';
        } else {
            if (move_uploaded_file($_FILES['link']['tmp_name'], $target_file)) {
                $link = $target_file;
            } else {
                $erreur = 'Erreur lors du téléchargement du fichier.';
            }
        }
    } else {
        $erreur = 'Veuillez sélectionner un fichier.';
    }

    if ($erreur == NULL) {
        // Insertion en base de données
        $stmt = $conn->prepare('INSERT INTO ec_book(title, author, summary, details, price, poster, link) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute(array($title, $author, $summary, $details, $price, $poster, $link));
    
        $book_id = $conn->lastInsertId();
    
        if ($book_id > 0) {
            $stmt = $conn->prepare('INSERT INTO ec_categorie (categorie, book_id) VALUES (?, ?)');
            foreach((array)$categories as $categorie) {
                $stmt->execute(array($categorie, $book_id));
            }
    
            $erreur = 'Votre livre a bien été ajouté.';
        } else {
            $erreur = 'Formulaire non soumis.';
        }
    } else {
        echo "Erreur lors de l'ajout du livre.";
    }
    
    } else {
        echo 'Formulaire non soumis.';
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
    <title>Add books</title>
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
                <div class="adminname"><a href="addbooks.php"><?php echo isset($_SESSION['adminname']) ? $_SESSION['adminname'] : ''; ?></a></div>
            </div>
            <div class="titre">
                <h2>Gestion d'articles</h2>
            </div>
            <div class="formbox">
        <form action="" method="post" class="gestionarticlesform" enctype="multipart/form-data">
            <label for="title">Title</label><br>
            <input type="text" id="sizeinput" name="title">
            <br>
            <label for="categories">Categories</label>
                <select name="categories">
                <option value="science-fiction">Science Fiction</option>
                <option value="roman">Roman</option>
                <option value="historique">Historique</option>
                </select><br>
            <label for="author">Author</label><br>
            <input type="text" id="sizeinput" name="author"><br>
            <label for="summary">Summary</label><br>
            <textarea id="story" name="summary" rows="10" cols="33"></textarea><br>
            <label for="summary">Details</label><br>
            <textarea id="story" name="details" rows="8" cols="33"></textarea><br><br>   
            <label for="price">Price</label><br>
            <input type="text" id="sizeinput" name="price"><br>
            <label for="posteradd">Poster</label><br>
            <input type="file" id="sizeinput" name="photo" placeholder="emplacement du ficher/filename.png" accept="image/png,image/jpeg,image/jpg"><br><br>
            <label for="link">link</label>
            <input type="file" id="sizeinput" name="link" placeholder="emplacement du ficher/title.epub or pdf" accept="application/pdf,application/epub+zip"><br><br>
            <input type="submit" value="add" id="boutton_add" name="addbooks">
            <div class="messageerror">
            <?php
            if (isset($erreur)) {
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