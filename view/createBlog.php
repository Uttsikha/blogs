
<?php
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
	echo"
	<form action='uploadBlog.php?id=".$id."' method='post' enctype='multipart/form-data'>";
	echo "<br><a href='home.php?id=".$id."'>
	Go to Home Page
  </a>
 ";
	?> 
	    <table>
	 		<tr>
	            <td>Blog Name</td>
	            <td><input type='text' name='name'/></td> 
	        </tr>
	 
	        <tr>
	            <td>Blog Description</td>
	            <td> <textarea name="description"></textarea> </td>
	        </tr>
	 
	        <tr>
	            <td>Blog Photo</td>
	            <td><input type="file" name="photo" id="photo"></td>
	        </tr>
	  	    <tr>
	           
	            <td colspan="2">
	                 <input type="submit" value="Upload Blog" name="submit">
	            </td>
	        </tr>
	 
	    </table>
	</form>
