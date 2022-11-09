<?php

include '../classes/Dbh.class.php';
include '../classes/Projects.class.php';
include '../classes/ProjectsContr.class.php';
include '../classes/Tasks.class.php';
require '../classes/TasksView.class.php';
include '../classes/Comments.class.php';
include '../classes/CommentsContr.class.php';



$project_id = $_GET['varname'];



$taskObj = new TasksView();

$task_ids = $taskObj->getTaskIdByProject($project_id);

$commentObj = new CommentsContr();

foreach($task_ids as $task_id)
{
    $id = $task_id['task_id']; 
    $commentObj-> deleteCommentInTasks($id);
}


$projectObj = new ProjectsContr();

$projectObj-> deleteTasks($project_id);

$projectObj-> deleteProjects($project_id);

header("Location: ../project.php");