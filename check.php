<?php
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);

if (mb_strlen($email) < 5 || mb_strlen($email) > 55) {
    echo "Invalid length of email";
    exit;
} else if (mb_strlen($name) < 3 || mb_strlen($name) > 50) {
    echo "Invalid length of name";
    exit;
} else if (mb_strlen($password) < 4 || mb_strlen($password) > 15) {
    echo "Invalid length of password (from 8 to 15 symbols)";
    exit;
}

$password = md5($password . "otyybrjdf476");

$mysql = new mysqli('127.0.0.1', 'root', '', 'registration_db');

// Проверяем, есть ли уже пользователь с таким email
$stmt = $mysql->prepare("SELECT COUNT(*) FROM `users2` WHERE `email` = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count > 0) {
    echo "<h1>Email already taken. <a href=\"index.php\">Turn back to Registration</a></h1>";
    exit();
}

// Выполняем вставку нового пользователя
$stmt = $mysql->prepare("INSERT INTO `users2` (`email`, `name`, `pass`) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $email, $name, $password);
$stmt->execute();
$stmt->close();

$mysql->close();

echo "<h1>You have successfully registered! <a href=\"login.php\">Now You can login!</a></h1>";
exit();
