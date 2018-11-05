<?php

$ship   = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$hull      = filter_input(INPUT_POST, 'hull', FILTER_SANITIZE_NUMBER_INT);
$shield      = filter_input(INPUT_POST, 'shield', FILTER_SANITIZE_NUMBER_INT);
$armor      = filter_input(INPUT_POST, 'armor', FILTER_SANITIZE_NUMBER_INT);
$turrethardpoints      = filter_input(INPUT_POST, 'turrethardpoints', FILTER_SANITIZE_NUMBER_INT);
$missilehardpoints      = filter_input(INPUT_POST, 'missilehardpoints', FILTER_SANITIZE_NUMBER_INT);
$id      = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

if(isset($_REQUEST['command'])) {
    require 'connect.php';

    if ($_REQUEST['command'] == 'Create') {
        if ((strlen($ship)>1)) {
            // Build the parameterized SQL query and bind to the above sanitized values.
            $query     = "INSERT INTO ship (name, hull, shield, armor, turret_hardpoints, missile_hardpoints) VALUES (:name, :hull, :shield, :armor, :turret_hardpoints, :missile_hardpoints)";
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $ship);
            $statement->bindValue(':hull', $hull);
            $statement->bindValue(':shield', $shield);
            $statement->bindValue(':armor', $armor);
            $statement->bindValue(':turret_hardpoints', $turrethardpoints);
            $statement->bindValue(':missile_hardpoints', $missilehardpoints);
            // Execute the SQL.
            $statement->execute();
            header("Location: index.php");
        }
    } else if ($_REQUEST['command'] == 'Update') {
        // Build the parameterized SQL query and bind to the above sanitized values.
        $query     = "UPDATE ship SET name = :name, hull = :hull, shield = :shield, armor = :armor, turret_hardpoints = :turret_hardpoints, missile_hardpoints = :missile_hardpoints WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $ship);
        $statement->bindValue(':hull', $hull);
        $statement->bindValue(':shield', $shield);
        $statement->bindValue(':armor', $armor);
        $statement->bindValue(':turret_hardpoints', $turrethardpoints);
        $statement->bindValue(':missile_hardpoints', $missilehardpoints);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        // Execute the SQL.
        $statement->execute();
        header("Location: index.php");
    } else if ($_REQUEST['command'] == 'Delete') {
        $query = "DELETE FROM ship WHERE id = :id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        // Execute the SQL.
        $statement->execute();
        header("Location: index.php");
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
        <h1>An error occured while processing your post.</h1>
        <p>The ship name must be at least one character.</p>
        <a href="index.php">Return Home</a>

        <div id="footer">
            NKing Final
        </div> <!-- END div id="footer" -->
    </div> <!-- END div id="wrapper" -->
</body>
</html>
