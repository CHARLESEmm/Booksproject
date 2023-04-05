<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="livre.css">
    
    <title>Document</title>
</head>
<?php 
    require_once 'headerlivre.php';
?>
<body>
    <div class="box">
    <div class="contenair">
        <div class="image">
            <img src="assets/couverture-de-livre.png" alt="" srcset="">
            <div class="itre">Titre</div>
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
                BUY
            </button>
        </div>
        

    </div>
    <div class="readme">
        <div class="summary">
            <title>Titre exemple</title>
            <div class="summ">
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,<br> by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, <br> you need to be sure there isn't anything embarrassing hidden in the middle of text. <br> All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. <br> It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. <br> The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,<br> by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, <br> you need to be sure there isn't anything embarrassing hidden in the middle of text. <br> All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. <br> It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. <br> The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
                <details <img src="assets/vers-le-bas.png" alt="" srcset=""> <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,<br> by injected humour, or randomised words which don't look even slightly believabl </p></details>
            </div>


        </div>
    </div>
    </div>
</body>
<?php
    require_once 'footer.php';
?>
</html>