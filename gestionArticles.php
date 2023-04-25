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


// Suppression d'un livre
if (isset($_POST['bouttonsup']))
{
    $book_id = $_POST['book_id'];
    $sup = "DELETE FROM `ec_book` WHERE book_id = $book_id";
    $conn->query($sup);
}

// Affichage des livres
$sql = "SELECT * FROM ec_book ORDER BY title DESC";
$allbooks = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="suppression.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Livres</title>
</head>


<body>
<div class="tete">
    <?php 
            require_once 'headerGestion.php';
    ?>
</div>

<div class="contenair">
<div class="partieLivre">
    <main>
        <?php foreach ($allbooks as $row): ?>
            <div class="card">
                <div class="image">
                    <a href="livre.php?book_id=<?php echo $row['book_id']; ?>&image=<?php echo $row['poster']; ?>&title=<?php echo $row['title']; ?>&author=<?php echo $row['author']; ?>&details=<?php echo $row['details']; ?>">
                        <img src="<?php echo $row['poster']; ?>" alt="" srcset="">
                    </a>
                </div>
                <p class="nomproduit"><?php echo $row['title']; ?></p>
                <form method="post" action="">
                    <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
                    <button type="submit" name ="bouttonsup" id ="supprimerBtn">Supprimer</button>
                </form>
            </div>
        <?php endforeach; ?>
    </main>
</div>

<div class="partiboutton">

</div>
</div>

</body>
<?php require_once 'footer.php'?>
</html>
