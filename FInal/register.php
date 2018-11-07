<!DOCTYPE html>
<html>
<head>
	<title>Eve Ship Repository - Register</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div id="wrapper">
    <div id="header">
        <h1><a href="index.php">EvE Ship Repository - Register</a></h1>
    </div> <!-- END div id="header" -->
    <div id="all_blogs">
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
 </div>
</body>
</html>