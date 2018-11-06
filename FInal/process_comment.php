<?php 
$username   = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$content   = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$shipid      = filter_input(INPUT_POST, 'shipid', FILTER_SANITIZE_NUMBER_INT);
$commentid      = filter_input(INPUT_POST, 'commentid', FILTER_SANITIZE_NUMBER_INT);
if(isset($_REQUEST['command'])) {
    require 'connect.php';

    else if ($_REQUEST['command'] == 'Create Comment') {
        $query    ="INSERT INTO comments (username, comment, shipid) VALUES (:username, :comment, :shipid)";
        $statement = $db->prepare($query);
        $statement->bindValue(':shipid', $shipid, PDO::PARAM_INT);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':comment', $comment);
        //Execute the sql
        $statement->execute();
        header("Location: index.php");
    } else if ($_REQUEST['command'] == 'Delete Comment') {
        $query = "DELETE FROM comment WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $commentid, PDO::PARAM_INT);
        // Execute the SQL.
        $statement->execute();
        header("Location: index.php");
    }
    else if ($_REQUEST['command'] == 'Update Comment') {
        $query     = "UPDATE comments SET username = :username, comment = :comment WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $commentid, PDO::PARAM_INT);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':comment', $comment);

        //Execute
        $statement->execute();
        header("Location: index.php");
    }

}
 ?>