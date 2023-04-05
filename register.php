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
            $TestEmail = $conn ->query('SELECT id FROM users WHERE email = "'.$mail.'"');
                  if ($TestEmail -> rowCount()< 1 )
                 {
                    $conn -> query ('INSERT INTO users(email,username,password) VALUES ("'.$mail.'", "'.$user.'","'.$password.'") ');

                    $erreur ="votre inscription a bien été enregistré";  

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
<body>
  <section class="resgister">

  <div class="title">
            <h2>YOUR REGISTRATION IS REQUIRED</h2>
    </div>
    
  
    <div class="registerbox">

        <a href="registrationadmin.php">Admin ?</a>
        <div class="box-resgister-sign">
            <button class="bouton-sign_register" id ="button_sign"><a href="login.php">SING</a></button>
            <button class="bouton-sign_register" id ="button_register">REGISTER</button>
        </div>
        <div class="registercountent">
            
            <form method="POST">
                
                    <label for=""></label>
                    <input  type="text" id ="sizeinput" placeholder= "Enter your email address"name="mail">
                    <br>
                    <br>
                    <label for=""></label>
                    <input type="text" id ="sizeinput" placeholder= "Choose your username" name ="user">
                    <br>
                    <br>
                    <label for=""></label>
                    <input  type="text" id ="sizeinput" placeholder= "Choose a password" name = "password">
                    <br>
                    <br>
                        
                    <input type="submit" id="bouttonregister"name ="register" value="GO!">
                    
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
    
    
   
  </section>
</body>
</html>



        