<!DOCTYPE html>
<html>
<head>
	<title>Blogs</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">

</head>
<body class="container">
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
      echo "<br>";
      array_push($errors, "Wrong username/password combination");
      for($x = 0; $x < count($errors); $x++) {
        echo "<p class='text-primary'>".$errors[$x]."</p>";
     
   }
   echo "<a href='index.php' class='btn btn-success'>
   Go Back
  </a><br>";
  	}
  }else{
    echo "<br>";
    for($x = 0; $x < count($errors); $x++) {
      echo "<p class='text-primary'>".$errors[$x]."</p>";
  }
   echo "<a href='index.php' class='btn btn-success'>
   Go Back
  </a><br>";
  }
}

?>
</body>
</html>