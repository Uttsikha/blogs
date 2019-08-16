<html>
<head>
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <tr class="header">
  	<h2>Register</h2>
  </tr>
	
  <form method="post" action="register.php">
  <table>
  	<tr>
  	 <td> <label>Username</label></td>
	   <td> <input type="text" name="username" value=""></td>
  	</tr>
  	<tr>
	  <td> <label>Email</label></td>
	  <td> <input type="email" name="email" value=""></td>
  	</tr>
  	<tr>
	  <td> <label>Password</label></td>
	  <td><input type="password" name="password_1"></td>
  	</tr>
  	<tr>
	  <td> <label>Confirm password</label></td>
	  <td><input type="password" name="password_2"></td>
  	</tr>
  	<tr>
  	 <td> <button type="submit" class="btn" name="reg_user">Register</button></td>
  	</tr>
	  </table>
  	<p>
  		Already a member? <a href="loginPage.php">Sign in</a>
  	</p>
  </form>
</body>
</html>