<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
</head>
<body class="container"> 
<br>
<?php

require '../vendor/autoload.php';
// include '../app/QueryBuilders/blogs.php';
 use App\QueryBuilders\Blog;
 use Carbon\Carbon;
 
 session_start(); 
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

$blog = new Blog();
$blog->id=$id;

 $blog->readBlog();
   $imageURL = '../uploads/'.$blog->photo;
      echo "<div>";
    echo "<a href='home.php' class='btn btn-success'>";
        echo " Go to Home";
    echo "</a><br><br>";
echo "</div>";	
echo "<table class='table-sm table-hover table-bordered table-striped'>
<caption class='text-center text-primary'>Blog Detail</caption> 
";
 
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
            echo "<td><img src= '../uploads/{$blog->photo}' class='img-fluid mx-auto'/></td>";
        }else{
            echo '<td>No picture on display</td>';
    }
       
    echo "</tr>";
      echo "<tr>";
        echo "<td>Posted Date</td>";
        echo "<td>".Carbon::parse($blog->posted_date)->diffForHumans()."</td>";
    echo "</tr>";
     echo "<tr>";
        echo "<td>Description</td>";
        echo "<td>{$blog->description}</td>";
 	  echo "</tr>";
 
echo "</table>";
   
?>
