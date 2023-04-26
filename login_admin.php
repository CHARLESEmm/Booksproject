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
  <title>login admin</title>
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
                     <label>Admin Name</label>
                     <input type="text" class="form-control" name ="admin" placeholder="Admin Name">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" name = "password" placeholder="Password">
                  </div>

                  <button type="submit" class="btn btn-black" name ="sing">Login</button>
                  <button type="submit" class="btn btn-secondary"><a href="registrationadmin.php"> Register</a></button>
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