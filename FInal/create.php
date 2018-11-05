<?php
require 'authenticate.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>EvE Ship Repository - New Ship</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
          <h1><a href="index.php">EvE Ship Repository - New Ship</a></h1>
        </div> <!-- END div id="header" -->
<ul id="menu">
    <li><a href="index.php" >Home</a></li>
    <li><a href="create.php" class='active'>New Post</a></li>
</ul> <!-- END div id="menu" -->
<div id="all_blogs">
  <form action="process_post.php" method="post">
    <fieldset>
      <legend>New Blog Post</legend>
      <p>
        <label for="title">Ship Name</label>
        <input name="title" id="title" />
      </p>
      <p>
      	<label for="hull">Hull</label>
        <input type="number" name="hull" min="1" value="1">
      </p>
      <p>
      	<label for="shield">Shield</label>
        <input type="number" name="shield" min="1" value="1">
      </p>
      <p>
      	<label for="armor">Armor</label>
        <input type="number" name="armor" min="1" value="1">
      </p>
      <p>
      	<label for="turrethardpoints">Turret Hardpoints</label>
        <input type="number" name="turrethardpoints" min="0" max="8" value="0">
      </p>
      <p>
      	<label for="missilehardpoints">Missile hardpoints</label>
        <input type="number" name="missilehardpoints" min="0" max="8" value="0">
      </p>
      <p>
        <input type="submit" name="command" value="Create" />
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
