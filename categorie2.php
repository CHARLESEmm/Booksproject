<?php
require_once 'connect.php';

// Recherche de livres
$searchResults = null;
if (isset($_POST['motcle'])) {
    $recherche = $_POST['motcle']; 
    $selection = "SELECT * FROM `ec_book` WHERE title LIKE '%$recherche%' OR author LIKE '%$recherche%'";
    $resultat = $conn->query($selection);
    if ($resultat && $resultat->rowCount() > 0) {
        $searchResults = $resultat;
    }
}

// Affichage des livres


$sql = "SELECT * FROM ec_book
        JOIN ec_categorie ON ec_book.book_id = ec_categorie.book_id
        WHERE ec_categorie.categorie IN ('roman')";
$categoriebooks = $conn->query($sql);

if ($categoriebooks->rowCount() < 1) {
    echo "Error";
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roman</title>
</head>

<?php  
    require_once 'header.php';
?>

<main>
    <?php if ($searchResults): ?>
    <?php foreach ($searchResults as $row): ?>
    <div class="card">
        <div class="image">
            <a href="livre.php?book_id=<?php echo $row['book_id']; ?>&image=<?php echo $row['poster']; ?>&title=<?php echo $row['title']; ?>&author=<?php echo $row['author']; ?>&details=<?php echo $row['details']; ?>">
                <img src="<?php echo $row['poster']; ?>" alt="" srcset="">
            </a>
        </div>
        <p class="nomproduit"><?php echo $row['title']; ?></p>
    </div>
    <?php endforeach; ?>
    <?php elseif (isset($_POST['motcle'])): ?>
    
    <div class="message"> <?php $erreur = "<p>Aucun résultat trouvé pour \"" . $_POST['motcle'] . "\"</p>"; ?>   
    <?php echo $erreur; ?>
   
    <?php else: ?>
        </div>
    <?php foreach ($categoriebooks as $row): ?>
    <div class="card">
        <div class="image">
            <a href="livre.php?book_id=<?php echo $row['book_id']; ?>&image=<?php echo $row['poster']; ?>&title=<?php echo $row['title']; ?>&author=<?php echo $row['author']; ?>&details=<?php echo $row['details']; ?>">
                <img src="<?php echo $row['poster']; ?>" alt="" srcset="">
            </a>
        </div>
        <p class="nomproduit"><?php echo $row['title']; ?></p>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
</main>


<?php  
    require_once 'footer.php';
?>