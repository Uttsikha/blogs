
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
</head>
<body>
<?php
              echo "<br><a href='home.php'>
              Go to Home Page
            </a>
           ";
?>
	 <table border="1">
		<caption>My Detail</caption>
		<tr>
			<td>ID</td>
		    <?php 	echo "<td> $user->id</td>";?>	
			
			
		</tr>
        <tr>
            <td>Name</td>
            <?php 	echo "<td> $user->username</td>";?>
        </tr>

        <tr>
           <td>Email ID</td>
           <?php 	echo "<td> $user->email_id</td>";?>
        </tr>

        <tr>
        <td>Password</td>
        <?php 	echo "<td> $user->password</td>";?>
        </tr>
		
		<tr>
             <td>Joined Date</td>
		    <?php	echo "<td> $user->joined_date</td>";
		 ?>
         </tr>
	</table> 
    <a href="profile.php?logout=1">Logout</a>
    </body>
    </html>