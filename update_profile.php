

<?php include('menu.php'); ?>
<?php


$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

   $update_username = mysqli_real_escape_string($conn, $_POST['update_username']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `users` SET username = '$update_username', email = '$update_email'  WHERE id = '$user_id'") or die('query failed');
  
   
   $old_password = $_POST['old_password'];
   $update_password = mysqli_real_escape_string($conn, $_POST['update_password']);
   $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
   $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

   

   if(!empty($update_password) || !empty($new_password) || !empty($confirm_password)){
      if($update_password != $old_password){
         $message[] = 'Something Went Wrong!';
      }elseif($new_password != $confirm_password){
         $message[] = 'Something Went Wrong!';
      }else{
         mysqli_query($conn, "UPDATE `users` SET  password = '$confirm_password' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'Profile updated successfully!';
      }
   }
}



if(isset($message)){
   foreach($message as $message){
      echo '<div class="message">'.$message.'</div>';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

  


</head>
<body>
   
   <?php
      $select = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
      
   
   ?>
<main>
<table>

   <form action="" method="post" enctype="multipart/form-data">
      
   <div class="header">
          <h2>Update Your Profile</h2>
  
       <tr>   <td><label>Username</label></td>
       <td> <input type="username" name="update_username" value="<?php echo $fetch['username']; ?>" class="box"></td>
   </tr>
   <tr>  <td><label>Email</label> </td>
   <td> <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box"></td>
            </tr>
            <input type="hidden" name="old_password" value="<?php echo $fetch['password']; ?>">
            <tr>   <td><label>Old Password</label></td>
            <td><input type="password" name="update_password" placeholder="enter previous password" class="box"></td>
            </tr>
            <tr> <td>  <label>New Password</label></td>
            <td> <input type="password" name="new_password" placeholder="enter new password" class="box"></td>
            </tr>
            <tr>   <td><label>Confirm Password</label></td>
            <td> <input type="password" name="confirm_password" placeholder="confirm new password" class="box"></td>
            </tr>
            <tr>
        <td colspan="2">
      <button type="submit" value="update profile" name="update_profile" class="btn" >Update Profile</button>

      </td>
    </tr>
   </form>
   </main>
   
</table>

</div>

</body>
</html>

<main>
            