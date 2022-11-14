<?php

include_once '../classes/Dbh.class.php';
include_once '../classes/Tasks.class.php';
include_once '../classes/TasksContr.class.php';
include_once '../classes/Users.class.php';
include_once '../classes/UsersContr.class.php';



if (isset($_POST["dueDate"])) {

    $task_id = $_GET['taskid'];
    $devId = $_GET['devid'];
    $taskName = $_GET['taskname'];
    $tleadId = $_GET['tlead'];
    $pid = $_GET['pid'];

    $due_date = $_POST["dueDate"];

    $taskContrObj = new TasksContr();
    $taskContrObj->updateDate($due_date, $task_id);


    header("Location: ../viewTask.php?taskid=$task_id&projid=$pid");


    include '../sendEmail.php';
    $message = "Due date of the \"$taskName\" has been changed to $due_date ";
    sendEmailToUser($devId, $message);
    sendEmailToUser($tleadId, $message);

} else {
    echo "Error";
}