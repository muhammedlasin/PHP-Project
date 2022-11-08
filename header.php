<?php
ob_start();
?>
<?php

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
include_once ('classes/Dbh.class.php');
include_once ('classes/Users.class.php');
include_once ('classes/UsersView.class.php');
$user_role = 'admin';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CLNF</title>
</head>
<body>
    <header>
    <nav>
    <a href="#">CLNF Software</a>
    <a href="#">Home</a>
    <a href="#">Projects</a>
    <?php
    if($user_role === 'admin'){
        echo "<a href='/PHP_testing/Users.php'>User Management</a>";
    }
    ?>
    <button type="submit" name="logout" onclick="window.location.href='./includes/logout.inc.php'">Logout</button>

    </nav>
    </header>