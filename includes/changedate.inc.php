<?php

include_once '../classes/Dbh.class.php';
include_once '../classes/Tasks.class.php';
include_once '../classes/TasksContr.class.php';

if (isset($_POST["dueDate"])) {

    $task_id = $_GET['taskid'];
    $due_date = $_POST["dueDate"];
    $taskContrObj = new TasksContr();
    $taskContrObj->updateDate($due_date, $task_id);

    header("Location: ../viewTask.php?taskid=$task_id&update=date");


} else {
    echo "Error";
}