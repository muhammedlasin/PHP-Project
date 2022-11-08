<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

//temporarily including classes. Needs to be replaced by an autoloader

include './classes/Dbh.class.php';
include './classes/Users.class.php';
include './classes/UsersView.class.php';
include './classes/UsersContr.class.php';
include './classes/Tasks.class.php';
include './classes/TasksView.class.php';
include './classes/TasksContr.class.php';
include './classes/Projects.class.php';
include './classes/ProjectsView.class.php';
include './classes/ProjectsContr.class.php';
include './classes/Attachments.class.php';
include './classes/AttachmentsView.class.php';
include './classes/AttachmentsContr.class.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/header.css?v = <? echo time(); ?>">
    <link rel="stylesheet" href="./styles/task.css?v = <? echo time(); ?>">
    <link rel="stylesheet" href="./styles/projectDetail.css?v = <? echo time(); ?>">
    <link rel="stylesheet" href="./styles/attachments.css?v = <? echo time(); ?>">
    <title>CLNF</title>
</head>

<body>
    <?php

    ?>
    <header>
        <nav>
            <a href="#">CLNF Software</a>
            <a href="#">Home</a>
            <a href="./project.php">Projects</a>
        </nav>
    </header>