<?php

require '../vendor/autoload.php';
// include '../app/QueryBuilders/blogs.php';
 use App\QueryBuilders\Blog;
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

$blog = new Blog();
$blog->id=$id;

 $blog->readBlog();
   $imageURL = 'uploads/'.$blog->photo;
      echo "<div>";
    echo "<a href='home.php'>";
        echo " Go to Home";
    echo "</a>";
echo "</div>";	
echo "<table class='table' border=1>";
 
    echo "<tr>";
        echo "<td>ID</td>";
        echo "<td>{$blog->id}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Name</td>";
        echo "<td>{$blog->name}</td>";
    echo "</tr>";
 
    echo "<tr>";
        echo "<td>Photo</td>";
        if (file_exists($imageURL)){
            echo "<td><img src= 'uploads/{$blog->photo}' width='100' height='100'/></td>";
        }else{
            echo '<td>No picture on display</td>';
    }
       
    echo "</tr>";
      echo "<tr>";
        echo "<td>Posted Date</td>";
        echo "<td>{$blog->posted_date}</td>";
    echo "</tr>";
     echo "<tr>";
        echo "<td>Description</td>";
        echo "<td>{$blog->description}</td>";
 	  echo "</tr>";
 
echo "</table>";
   
?>
