<?php

include_once '../classes/Dbh.class.php';
include_once '../classes/Tasks.class.php';
include_once '../classes/TasksContr.class.php';
include_once '../classes/Users.class.php';
include_once '../classes/UsersContr.class.php';
include_once '../classes/Email.class.php';

if (isset($_POST["assignee"])) {

    $developer_id = $_POST["assignee"];


    $tleadId = $_GET["tlead"];

    $devId = $_GET["devid"];

    $task_id = $_GET['taskid'];

    $taskName = $_GET['taskname'];

    $pid = $_GET['pid'];



    $taskContrObj = new TasksContr();

    $taskContrObj->updateDeveloper($developer_id, $task_id);

    $userContrObj = new UsersContr();

    $devEmail = $userContrObj->getEmailFromUsersId($devId);
    $tleadEmail = $userContrObj->getEmailFromUsersId($tleadId);

    header("Location: ../viewTask.php?taskid=$task_id&projid=$pid");

    $emailObj = new Email();
    $message = "New developer assigned to your task \"$taskName\" ";
    $emailObj->sendEmail($devEmail, $message);
    $emailObj->sendEmail($tleadEmail, $message);

}