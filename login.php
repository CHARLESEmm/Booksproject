<?php

// Démarrage de la session
session_start();

// Connexion à la base de données
require_once 'connect.php';


if (isset($_POST['sing'])) {
    
    $username = $_POST['user'];
    $password = sha1($_POST['password']); 

    
    if(!empty($username) AND !empty($password)) {
        
        $recupUser = $conn->prepare('SELECT * FROM ec_users WHERE username = ? AND password = ?');
        
        $recupUser->execute(array($username, $password));

        
        if($recupUser->rowCount() > 0) {
            // Stockage des informations de l'utilisateur dans la session
            $_SESSION['user'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $recupUser->fetch()['id'];

          
            header('Location: home.php');
        } else {
            // Message d'erreur si les identifiants sont incorrects
            $erreur = "Pseudo ou mot de passe invalide !";
        }
    } else {
        // Message d'erreur si les champs ne sont pas remplis
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
  <title>Login</title>
</head>
<body>
  <section class="resgister">

  <div class="title">
            <h2>LOGIN</h2>
    </div>
    
  
    <div class="registerbox">
        
        <div class="box-resgister-sign">
            <button class="bouton-sign_register" id ="button_sign"><a href="login.php">SING</a></button>
            <button class="bouton-sign_register" id ="button_register"><a href="register.php">REGISTER</a></button>
            <button class="bouton-sign_register" id ="button_register"><a href="login_admin.php">ADMIN</a></button>

        </div>
        <div class="registercountent">
            
            <form method="POST">
                
                   
                    <label for=""></label>
                    <input type="text" id ="sizeinput" placeholder= "Choose your username" name ="user">
                    <br>
                    <br>
                    <label for=""></label>
                    <input  type="password" id ="sizeinput" placeholder= "Choose a password" name = "password">
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