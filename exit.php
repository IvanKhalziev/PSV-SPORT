<?php
setcookie('user', $user['email'], time() - 3600, "/");
header('Location: index.php');
