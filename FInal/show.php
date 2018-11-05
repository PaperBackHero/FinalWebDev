<?php
//Require the connect.php file
require 'connect.php';//require or include

// Sanitize $_GET['id'] to ensure it's a number.
       $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

       // Build a query using ":id" as a placeholder parameter.
       $query = "SELECT * FROM ship WHERE id = :id";
       $statement = $db->prepare($query);

       // Bind the :id parameter in the query to the previously
       // sanitized $id specifying a type of INT.
       $statement->bindValue(':id', $id, PDO::PARAM_INT);
       $statement->execute();
       $post = $statement->fetch();
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
            <h1><a href="index.php">EvE Ship Repository - <?= $post['name'] ?></a></h1>
        </div> <!-- END div id="header" -->
<ul id="menu">
    <li><a href="index.php" >Home</a></li>
    <li><a href="create.php" >New Ship</a></li>
</ul> <!-- END div id="menu" -->
  <div id="all_blogs">
    <div class="blog_post">
      <h2><?= $post['name'] ?></a></h2>
      <p>
        <small>
          <a href="edit.php?id=<?= $post['id'] ?>">edit</a>
        </small>
      </p>
      <div class='blog_content'>
        <p><?= $post['name'] ?></p>
        <p>Hull Amount: <?= $post['hull'] ?></p>
        <p>Shield Amount: <?= $post['shield'] ?></p>
        <p>Armor Amount: <?= $post['armor'] ?></p>
        <p>Turret Hardpoints: <?= $post['turret_hardpoints'] ?></p>
        <p>Missile Hardpoints: <?= $post['missile_hardpoints'] ?></p>
      </div>
    </div>
  </div>
        <div id="footer">
            NKing Final
        </div> <!-- END div id="footer" -->
    </div> <!-- END div id="wrapper" -->
</body>
</html>
