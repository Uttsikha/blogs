<?php
	
	 include '../app/QueryBuilders/users.php';
	include '../app/QueryBuilders/blogs.php';


	 $user = new User();
	 $users = $user->allUsers();

	 $blog = new Blog();
	 $blogs = $blog->allBlogs();
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Blogs</title>
</head>
<body>
	 <table border="1">
		<caption>Users Detail</caption>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email ID</th>
			<th>Password</th>
			<th>Joined Date</th>
			
		</tr>
		<tr>
			<?php
			foreach($users as $user) {
				echo "<td> $user[id]</td>";
				echo "<td> $user[name]</td>";
				echo "<td> $user[email_id]</td>";
				echo "<td> $user[password]</td>";
				echo "<td> $user[joined_date]</td>";
					
			}
			?>
		</tr>
	</table> 
	<div><a href="createBlog.php">Create a Blog</a></div>
	 <table border="1">
		<caption>Blogs Detail</caption>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Description</th>
			<th>Picture</th>
			<th>Posted Date</th>
			<th>User ID</th>
			<th>Actions</th>
		</tr>
	
			<?php
			foreach($blogs as $blog) {
				  $imageURL = 'uploads/'.$blog["photo"];
				echo "	<tr><td> $blog[id]</td>";
				echo "<td> $blog[name]</td>";
				echo "<td> $blog[description]</td>";
				echo '<td><img src="'.$imageURL.'"width="100" height="100"/></td>';
				echo "<td> $blog[posted_date]</td>";
				echo "<td> $blog[user_id]</td>";
				  echo "<td>";
					     echo "<a href='readBlog.php?id={$blog['id']}'>
					      Read
					 </a>
					 
					 <a href='updateBlog.php?id={$blog['id']}'>
					     Edit
					 </a>
					 
					 <a href='deleteBlog.php?id={$blog['id']}'>
					      Delete
					 </a>";
                 echo "</td></tr>";
			}
			?>
		
	</table> 
</body>
</html>

