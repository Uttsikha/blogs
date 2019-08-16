<?php

include '../app/QueryBuilders/blogs.php';

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');


$blog = new Blog();
$blog->id=$id;

 if($blog->deleteBlog()){

        echo "<a href='index.php' class='btn'> Go to Home</a>";
        echo "Object was deleted.";
    }
     
    // if unable to delete the product
    else{
        echo "Unable to delete object.";
    
}
?>
