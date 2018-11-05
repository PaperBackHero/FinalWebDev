<?php

//Require the connect.php file
require 'connect.php';//require or include

$query = "SELECT * FROM ship";
$statement = $db->prepare($query); // Returns a PDOStatement object.
$statement->execute(); // The query is now executed.
$posts= $statement->fetchAll();
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
            <li><a href="index.php" class='active'>Home</a></li>
            <li><a href="create.php" >New Ship</a></li>
        </ul> <!-- END ul id="menu" -->
        <div id="all_blogs">
            <?php foreach($posts as $post): ?>
                <div class="blog_post">
                    <h2><a href="show.php?id=<?= $post['id'] ?>"> <?= $post['name'] ?></a></h2>
                </div>
            <?php endforeach ?>
        </div> <!-- END div id="all_blogs" -->
        <div id="footer">
            NKing Final
        </div> <!-- END div id="footer" -->
    </div> <!-- END div id="wrapper" -->
</body>
</html>
