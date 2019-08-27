<<<<<<< HEAD
=======
<?php
	
	//  include '../app/QueryBuilders/users.php';
	// include '../app/QueryBuilders/blogs.php';
>>>>>>> 07b32ba79f0e402798cbfb9c72f052cddfa064f7


<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<<<<<<< HEAD
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  <table>
 
  	<tr>
  		<td><label>Username</label></td>
  		<td><input type="text" name="username" ></td>
  	</tr>
  	<tr>
      <td><label>Password</label></td>
      <td><input type="password" name="password"></td>
  	</tr>
  	<tr>
  		<td><button type="submit" class="btn" name="login_user">Login</button></td>
  	</tr>
      </table>
  	<p>
  		Not yet a member? <a href="signup.php">Sign up</a>
  	</p>
  </form>
=======
	 <table border="1">
		<caption>Users Detail</caption>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email ID</th>
			<th>Password</th>
			<th>Joined Date</th>
			
		</tr>
		<?php
		foreach($users as $user) {
			echo "<tr>";
	
				echo "<td> $user[id]</td>";
				echo "<td> $user[username]</td>";
				echo "<td> $user[email_id]</td>";
				echo "<td> $user[password]</td>";
				echo "<td> $user[joined_date]</td>";
					
		
			echo "</tr>";
		} ?>
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
>>>>>>> 07b32ba79f0e402798cbfb9c72f052cddfa064f7
</body>
</html>