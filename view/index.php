

<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  <table>
 
  	<tr>
  		<td><label>Username</label></td>
  		<td><input type="text" name="username" ></td>
  	</tr>
  	<tr>
      <td><label>Password</label></td>
      <td><input type="password" name="password"></td>
  	</tr>
  	<tr>
  		<td><button type="submit" class="btn" name="login_user">Login</button></td>
  	</tr>
      </table>
  	<p>
  		Not yet a member? <a href="signup.php">Sign up</a>
  	</p>
  </form>
</body>
</html>