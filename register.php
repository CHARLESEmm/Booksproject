<?php
 require_once 'connect.php';
?>


<?php


if (isset($_POST['register'])) {
    $mail = $_POST['mail'];
    $user = $_POST['user'];
    $password = sha1($_POST['password']);

    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $usernamelenght = strlen($user);

        if ($usernamelenght <= 15) {
            $TestEmail = $conn ->query('SELECT id FROM ec_users WHERE email = "'.$mail.'"');
                  if ($TestEmail -> rowCount()< 1 )
                 {
                    $conn -> query ('INSERT INTO ec_users(email,username,password) VALUES ("'.$mail.'", "'.$user.'","'.$password.'") ');

                            $erreur="votre inscription a bien été enregistré";  
                            

                        }
                        else
                        {
                            $erreur = "l'adresse mail est connu de notre base de données";
                        }
                     }
    } else {
        $erreur = "Votre adresse mail n'est pas valide.";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="inscription.css">
  <title>Register</title>
</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="sidenav">
         <div class="login-main-text">
            <h2>Book's<br> Register Page</h2>
            <p>register from here to access.</p>
         </div>
         
      </div>
      <div class="main">
      
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
          
            <form method="POST">
                  <div class="form-group">

                     <label for="">Email</label>
                    <input  type="text" class="form-control" placeholder= "Enter your email address"name="mail">
                  </div>
                  <div class="form-group">

                  <label for="">Username</label>
                    <input type="text" class="form-control" placeholder= "Choose your username" name ="user">
                  </div>

                  <div class="form-group">
                  <label>Password</label>
                     <input type="password" class="form-control" name = "password" placeholder="Password">
                     

                    </div>
                  

                  <button type="submit" class="btn btn-black" name ="sing"><a href="login.php">Login</a></button>
                  <button type="submit" class="btn btn-secondary" name ="register"> Register</button>
                  
                  <div class="messageerror">
                        <?php
                            if(isset($_POST['register']) AND isset($erreur))
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
</html>



        