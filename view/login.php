<?php
require '../vendor/autoload.php';
// include '../app/QueryBuilders/User.php';
use App\QueryBuilders\User;
session_start();
$user= new  User();

$errors = array();
if (isset($_POST['login_user'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  

  if (empty($username)) {
      array_push($errors, "Username is required");
   
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
   
    $user->username=$username; 
    $user->password=$password; 
    $statement=$user->readUser();
   $number_of_rows = $statement->rowCount();

 	if ($number_of_rows==1) {
    
  	  $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      echo"You are now logged in";
      header('location: home.php');
   
  	}else {
      array_push($errors, "Wrong username/password combination");
      for($x = 0; $x < count($errors); $x++) {
        echo $errors[$x];
        echo "<br>";
   }
  	}
  }else{
    for($x = 0; $x < count($errors); $x++) {
      echo $errors[$x];
      echo "<br>";
  }
   
  }
}

?>