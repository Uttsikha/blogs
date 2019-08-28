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
$blog = new App\QueryBuilders\Blog();
$blog->id=$id;
 if($blog->deleteBlog()){
    echo "<br><br><p class='h5 text-primary'>Object was deleted.</p>";
        echo "<a href='home.php?id=".$user->id."' class='btn btn-success'>
        Go to Home Page
      </a>";
        
    }  
    // if unable to delete the product
    else{
        echo "<br><br><p class='h5 text-primary'>Unable to delete object.</p>";
    
}
?>
</body>
</html>