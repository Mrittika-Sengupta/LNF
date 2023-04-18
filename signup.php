
<?php include('server.php') ?>
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
      <form method="post" action="signup.php">
      <?php include('errors.php'); ?>
          <h1>Create Account</h1>
          <p>Please fill in this form to create an account</p>


            <label for="username"></label>
          <input
            type="text"
            placeholder="Name"
            name="username"
            value="<?php echo $username; ?>" >
          

          <label for="email"></label>
          <input
            type="text"
            placeholder="Email"
            name="email"
            value="<?php echo $email; ?>">
     

          <label for="phone"></label>
          <input
            type="text"
            placeholder="Contact no."
            name="phone"
            value="<?php echo $phone; ?>" >
          

          <label for="nid"></label>
          <input type="text" placeholder="NID" name="nid" value="<?php echo $nid; ?>" >

          <label for="password"></label>
          <input
            type="password"
            placeholder="Password"
            name="password_1"
            
          >

          <label for="password"></label>
          <input
            type="password"
            placeholder="Confirm Password"
            name="password_2"
          >

          <button type="submit"class="btn" name="reg_user">Register</button></button>

          <p>Already have account? <a href="login.php" class="l">LOGIN</a></p>
        </form>
      </div>
    </div>

        
          
  	
    <footer>
      <p>All Rights Reserved ~ Designed by Group 08</p>
    </footer>

  </body>
</html>
