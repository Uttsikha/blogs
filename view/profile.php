
<?php 
require '../vendor/autoload.php';
//  include '../app/QueryBuilders/User.php';
// include '../app/QueryBuilders/Blog.php';
use App\QueryBuilders\User;
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$user = new User();
$user->id=$id;
$user->oneUser();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blogs</title>
</head>
<body>
<?php
              echo "<br><a href='home.php?id=".$user->id."'>
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
    <a href="">Logout</a>
    </body>
    </html>