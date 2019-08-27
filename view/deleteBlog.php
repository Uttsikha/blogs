<?php
require '../vendor/autoload.php';
// include '../app/QueryBuilders/blogs.php';
 use App\QueryBuilders\Blog;
 session_start(); 

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');


$blog = new App\QueryBuilders\Blog();
$blog->id=$id;

 if($blog->deleteBlog()){

        echo "<a href='home.php' class='btn'> Go to Home</a><br>";
        echo "Object was deleted.";
    }
     
    // if unable to delete the product
    else{
        echo "Unable to delete object.";
    
}
?>
