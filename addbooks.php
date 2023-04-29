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
        if ($erreur == NULL) {
            // Insertion en base de données
            $stmt = $conn->prepare('INSERT INTO ec_book(title, author, summary, details, price, poster, link,categorie) VALUES (?, ?, ?, ?, ?, ?, ?,?)');
            $stmt->execute(array($title, $author, $summary, $details, $price, $poster, $link,$categories));
        
           
        } else {
            $erreur =  "Erreur lors de l'ajout du livre.";
        }
    
    } else {
        $erreur = 'Formulaire non soumis.';
    }
}   




session_start();
$sql = "SELECT * FROM ec_admin ORDER BY id DESC";
$info = $conn->query($sql);
if ($info->rowCount() > 0)
{
    $admin = $info->fetch(PDO::FETCH_ASSOC);
    $photo = $admin['photo'];
    
}



if (!isset($_SESSION['id'])) {

    header("Location: login_admin.php");
}

if (empty($_SESSION['id'])) {

    header("Location: login_admin.php");
}


//protection
if (isset($_POST['deconnexion'])) {
    session_destroy();
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
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&family=Quicksand&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
                <div class="gestionventes"><a href="gestionArticles.php">Gestion</a></div>
                <div class="gestionventes"><a href="home.php">Voir le site</a></div>
                <div class="boxdeco">
                    <form class="deconect" method="POST">
                        <input type="submit" name="deconnexion" id="deconnect" value="Déconnexion">
                    </form>
                </div>
            </div>
        </div>
        <div class="formulaire">
           
            <div class="formbox">

            <div class="titre">
                <h2>Gestion d'articles</h2>
                <a href="gestionArticles.php" id = "voirlesite" >Gestion</a>
                <a href="home.php" id = "voirlesite">Voir le site</a>
                <br>
                
                
                    <form class="deconnec" method="POST">
                        <button type="submit" name="deconnexion">Déconnexion</button>
                    </form>
               
                <div class="boxcontenairadminprofil">
                <div class="image_admin"><img src="<?php echo $photo ?>" alt="" srcset=""></div>
                <div class="adminname"><a href="addbooks.php"><?php echo isset($_SESSION['adminname']) ? $_SESSION['adminname'] : ''; ?></a></div>
            </div>
            
            </div>
        <form action="" method="post" class="gestionarticlesform" enctype="multipart/form-data">
            <label for="title">Title</label><br>
            <input type="text" id="sizeinput" name="title">
            <br>
            <label for="categories" >Categories</label>
                <select name="categories" id="sizeinput" >
                <option value="Science fiction">Science fiction</option>
                <option value="Roman">Roman</option>
                <option value="Historique">Historique</option>
                </select><br>
            <label for="author">Author</label><br>
            <input type="text" id="sizeinput" name="author"><br>
            <label for="summary">Summary</label><br>
            <textarea id="story" id="sizeinput" name="summary" rows="3" cols="33" style = border-raduis="5px"></textarea><br>
            <label for="summary">Details</label><br>
            <textarea id="story" name="details" rows="2" cols="33"></textarea><br><br>   
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

