<?php
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);

$password = md5($password . "otyybrjdf476");

$mysql = new mysqli('127.0.0.1', 'root', '', 'registration_db');

$result = $mysql->query("SELECT * FROM `users2` WHERE `email` = '$email' AND `pass` = '$password'");
$user = $result->fetch_assoc();

if ($user === null) {
    echo "User not found";
    exit();
}

setcookie('user', $user['email'], time() + 3600, "/");

$mysql->close();

header('Location: home.php');
