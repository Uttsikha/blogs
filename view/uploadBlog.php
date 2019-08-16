<?php

	include '../app/QueryBuilders/blogs.php';

	$blog= new Blog();

	$target_dir = "uploads/";
	
	if($_POST){
		if ($_FILES["photo"]["size"] > 300000) {
		    echo "  <a href='index.php'>
       		  Go to Home
   			 </a>	Sorry, your file is too large.";
		  }
		  else{
		  		$str=rand(); 

		   		$fileName =  md5($str) ;
 	
		$target_file = $target_dir . $fileName;
		move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
		$blog->name = $_POST['name'];
	    $blog->description = $_POST['description'];
		$blog->photo = $fileName;

	
	    $blog->user_id=$_POST['user_id'];
	    if($blog->createBlog()){
	        echo "
	         <a href='index.php'>
       		  Go to Home
   			 </a>	
	        <div class='alert'>Product was created.</div>";
	    }
	    else{
	    	echo "
	        <a href='index.php'>
       		  Go to Home
   			 </a>	
	        <div class='alert'>Unable to create product.</div>";
	    }
}}
	

	?>