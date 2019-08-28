<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
</head>
<body> 

<div class="container">
<?php
	$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
		echo"
		<form action='uploadBlog.php?id=".$id."' method='post' enctype='multipart/form-data'>";
		echo "<br><a href='home.php?id=".$id."' class='h5 text-success'>Go to Home Page</a>
	";
?>
	 <form method="post" action="">
	 	<div class="form-group">
		 	<label>Blog Name</label>
	        <input type='text' name='name'  class="form-control" >
	    </div>
		<div class="form-group">  
			<label>Blog Description</label>
	        <textarea name="description"  class="form-control" ></textarea>
		</div>
		<div class="form-group">
			<label>Blog Photo</label>
	        <input type="file" name="photo" id="photo" class="form-control-file text-primary" >
		</div>
		<div class="form-group"> 
	        <input type="submit" value="Upload Blog" name="submit" class="form-control btn btn-success ">
		</div>
	
	</form>
	</div>
	</body>
</html>
