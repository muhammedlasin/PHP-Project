<?php
session_start();
ob_start();
?>
<?php

include 'includes/autoloader.inc.php';

// include_once ('classes/Dbh.class.php');
// include_once ('classes/Users.class.php');
// include_once ('classes/UsersView.class.php');
// $user_role = 'admin';
$urole= $_SESSION["users_role"];
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

    </nav>
    </header>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

