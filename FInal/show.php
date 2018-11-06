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

       // Build a comment query
       $commentquery = "SELECT * FROM comments WHERE shipid = :id";
      $commentstatement = $db->prepare($commentquery);
       //bind id and snitized
      $commentstatement->bindValue(':id', $id, PDO::PARAM_INT);
      $commentstatement->execute();
      $comments = $commentstatement->fetch();
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
    <form action="process_post.php" method="post">
    <fieldset>
      <legend>New Blog Post</legend>
      <p>
        <label for="comment">Make a Comment</label>
        <input name="comment" id="title">
      </p>
      <p>
        <label for="name">Name</label>
        <textarea name="name" id="content"></textarea>
      </p>
      <p>
        <label for="content">Content</label>
        <textarea name="content" id="content"></textarea>
      </p>
      <p><input type="hidden" name="shipid" value=<?= $post['id'] ?> /></p>
      <p>
        <input type="submit" name="command" value="CreateComment">
      </p>
    </fieldset>
  </form>
  <div id="all_blogs">
            <?php foreach($comments as $comment): ?>
                <div class="blog_post">
                  <p><?= $comment['username'] ?> said: <?= $comment['comment'] ?></p>
                  <p>
                  <small>
                    <a href="editcomment.php?id=<?= $comment['id'] ?>">edit comment</a>
                  </small>
                  </p>
                </div>
            <?php endforeach ?>
        </div>
  </div>
        <div id="footer">
            NKing Final
        </div> <!-- END div id="footer" -->
    </div> <!-- END div id="wrapper" -->
</body>
</html>
