<html>
<head>
  <title>Registration</title>
  <html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
</head>
<body> 
</head>
<body class="container">
	<br>
	<p class="center h2 text-primary">Register</p>
 
  
  <form method="post" action="register.php">
  	<div class="form-group">
  	 	 <label>Username</label>
	    <input type="text" name="username" value="" class="form-control">
	</div>
   	<div class="form-group">
	   <label>Email</label>
	   <input type="email" name="email" value="" class="form-control">
	</div>
	<div class="form-group">
	   <label>Password</label>
	  <input type="password" name="password_1" class="form-control">
	</div>
	<div class="form-group">
	   <label>Confirm password</label>
	  <input type="password" name="password_2" class="form-control">
	  </div>
  
  	 <button type="submit"  name="reg_user" class=" btn btn-success">Register</button>
  	
  	<p>
  		Already a member? <a href="index.php" class="text-success">Sign in</a>
  	</p>
  </form>
</body>
</html>