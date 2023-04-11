<?php
session_start();
require_once "connect.php";

if(isset($_SESSION['user'])) {
    $sql = 'SELECT * FROM favories JOIN book ON favories.id_book_fav = book.book_id JOIN users ON favories.id_users = users.id WHERE users.email = ?';
    $select = $conn->prepare($sql);
    $select->execute([$_SESSION['user']]);

    $user = $select->fetchAll();
} else {
    // La session de l'utilisateur n'est pas initialisée
    $user = array();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<main>
    <?php if(count($user) > 0): ?>
        <?php foreach ($user as $row): ?>
            <div class="card">
                <div class="image">
                    <a href="livre.php?book_id=<?php echo $row['book_id']; ?>&image=<?php echo $row['poster']; ?>&title=<?php echo $row['title']; ?>&author=<?php echo $row['author']; ?>&details=<?php echo $row['details']; ?>">
                        <img src="<?php echo $row['poster']; ?>" alt="" srcset="">
                    </a>
                </div>
                <p class="nomproduit"><?php echo $row['title']; ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun livre favori trouvé pour cet utilisateur.</p>
    <?php endif; ?>
</main>
</body>
</html>


