

<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
</head>
<body class="container">
  <div class="header">
  <br>
  	<p class="center h2 text-primary">Login</p>
  </div>
  <form method="post" action="login.php">
  <div class="form-group row">
  	<div class="col-md-2"><label>Username</label></div>
	  <div class="col-md-6"><input type="text" name="username" class="form-control" ></div>
	  </div>
	 <div class="form-group row">
		  <div class="col-md-2"><label>Password</label></div>
		  <div class="col-md-6"><input type="password" name="password" class="form-control "></div>
	</div>
  	<button type="submit" name="login_user" class=" btn btn-success">Login</button>
  
  	<p>
  		Not yet a member? <a href="signup.php" class="text-success">Sign up</a>
  	</p>
  </form>
</body>
</html>