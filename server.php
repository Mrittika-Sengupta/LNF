<?php
session_start();

$username = "";
$email    = "";
$phone = "";
$nid = "";
$errors = array(); 


$db = mysqli_connect('localhost', 'root', '', 'lnf');

// REGISTER USER
if (isset($_POST['reg_user'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $nid = mysqli_real_escape_string($db, $_POST['nid']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  
 
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($phone)) { array_push($errors, "phone no is required"); }
  if (empty($nid)) { array_push($errors, "nid is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' OR phone= '$phone' OR nid= '$nid'  LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
    if ($user['phone'] === $phone) {
      array_push($errors, "phone already exists");
    }
    if ($user['nid'] === $nid) {
      array_push($errors, "nid already exists");
    }
  }

  
  if (count($errors) == 0) {
  	$password = md5($password_1);

  	$query = "INSERT INTO users (username, email, password, phone, nid) 
  			  VALUES('$username', '$email', '$password' , '$phone' , '$nid')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
    $_SESSION['success'] = "";
  	header('location: home.php');
  }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = " ";
          header('location: home.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  
  ?>