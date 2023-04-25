<?php 

require_once 'connect.php';

?>

<?php

// Démarrage de la session
session_start();



if (isset($_POST['sing'])) {
    
    $adminame = $_POST['admin'];
    $password = sha1($_POST['password']); // Utilisation de sha1 pour hasher le mot de passe

    // Vérification que les champs ne sont pas vides
    if(!empty($adminame) AND !empty($password)) {
        
        $recupUser = $conn->prepare('SELECT * FROM ec_admin WHERE adminname = ? AND password = ?');
        
        $recupUser->execute(array($adminame, $password));

        // Vérification si un utilisateur correspondant a été trouvé
        if($recupUser->rowCount() > 0) {
            
            $_SESSION['adminname'] = $adminame;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $recupUser->fetch()['id'];

            
            header('Location: addbooks.php');
            exit;
        } else {
            
            $erreur = "Pseudo ou mot de passe invalide !";
        }
    } else {
        
        $erreur = "remplissez ";
    }
}

// Affichage de l'erreur, si elle est définie
if (isset($error)) {
    echo $error;
}

?>







<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="inscription.css">
  <title>login_admin</title>
</head>
<body>
  <section class="resgister">

  <div class="title">
            <h2>ADMIN</h2>
    </div>
    
  
    <div class="registerbox">
      
        <div class="box-resgister-sign">
            <button class="bouton-sign_register" id ="button_sign"><a href="login_admin.php">LOGIN</a></button>
            <button class="bouton-sign_register" id ="button_register"><a href="registrationadmin.php">REGISTER</a></button>
        </div>
        <div class="registercountent">
            
            <form method="POST">
                
                   
                    <label for=""></label>
                    <input type="text" id ="sizeinput" placeholder= "Your admin name" name ="admin">
                    <br>
                    <br>
                    <label for=""></label>
                    <label for=""></label>
                    <input  type="password" id ="sizeinput" placeholder= "password" name = "password">
                    <br>
                    <br>

                        
                    <input type="submit" id="bouttonregister"name ="sing" value="GO!">
                    
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
    
    
   
  </section>
</body>
</html>