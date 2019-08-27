<?php
require '../vendor/autoload.php';
// include '../app/QueryBuilders/User.php';
use App\QueryBuilders\User;
session_start();
<<<<<<< HEAD
$user= new  User();
=======

>>>>>>> 07b32ba79f0e402798cbfb9c72f052cddfa064f7
$errors = array();

if (isset($_POST['reg_user'])) {
  
    if (empty($_POST['username'])) { array_push($errors, "Username is required"); }
    if (empty($_POST['email'])) { array_push($errors, "Email is required"); }
    if (empty($_POST['password_1'])) { array_push($errors, "Password is required"); }
    if ($_POST['password_1'] != $_POST['password_2']) {
        array_push($errors, "The two passwords do not match");
    }
<<<<<<< HEAD
    $user->username=$_POST['username'];
    $user->email_id=$_POST['email'];
    $user->password=$_POST['password_1'];
  
        if (count($errors) == 0) {
            $result= $user->checkUser();
            $number_of_rows = $result->rowCount();
           if ($number_of_rows==0) {
                 if ($user->createUser()){
                 $user->oneUser();
=======
    $user= new User();
   
    $user->email_id=$_POST['email'];

    if ($user->readUser()){
        $user->username=$_POST['username'];
        if (count($errors) == 0) {
            $password = md5($password_1);
            $user->password=$password;
            echo $user->password;
            if ($user->createUser()){
>>>>>>> 07b32ba79f0e402798cbfb9c72f052cddfa064f7
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
<<<<<<< HEAD
                  <a href='signup.php'>
                       Go Back
                      </a>
                      <p>User already exists</p>	";
=======
                <a href='index.php'>
                     Go to Home
                    </a>	
                <div class='alert'>Unable to create user.</div>";
>>>>>>> 07b32ba79f0e402798cbfb9c72f052cddfa064f7
            }
        } else {
             for($x = 0; $x < count($errors); $x++) {
             echo $errors[$x];
             echo "<br>";
    }

}
}