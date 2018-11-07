<!DOCTYPE html>
<html>
<head>
	<title>Eve Ship Repository - Login</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div id="wrapper">
    <div id="header">
        <h1><a href="index.php">EvE Ship Repository - Login</a></h1>
    </div> <!-- END div id="header" -->
    <div id="all_blogs">
<form method="post" action="processlogin.php">
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username">

  	  <label>Email</label>
  	  <input type="email" name="email">

  	  <label>Password</label>
  	  <input type="password" name="password">

  	  <input type="submit" name="command" value="Login" />
  	<p>
  		Not a member? <a href="register.php">Register!</a>
  	</p>
  </form>
 </div>
</body>
</html>