
	<form action="uploadBlog.php" method="post" enctype="multipart/form-data">
	 
	   <a href='index.php'> Go to Home </a>
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
	            <td>User Id</td>
	            <td><input type="number" name='user_id'></td>
	        </tr>

	  	    <tr>
	           
	            <td colspan="2">
	                 <input type="submit" value="Upload Blog" name="submit">
	            </td>
	        </tr>
	 
	    </table>
	</form>
