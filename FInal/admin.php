<?php

//Require the connect.php file
require 'connect.php';
//This is for admins so it needs the auth
require 'authenticate.php';

$query = "SELECT * FROM login";
$statement = $db->prepare($query); // Returns a PDOStatement object.
$statement->execute(); // The query is now executed.
$users= $statement->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>EvE Ship Repository</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">EvE Ship Repository</a></h1>
        </div> <!-- END div id="header" -->
        <ul id="menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="create.php" >New Ship</a></li>
            <li><a href="register.php" >Register</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="admin.php" class='active'>Admin</a></li>
        </ul> <!-- END ul id="menu" -->
        <div id="all_blogs">
        <h2>Add User:</h2>
            <div id="all_blogs">
                <form method="post" action="processregisteradmin.php">
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
                </form>
              </div>
        <h3>Users:</h3>
            <?php foreach($users as $user): ?>
                <div class="blog_post">
                    <p><?= $user['user'] ?></p>
                    <form action="Deleteuser.php" method="post">
                        <input type="hidden" name="userid" value=<?= $user['id'] ?> />
                        <input type="submit" name="command" value="Delete User" onclick="return confirm('Are you sure you wish to delete this user?')"/>
                    </form>
                </div>
                <br>
            <?php endforeach ?>
        </div> <!-- END div id="all_blogs" -->
        <div id="footer">
            NKing Final
        </div> <!-- END div id="footer" -->
    </div> <!-- END div id="wrapper" -->
</body>
</html>