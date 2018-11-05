<?php

require 'authenticate.php';

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
    <title>EvE Ship Repository - Edit Ship</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php">EvE Ship Repository - Edit Ship</a></h1>
        </div> <!-- END div id="header" -->
<ul id="menu">
    <li><a href="index.php" >Home</a></li>
    <li><a href="create.php" >New Ship</a></li>
</ul> <!-- END div id="menu" -->
<div id="all_blogs">
  <form action="process_post.php" method="post">
    <fieldset>
      <legend>Edit Ship</legend>
      <p>
        <label for="title">Ship</label>
        <input name="title" id="title" value="<?= $post['name'] ?>" />
      </p>
      <p>
        <label for="hull">Hull</label>
        <input type="number" name="hull" value="<?= $post['hull'] ?>">
      </p>
      <p>
        <label for="shield">Shield</label>
        <input type="number" name="shield" value="<?= $post['shield'] ?>">
      </p>
      <p>
        <label for="armor">Armor</label>
        <input type="number" name="armor" value="<?= $post['armor'] ?>">
      </p>
      <p>
        <label for="turrethardpoints">Turret Hardpoints</label>
        <input type="number" name="turrethardpoints" value="<?= $post['turret_hardpoints'] ?>">
      </p>
      <p>
        <label for="missilehardpoints">Missile hardpoints</label>
        <input type="number" name="missilehardpoints" value="<?= $post['missile_hardpoints'] ?>">
      </p>
      <p>
        <input type="hidden" name="id" value=<?= $post['id'] ?> />
        <input type="submit" name="command" value="Update" />
        <input type="submit" name="command" value="Delete" onclick="return confirm('Are you sure you wish to delete this post?')" />
      </p>
    </fieldset>
  </form>
</div>
        <div id="footer">
            NKing Final
        </div> <!-- END div id="footer" -->
    </div> <!-- END div id="wrapper" -->
</body>
</html>
