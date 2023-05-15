<?php include('constants.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UFT-8">
    <title>Lost & Found</title>
    <link rel="icon" type="image/x-icon" href="icon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="stylehome.css">
    <link rel="stylesheet" href="stylenavside.css">
    <link rel="stylesheet" href="stylepost.css">
    

</head>


<input type="checkbox" id="nav-toggle">
<div class="sidebar">
    <div class="sidebar-brand">
        <span>
            <a href="home.php"><img src="logo.png" width="220px" alt="Lost and Found"></a>
        </span>
    </div>

    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="manage-item.php">
                    <span class="icon"><i class="fas fa-home"></i></span>
                    <span class="item">Home</span>
                </a>
            </li>
            <li>
                <a href="add-item.php">
                    <span class="icon"><i class="fas fa-file"></i></span>
                    <span class="item">Post Items</span>
                </a>
            </li>
            <li>
                <a href="">
                    <span class="icon"><i class="fas fa-shopping-basket"></i></span>
                    <span class="item">Items for Sale</span>
                </a>
            </li>
            <li>
                <a href="">
                    <span class="icon"><i class="fas fa-exclamation"></i></span>
                    <span class="item">My Claims</span>
                </a>
            </li>

           
        </ul>
    </div>
</div>
<?php

include 'config.php';

$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
   header('location:login.php');
};
if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}
?>

<div class="main-content">
    <header>
        <h2>
            <label for="nav-toggle">
                <span class="las la-bars"></span>
            </label>
        </h2>

        <div class="search">
            <form action="" method="GET">
                <input type="text" placeholder="Search..." 
                value="<?php if(isset($_GET['search']))
                {echo $_GET['search']; } ?>"
                name="search" id="search"/>
                <button type="submit" style= "font-size: 10px; display: inline-block" >Search</button>
            </form>
        </div>


        

<div class="profile">
   <?php
      $select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

            
                    <a href="update_profile.php">
                    <h3><?php echo $fetch['username']; ?></h3> 
                        <i class="fas fa-user"></i>
                        <i class="fas fa-arrow-right"></i>
                        <div class="container">
 
   <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn" >logout</a>
</div>


                   
                    </a>
               
        </div>

    </header>
    </body>

</html>