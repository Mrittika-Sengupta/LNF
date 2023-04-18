

<!-- username: admin ; password:admin -->

<?php include('../config/constants.php'); ?>

<html>
    <head>
        <title>Lost & Found - Admin Login</title>
        <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    />
    <link
      rel="stylesheet"
      href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"
    />
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
    <div class="container">
      <nav>
         <a href="index.html"><img src="logo.png" alt="lost and found" class="logo"/></a>
        <ul>
          <li><a href="#">HOME</a></li>
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

            
      <div class="alogin">
            <form action="" method="POST" >
            <h1>Admin Login</h1>
            <p>Please fill in this form to access your account</p>
            <label for="Username"></label>
            <input type="text" name="username" placeholder="Enter Username"><br><br>
            <label for="password"></label>
            <input type="password" name="password" placeholder="Enter Password"><br><br>
            <button type="submit" name="submit" value="Login" class="btn-primary">Login</button>
            <p><a href="login.html" class="al"> Not an administrator? </a></p>
            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            
            </form>    
        </div>
    </body>
</html>
<?php 

  
    if(isset($_POST['submit']))
    {
       
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);

      
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    
        $res = mysqli_query($conn, $sql);

      
        $count = mysqli_num_rows($res);

        if($count==1)
        {
           
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; 

         
            header('location:'.SITEURL.'admin/');
        }
        else
        {
        
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            header('location:'.SITEURL.'admin/login.php');
        }


    }

?>
