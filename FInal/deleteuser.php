<?php
$userid      = filter_input(INPUT_POST, 'userid', FILTER_SANITIZE_NUMBER_INT);


if(isset($_REQUEST['command'])) {
    require 'connect.php';
	if ($_REQUEST['command'] == 'Delete User') {
	        $query = "DELETE FROM login WHERE id = :id";
	        $statement = $db->prepare($query);
	        $statement->bindValue(':id', $userid, PDO::PARAM_INT);
	        // Execute the SQL.
	        $statement->execute();
	        header("Location: admin.php");
	    }
}
?>