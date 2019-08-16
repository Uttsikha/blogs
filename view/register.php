<?php

include '../app/QueryBuilders/users.php';
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
    $user->name=$_POST['username'];
    $user->email_id=$_POST['email'];

    if ($user->readUser()){
        if (count($errors) == 0) {
            $password = md5($password_1);
            $user->password=$password;
            echo $user->password;
            if ($user->createUser()){
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";

            } else{
                echo "
                <a href='index.php'>
                     Go to Home
                    </a>	
                <div class='alert'>Unable to create product.</div>";
            }
        } else {


        }
} else{
    echo "User already exists";

}
}