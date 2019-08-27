<?php

require '../vendor/autoload.php';
	//  include '../app/QueryBuilders/User.php';
	// include '../app/QueryBuilders/Blog.php';
	use App\QueryBuilders\Blog;
	 use App\QueryBuilders\User;
	 session_start(); 
	if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }
	// $id = isset($_GET['id']) ? $_GET['id']:'';
	  $username= $_SESSION['username'];
	 $user = new User();
	 $user->username=$username;
	 $user->oneUser();

	 $blog = new Blog();
	 $blogs = $blog->allBlogs();
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blogs</title>
</head>
<body>
<div>
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
     
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		<?php endif ?>
	</div>
<?php echo"<a href='profile.php'>My Profile
    </a>";
	?>
	<div>
	<?php	echo "<br><a href='createBlog.php?id=".$user->id."'>
              Create a blog
            </a>
           ";
	?>
	</div>
	 <table border="1">
		<caption>Blogs Detail</caption>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Description</th>
			<th>Picture</th>
			<th>Posted Date</th>
			<th>User ID</th>
			<th colspan="3">Actions</th>
		</tr>
	
			<?php
			foreach($blogs as $blog) {
				  $imageURL = 'uploads/'.$blog["photo"];
				echo "	<tr><td> $blog[id]</td>";
				echo "<td> $blog[name]</td>";
				echo "<td> $blog[description]</td>";
				if (file_exists($imageURL)){
					echo '<td><img src="'.$imageURL.'"width="100" height="100"/></td>';
				}else{
					echo '<td>No picture on display</td>';
			}
				echo "<td> $blog[posted_date]</td>";
				echo "<td> $blog[user_id]</td>";
				if ($user->id==$blog[user_id]){
				  echo "<td>";
					     echo "<a href='readBlog.php?id={$blog['id']}'>
					      Read
					 </a>
					 </td>
					 ";
					 
					// 
					// <td><a href='updateBlog.php?id={$blog['id']}'>
					//      Edit
					//  </a>
					//  </td>
					echo" <td> <a href='deleteBlog.php?id={$blog['id']}'>
					      Delete
					 </a>
					 </td>";
			}else {
				echo "<td colspan='3'>";
				echo "<a href='readBlog.php?id={$blog['id']}'>
				 Read
			</a>
			</td>
			";
			}
                 echo "</tr>";
			}
			?>
		
	</table> 
</body>
</html>

