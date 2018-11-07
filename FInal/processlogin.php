<?php
$username   = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password   = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (isset($_REQUEST['command'])) {
    
    if ($_REQUEST['command'] == 'login') {
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: welcome.php");
        exit;
        }
        else if ($username != "" || $password != "") {
            require 'connect.php';

            $hashed_password ="SELECT password FROM login WHERE user = :username";
            $statement->bindValue(':username', $username);
            $statement->execute();

            if (password_verify($password, $hashed_password)) {
            $id ="SELECT id FROM login WHERE user = :username";
            $statement->bindValue(':username', $username);
            $statement->execute();

                session_start();
                            
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