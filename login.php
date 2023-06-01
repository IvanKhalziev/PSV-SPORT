<?php
ini_set('display_errors', 0);
error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in Gymnastik PSV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    if ($_COOKIE['user'] == '') :

    ?>
        <div class="d-flex flex-column align-items-center p-2">
            <h1 class="text-center">Log in Gymnastik PSV</h1>
            <form action="auth.php" method="post">
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email"><br>
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password"><br>
                <button class="btn btn-success" type="submit">Log In</button>
            </form>
        </div>
    <?php else :
        header('Location: home.php');
    ?>
    <?php
    endif;
    ?>
</body>

</html>