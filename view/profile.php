
<?php 
require '../vendor/autoload.php';
//  include '../app/QueryBuilders/User.php';
// include '../app/QueryBuilders/Blog.php';
use App\QueryBuilders\User;
session_start(); 
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
}
// $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$user = new User();
$username= $_SESSION['username'];
$user->username=$username;
$user->oneUser();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Blogs</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">

</head>
<body class="container">
<div class="container-fluid justify-content-left">
<br>
       <a class="text-success h4"href='home.php'> Go to Home Page</a>
   </div>
   <br>
    <div class="container-fluid ">
	 <table class="table-sm table-striped table-hover">
		<caption class="text-center">My Detail</caption>
		<tr class="table-primary">
			<td>ID</td>
		    <?php 	echo "<td> $user->id</td>";?>	
			
			
		</tr>
        <tr class="table-secondary">
            <td>Name</td>
            <?php 	echo "<td> $user->username</td>";?>
        </tr>

        <tr  class="table-success"> 
           <td>Email ID</td>
           <?php 	echo "<td> $user->email_id</td>";?>
        </tr>

        <tr  class="table-danger">
        <td>Password</td>
        <?php 	echo "<td> $user->password</td>";?>
        </tr>
		
		<tr  class="table-warning">
             <td>Joined Date</td>
		    <?php	echo "<td> $user->joined_date</td>";
		 ?>
         </tr>
	</table> 
    <br>
    <a class="btn btn-lg btn-success h4" href="profile.php?logout=1">Logout</a>
    </body>
    </html>