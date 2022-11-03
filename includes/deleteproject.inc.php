<?php

include '../classes/Dbh.class.php';
include '../classes/Projects.class.php';
include '../classes/ProjectsContr.class.php';

$project_code = $_GET['varname'];

$projectObj = new ProjectsContr();

$projectObj-> deleteTasks($project_code);

$projectObj-> deleteProjects($project_code);

header("Location: ../project.php");