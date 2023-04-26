<?php



require_once 'connect.php';

if (isset($_POST['register'])) {
    $admin = $_POST['adminname'];
    $password = sha1($_POST['password']);
    $photo = $_POST['photo'];

        $adminnamelenght = strlen($admin);

    if ($adminnamelenght <= 15)
    {
        $conn -> query ('INSERT INTO ec_admin(adminname,password,photo) VALUES ("'.$admin.'", "'.$password.'","'.$photo.'") ');
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

                     <label for=""></label>
                    <input  type="text" class="form-control" placeholder= "name"name ="adminname">
                  </div>
                  
                  <div class="form-group">
                  <label>Password</label>
                     <input type="password" class="form-control"  name = "password" placeholder="Password">
                     
                    </div>

                 <div class="form-group">
                 <label for=""></label>
                    <input  type="file" class="form-control" placeholder= "add photo" name = "photo"> 
                 </div>
                  

                  <button type="submit" class="btn btn-black" name ="sing"><a href="login_admin.php">Login</a></button>
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
