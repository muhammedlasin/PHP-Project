<?php
session_start();
include 'includes/autoloader.inc.php';

$u_email = $_SESSION["email"];
$u_id = $_SESSION["users_id"];
$u_name = $_SESSION["users_name"];
$u_role = $_SESSION["users_role"];

if (strlen($_SESSION["email"]) == 0) {
    header('location:index.php');
} else {


    // include_once('classes/Dbh.class.php');
// include_once('classes/Users.class.php');
// include_once('classes/UsersView.class.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./styles/header.css?v = <? echo time(); ?>">
    <link rel="stylesheet" href="./styles/task.css?v = <? echo time(); ?>">
    <link rel="stylesheet" href="./styles/attachments.css?v = <? echo time(); ?>">
    <link rel="stylesheet" href="styles/project.css">
    <link rel="stylesheet" href="styles/createproject.css">
    <link rel="stylesheet" href="styles/projectDetail.css">
    <link rel="stylesheet" href="styles/viewTask.css">
    <link rel="stylesheet" href="styles/comment.css">
    <link rel="stylesheet" href="styles/project.css?v = <? echo time(); ?>">


    <title>CLNF</title>
</head>


<body>
    <?php

    ?>
    <header>

    <nav>
    <a href="#">CLNF Software</a>
    <a href="home.php">Home</a>
    <a href="project.php">Projects</a>
    <?php
    if($urole === 'admin'){
        echo "<a href='Users.php'>User Management</a>";
    }
    ?>
    <button type="submit" name="logout" onclick="window.location.href='./includes/logout.inc.php'">Logout</button>

    if ($u_role === 'admin') {
        echo "<a href='Users.php'>User Management</a>";
    }
            ?>
            <button type="submit" name="logout"
                onclick="window.location.href='./includes/logout.inc.php'">Logout</button>

        </nav>
    </header>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <?php

    // $_SESSION['role'] = 'team-lead';
    // $_SESSION['id'] = 8;

}
    ?>