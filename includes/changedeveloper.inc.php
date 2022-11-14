<?php

include_once '../classes/Dbh.class.php';
include_once '../classes/Tasks.class.php';
include_once '../classes/TasksContr.class.php';
include_once '../classes/Users.class.php';
include_once '../classes/UsersContr.class.php';


if (isset($_POST["assignee"])) {

    echo "d";
    $developer_id = $_POST["assignee"];


    $tleadId = $_GET["tlead"];

    $devId = $_GET["devid"];

    $task_id = $_GET['taskid'];

    $taskName = $_GET['taskname'];

    $pid = $_GET['pid'];




    $taskContrObj = new TasksContr();

    $taskContrObj->updateDeveloper($developer_id, $task_id);



    header("Location: ../viewTask.php?taskid=$task_id&projid=$pid");

    include '../sendEmail.php';
    $message = "New developer assigned to your task \"$taskName\" ";
    sendEmailToUser($devId, $message);
    sendEmailToUser($tleadId, $message);

}