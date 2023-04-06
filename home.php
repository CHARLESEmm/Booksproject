<?php
require_once 'connect.php';
$sql = "SELECT * FROM `book`";
$allbooks = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="home.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
 <?php  
    require_once 'header.php';
?>

<main>
    <?php foreach ($allbooks as $row): ?>
    <div class="card">
        <div class="image">
        <a href="livre.php?book_id=<?php echo $row['book_id']; ?>&image=<?php echo $row['poster']; ?>&title=<?php echo $row['title']; ?>&author=<?php echo $row['author']; ?>&details=<?php echo $row['details']; ?>">
                <img src="<?php echo $row['poster']; ?>" alt="" srcset="">
        </a>

        </div>
        <p class="nomproduit"><?php echo $row['title']; ?></p>
    </div>
    <?php endforeach; ?>
</main>

<?php  
    require_once 'footer.php';
?>

    
</body>
</html>

