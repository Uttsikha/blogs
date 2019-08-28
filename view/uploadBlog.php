<!DOCTYPE html>
<html>
<head>
	<title>Blogs</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">

</head>
<body class="container">
<?php
	require '../vendor/autoload.php';
	// include '../app/QueryBuilders/blogs.php';
	use App\QueryBuilders\Blog;
	session_start(); 
	$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
	$blog= new Blog();
	$target_dir = "../uploads/";
	if($_POST){
		if ($_FILES["photo"]["size"] > 30000) {
		    echo "  <a href='home.php'>
       		  Go to Home
   			 </a><br>	Sorry, your file is too large.";
		  }
		  else{
		  	$str=rand(); 
		   	$fileName =  md5($str) ;
			$target_file = $target_dir . $fileName;
			move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
			$blog->name = $_POST['name'];
			$blog->description = $_POST['description'];
			$blog->photo = $fileName;
			$blog->user_id=$id;
		
			if($blog->createBlog()){
			
				echo "<br><p class='text-primary'>Product was created.</p>
				<a href='home.php?id=".$user->id."' class='btn btn-success'>
				Go to Home Page
			  </a>
					";
			}else{
				echo "	<br><p class='text-primary'>Unable to create product.</p>
				<a href='home.php?id=".$user->id."' class='btn btn-success'>
				Go to Home Page
			  </a>
				";
			}
}}

	?>
	</body>
</html>