<?php
// connect to the database server by creating an PDO object
	define('DB_DSN','mysql:host=localhost;dbname=serverside;charset=utf8');
	define('DB_USER','serveruser');
	define('DB_PASS','gorgonzola7!');

// add error handing to the previous connection script
	try {
		$db = new PDO(DB_DSN, DB_USER, DB_PASS);
	} catch (PDOException $e) {
		print "Connection Error: " . $e->getMessage();
		die(); // Force execution to stop on errors.
  }
?>
