<?php
require_once 'connect.php';
$sql = "SELECT * FROM ec_book ORDER BY title DESC";
$books = $conn->query($sql);

if (isset($_POST['motcle'])) {
    $recherche = $_POST['motcle']; 

    $selection = "SELECT * FROM `ec_book` WHERE title LIKE '%$recherche%' OR author OR categorie LIKE '%$recherche%'";

    $resultat = $conn->query($selection);

    if ($resultat->rowCount() > 0) {
        $allbooks = $resultat;
    }
}
?>