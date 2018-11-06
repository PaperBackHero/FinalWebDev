<?php

require 'authenticate.php';

require 'connect.php';//require or include

// Sanitize $_GET['id'] to ensure it's a number.
       $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

       // Build a query using ":id" as a placeholder parameter.
       $query = "SELECT * FROM comments WHERE id = :id";
       $statement = $db->prepare($query);

       // Bind the :id parameter in the query to the previously
       // sanitized $id specifying a type of INT.
       $statement->bindValue(':id', $id, PDO::PARAM_INT);
       $statement->execute();
       $comment = $statement->fetch();
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
      <legend>Edit Comment</legend>
      <p>
        <label for="name">Name</label>
        <textarea name="name" id="content" value="<?= $comment['username'] ?>"></textarea>
      </p>
      <p>
        <label for="content">Content</label>
        <textarea name="content" id="content" value="<?= $comment['comment'] ?>"></textarea>
      </p>
      <input type="hidden" name="commentid" value=<?= $comment['id'] ?> />
      <input type="hidden" name="shipid" value=<?= $comment['shipid'] ?> />
        <input type="submit" name="command" value="Update Comment" />
        <input type="submit" name="command" value="Delete Comment" onclick="return confirm('Are you sure you wish to delete this comment?')" />
    </fieldset>
  </form>
</div>
        <div id="footer">
            NKing Final
        </div> <!-- END div id="footer" -->
    </div> <!-- END div id="wrapper" -->
</body>
</html>
