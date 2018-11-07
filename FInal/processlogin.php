<?php
$username   = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password   = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (isset($_REQUEST['command'])) {
    
    if ($_REQUEST['command'] == 'login') {
        
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
        <a href="login.php">try again</a>

        <div id="footer">
            NKing Final
        </div> <!-- END div id="footer" -->
    </div> <!-- END div id="wrapper" -->
</body>
</html>