<?php

require '../vendor/autoload.php';
	//  include '../app/QueryBuilders/User.php';
	// include '../app/QueryBuilders/Blog.php';
	use App\QueryBuilders\Blog;
	 use App\QueryBuilders\User;
	 use Str\Str;
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
	<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
</head>
<body class="container">
<div>
<br>

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
    	<p class='text-center text-primary '><strong>Welcome <?php echo $_SESSION['username']; ?></strong></p>
		<?php endif ?>
		<a href='profile.php' class="btn btn-success">My Profile </a>
		<br>
		<br>
	<?php	echo "<a href='createBlog.php?id=".$user->id."' class='btn btn-success'>";?>
              Create a blog
     </a>
	 <br>
	 <br>

	</div>
	<div class="container">
	 <table border="1" class="table table-dark table-bordered ">
		<caption class='text-center text-primary'>Blogs Detail</caption>
		<thead class="thead-light">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Description</th>
			<th>Picture</th>
			<th>Posted Date</th>
			<th>User ID</th>
			<th>Actions</th>
		</tr>
		</thead>
			<?php
			foreach($blogs as $blog) {
				$name = new Str($blog[name]);
				$name->toTitleCase();
				$name->padBoth(10, ' ');
				$description = new Str($blog[description]);
				$description->upperCaseFirst();
				$imageURL = '../uploads/'.$blog["photo"];
				echo "	<tr><td> $blog[id]</td>";
				echo "<td>". $name."</td>";
				echo "<td> ".$description."</td>";
				if (file_exists($imageURL)){
					echo '<td><img src="'.$imageURL.'"class="img-fluid mx-auto"/></td>';
				}else{
					echo '<td>No picture on display</td>';
			}
				echo "<td> $blog[posted_date]</td>";
				echo "<td> $blog[user_id]</td>";
				if ($user->id==$blog[user_id]){
				  echo "<td>
				  <ul class='nav flex-column'>
			
				
				 <li class='nav-item'> <a href='readBlog.php?id={$blog['id']}' class=' nav-link text-success'> Read </a></li>
				<li class='nav-item'>	<a href='deleteBlog.php?id={$blog['id']}' class='nav-link text-success'> Delete </a></li>
					
					 </ul>
					 </td>
					 ";
			}else {
		
				echo "<td>
				<ul class='nav flex-column'>
					<a href='readBlog.php?id={$blog['id']}' class='nav-link text-success'> Read </a>
				</ul>
			</td>
			
			";
			}
				//	 echo (string)$str->collapseWhitespace();
		}
				 echo "</tr>";
				
					?>
		
	</table> 
</div>
</body>
</html>

