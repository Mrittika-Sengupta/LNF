
<?php

include 'config.php';

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);
   $cpass = mysqli_real_escape_string($conn, $_POST['cpass']);

   
   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password' ") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($password != $cpass){
         $message[] = 'confirm password not matched!';
      }
         else{
            $insert = mysqli_query($conn, "INSERT INTO `users`(username, email, password) VALUES('$username', '$email', '$password')") or die('query failed');
            if($insert){
              
               $message[] = 'registered successfully!';
               header('location:login.php');
            }else{
               $message[] = 'registeration failed!';
            }
         }
      }
   
   }


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UFT-8" />
    <title>Lost & Found</title>
    <link rel="icon" type="image/x-icon" href="icon.png" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    />
    <link
      rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
<body>
   
<body>
    <div class="container">
      <nav>
        <a href="index.html"
          ><img src="logo.png" alt="lost and found" class="logo"
        /></a>
        <ul>
          <li><a href="index,html">HOME</a></li>
          <li><a href="#">ABOUT</a></li>
          <li><a href="#">SERVICES</a></li>
          <li><a href="#">CONTACT US</a></li>
        </ul>
        <div class="search">
          <form action="#">
            <input type="search" placeholder="Search..." name="search" />
            <i class="fa fa-search"></i>
          </form>
        </div>
      </nav>

      <div class="signup">
          <h1>Create Account</h1>
          <p>Please fill in this form to create an account</p>



   <form action="" method="post" enctype="multipart/form-data">
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <label for="username"></label>
          <input
            type="text"
            placeholder="Name"
            name="username"
            required>
          

          <label for="email"></label>
          <input
            type="text"
            placeholder="Email"
            name="email"
            required>
     


          <label for="password"></label>
          <input
            type="password"
            placeholder="Password"
            name="password"
            
            required>

          <label for="password"></label>
          <input
            type="password"
            placeholder="Confirm Password"
            name="cpass"
            required>

          <button type="submit"class="btn" name="submit" value="register now">Signup </button>
          

          <p>Already have account? <a href="login.php" class="login.php">LOGIN</a></p>
        </form>
      </div>
    </div>

        
          
  	
    <footer>
      <p>All Rights Reserved ~ Designed by Group 08</p>
    </footer>

 


</body>
</html>