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
                echo "User created You are now logged in";
                echo "<a href='home.php?id=".$user->id."'>
                    Go to Home Page
                  </a>
                 ";
               }else{
                echo "Could not create user";
            }
            } else{
                
                
                echo "
                  <a href='signup.php'>
                       Go Back
                      </a>
                      <p>User already exists</p>";
            }
        } else {
             for($x = 0; $x < count($errors); $x++) {
             echo $errors[$x];
             echo "<br>";
    }

}
}