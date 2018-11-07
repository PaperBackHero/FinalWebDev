<!DOCTYPE html>
<html>
<head>
	<title>Eve Ship Repository - Register</title>
</head>
<body>
<h2>Register</h2>
<form method="post" action="processlogin.php">
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username">

  	  <label>Email</label>
  	  <input type="email" name="email">

  	  <label>Password</label>
  	  <input type="password" name="password_1">

  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">

  	  <input type="submit" name="command" value="Register" />
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>