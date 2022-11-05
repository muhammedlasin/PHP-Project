<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include 'classes/Dbh.class.php';
include 'classes/Projects.class.php';
include 'classes/ProjectsContr.class.php';
include 'classes/ProjectsView.class.php';
require 'classes/Tasks.class.php';
require 'classes/TasksView.class.php';
include 'classes/Users.class.php';
include 'classes/UsersView.class.php';
include 'classes/Comments.class.php';
include 'classes/CommentsContr.class.php';
include 'classes/CommentsView.class.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/project.css">
    <title>CLNF</title>
</head>
<body>
    <header>
    <nav style="width:25%">
    <a href="#">CLNF Software</a>
    <a href="#">Home</a>
    <a href="project.php">Projects</a>
    </nav>
    </header>
