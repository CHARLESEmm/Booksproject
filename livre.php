<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;700&family=Quicksand&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="livre.css">
    
    <title>Document</title>
</head>
<?php 
    require_once 'connect.php';
    require_once 'headerlivre.php';
    $book_id = $_GET['book_id'];
    $sql = "SELECT * FROM `book` WHERE `book_id` = :book_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':book_id', $book_id);
    $stmt->execute();
    $row = $stmt->fetch();
    $summary = $row['summary'];
    $details = $row['details'];
    $image = $row['poster'];
    $title = $row['title'];
    $author = $row['author'];

?>
<body>

    <div class="box">
    <div class="contenair">
        
        <div class="image">
            <img src="<?php echo $image; ?>" alt="">
            
        </div>
        
        <div class="boxinfo">
            <button class="favories">
                ADD TO
            </button>
        <div class="stars">
            <div class="rate">
            <i class="fa-solid fa-star fa-2xl"></i>
            <i class="fa-solid fa-star fa-2xl"></i>
            <i class="fa-solid fa-star fa-2xl"></i>
            <i class="fa-solid fa-star fa-2xl"></i>
            <i class="fa-solid fa-star fa-2xl"></i>
            </div>
            </div>
            <button class="favories">
                Download
            </button>
        </div>
        

    </div>
    <div class="readme">
        <div class="summary">
            <title>Titre exemple</title>
            <div class="summ">
            <div class="titre"><?php echo $title; ?></div>
                <p id="summarytext"><?php echo $summary; ?></p>
                
                <details>
                    <summary>
                    <div class="fleche">
                     <img src="assets/vers-le-bas.png" alt="" srcset="">
                   </div>
                        
                    </summary>
                    <p><?php echo $details; ?>.</p>
                    <small><p>Author: <?php echo $author; ?></p></small>
                </details>
            </div>


        </div>
    </div>
    </div>
</body>
<?php
    require_once 'footer.php';
?>
</html>
