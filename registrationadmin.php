<?php



$conn = new PDO('mysql:host=localhost;dbname=books;charset=utf8','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

if (isset($_POST['register'])) {
    $admin = $_POST['adminname'];
    $password = sha1($_POST['password']);
    $photo = $_POST['photo'];

        $adminnamelenght = strlen($admin);

    if ($adminnamelenght <= 15)
    {
        $conn -> query ('INSERT INTO admin(adminname,password,photo) VALUES ("'.$admin.'", "'.$password.'","'.$photo.'") ');
        $erreur ="votre inscription a bien été enregistré";  
    }
    else
    {
        $erreur = "votre inscription a été enregistré";
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
  <title>Register ADMIN</title>
</head>
<body>
  <section class="resgister">

  <div class="title">
            <h2>YOUR REGISTRATION ADMIN</h2>
    </div>
    
  
    <div class="registerbox">
      
        <div class="box-resgister-sign">
            <button class="bouton-sign_register" id ="button_sign"> <a href="login_admin.php">SING</a></button>
            <button class="bouton-sign_register" id ="button_register"><a href="registrationadmin.php">REGISTER</a></button>
        </div>
        <div class="registercountent">
               
            <form method="POST">
                    
                    <input type="text" id ="sizeinput" placeholder= "admin name" name ="adminname">
                    <br>
                    <br>
                    <label for=""></label>
                    <input  type="text" id ="sizeinput" placeholder= "Choose a password" name = "password">
                    <br>
                    <br>
                    <label for=""></label>
                    <input  type="file" id ="bouttonregisterregistrationupload" placeholder= "add photo" name = "photo"> 
                    <br>   
                    <input type="submit" id="bouttonregisterregistration"name ="register" value="GO!">
                    
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