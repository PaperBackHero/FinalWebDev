<?php
$username   = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password   = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

require 'connect.php';

session_start();

if (isset($_REQUEST['command'])) {
    if ($_REQUEST['command'] === 'Login') {
        if ($username !== false && $password !== false && !is_null($username) && !is_null($password) && $username !== "" && $password !== "") {
            $query ="SELECT password FROM login WHERE user = $username";
            $statement = $db->prepare($query);
            $statement->bindValue(':username', $username);
            $statement->execute();
            $hashed_password = $statement->fetch();
            print_r($hashed_password);
                if (password_verify($password, $hashed_password)) {
                $query ="SELECT id FROM login WHERE user = ':username'";
                $statement = $db->prepare($query);
                $statement->bindValue(':username', $username);
                $statement->execute();
                $id = $statement->fetch();
                    // Store data in session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $id;
                    $_SESSION["username"] = $username;

                    // Redirect user to welcome page
                    header("location: welcome.php");
                }
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
        <h1>An error occured while processing your login.</h1>
        <p>Username or password was incorrect.</p>
        <a href="login.php">Try again</a>
        <a href="index.php">Home</a>

        <div id="footer">
            NKing Final
        </div> <!-- END div id="footer" -->
    </div> <!-- END div id="wrapper" -->
</body>
</html>