<?php
	require '../vendor/autoload.php';
	// include '../app/QueryBuilders/blogs.php';
	use App\QueryBuilders\Blog;
	$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

	$blog= new Blog();

	$target_dir = "uploads/";
	
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
	        echo "
		<br><a href='home.php?id=".$id."'>
			Go to Home Page
		  </a>
		
	        <div class='alert'>Product was created.</div>";
	    }
	    else{
	    	echo "
	        <br><a href='home.php?id=".$id."'>
			Go to Home Page
		  </a>
	        <div class='alert'>Unable to create product.</div>";
	    }
}}
	

	?>