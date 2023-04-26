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

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="sidenav">
         <div class="login-main-text">
            <h2>Book's<br> Login Page</h2>
            <p>Login from here to access.</p>
         </div>
      
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
            <form method="POST">
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" class="form-control" name ="user" placeholder="User Name">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" name = "password" placeholder="Password">
                  </div>

                  <button type="submit" class="btn btn-black" name ="sing">Login</button>
                  <button type="submit" class="btn btn-secondary"><a href="register.php"> Register</a></button>
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
      </div>