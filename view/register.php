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
$user= new User();
$errors = array();
if (isset($_POST['reg_user'])) {
    if (empty($_POST['username'])) { array_push($errors, "Username is required"); }
    if (empty($_POST['email'])) { array_push($errors, "Email is required"); }
    if (empty($_POST['password_1'])) { array_push($errors, "Password is required"); }
    if ($_POST['password_1'] != $_POST['password_2']) {
        array_push($errors, "The two passwords do not match");
    }
    $user->username=$_POST['username'];
    $user->email_id=$_POST['email'];
    $user->password=md5($_POST['password_1']);
        if (count($errors) == 0) {
            $result= $user->checkUser();
            $number_of_rows = $result->rowCount();
           if ($number_of_rows==0) {
                 if ($user->createUser()){
                 $user->oneUser();
                $_SESSION['username'] = $user->username;
                $_SESSION['success'] = "You are now logged in";
                echo "<br><br><p class='h4 text-primary'>User created You are now logged in</p><br>";
                echo "<a href='home.php?id=".$user->id."' class='btn btn-success'>
                    Go to Home Page
                  </a>
                 ";
               }else{
                echo "<p class=' text-primary'>Could not create user</p><br>
                <a href='signup.php' class='btn btn-success'>
                Go Back
               </a><br>";
            }
            } else{ 
                echo "
                <br>
                      <p class=' text-primary'>User already exists</p>
                      <a href='signup.php' class='btn btn-success'>
                       Go Back
                      </a><br>";
            }
        } else {
          echo "<br>";
             for($x = 0; $x < count($errors); $x++) {
             echo "<p class='text-primary'>".$errors[$x]."</p>";

             }
             echo "<a href='signup.php' class='btn btn-success'>
             Go Back
            </a><br>";
}
}
?>
</body>
</html>