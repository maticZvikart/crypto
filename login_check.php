<?php
session_start();

include_once "database.php";

$email = $_POST['email'];
$pass = $_POST['pass'];

if (!empty($email) && !empty($pass))
 {
     $query = "SELECT * FROM users WHERE email = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$email]);

if($stmt->rowCount() == 1)
 {
    $user = $stmt->fetch(); 

    if (password_verify($pass,$user['pass'])) //first name, last name, id, pass
    {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['admin'] = $user['admin'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['Last_name'] = $user['last_name'];
        header("Location: index.php");
        die();
    }
 }
}
 
header("Location: login.php");
die();

?>