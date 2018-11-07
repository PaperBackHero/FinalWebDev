<?php 
$email  = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$username   = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password1   = filter_input(INPUT_POST, 'password_1', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password2   = filter_input(INPUT_POST, 'password_2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$hashed_Password = password_hash($password1, PASSWORD_DEFAULT);

if(isset($_REQUEST['command'])) {
    require 'connect.php';

    if ($_REQUEST['command'] == 'Register') {
        if ($password1 == $password2) {
            $query    = "INSERT INTO login (user, password, email) VALUES (:user, :password, :email)";
            $statement = $db->prepare($query);
            $statement->bindValue(':user', $username);
            $statement->bindValue(':password', $hashed_Password);
            $statement->bindValue(':email', $email);
            //Execute the sql
            $statement->execute();
            header("Location: admin.php");
        }
    }
}
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> EvE Ship Repository - Error</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">EvE Ship Repository</a></h1>
        </div>
        <h1>An error occured while processing your registration.</h1>
        <a href="admin.php">Registration</a>

        <div id="footer">
            NKing Final
        </div> <!-- END div id="footer" -->
    </div> <!-- END div id="wrapper" -->
</body>
</html>