<?php

include_once '../classes/Dbh.class.php';
include_once '../classes/Tasks.class.php';
include_once '../classes/TasksContr.class.php';

if (isset($_POST["assignee"])) {

    $developer_id = $_POST["assignee"];

    $task_id = $_GET['taskid'];

    $taskContrObj = new TasksContr();

    $taskContrObj->updateDeveloper($developer_id, $task_id);

    header("Location: ../viewTask.php?taskid=$task_id");

}