<?php 
$email  = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$username   = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password1   = filter_input(INPUT_POST, 'password_1', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password2   = filter_input(INPUT_POST, 'password_2', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$hashed_Password = password_hash($password1, PASSWORD_DEFAULT);
if(isset($_REQUEST['command'])) {
    require 'connect.php';

    if ($_REQUEST['command'] == 'Register') {
        if ($password1 == $password2) {
            $query    ="INSERT INTO login (username, email, password) VALUES (:username, :email, :password)";
            $statement = $db->prepare($query);
            $statement->bindValue(':username', $username);
            $statement->bindValue(':password', $hashed_Password);
            $statement->bindValue(':email', $email);
            //Execute the sql
            $statement->execute();
            header("Location: index.php");
        }
    }
}
 ?>