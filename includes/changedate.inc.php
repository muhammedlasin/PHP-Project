<?php

include_once '../classes/Dbh.class.php';
include_once '../classes/Tasks.class.php';
include_once '../classes/TasksContr.class.php';
include_once '../classes/Users.class.php';
include_once '../classes/UsersContr.class.php';
include_once '../classes/Email.class.php';


if (isset($_POST["dueDate"])) {

    $task_id = $_GET['taskid'];
    $devId = $_GET['devid'];
    $taskName = $_GET['taskname'];
    $tleadId = $_GET['tlead'];
    $pid = $_GET['pid'];

    $due_date = $_POST["dueDate"];

    $taskContrObj = new TasksContr();
    $taskContrObj->updateDate($due_date, $task_id);

    $userContrObj = new UsersContr();

    $devEmail = $userContrObj->getEmailFromUsersId($devId);
    $tleadEmail = $userContrObj->getEmailFromUsersId($tleadId);

    header("Location: ../viewTask.php?taskid=$task_id&projid=$pid");

    $emailObj = new Email();
    $message = "The task \"$taskName\" has its due date changed to $due_date"; 
    $emailObj->sendEmail($devEmail, $message);
    $emailObj->sendEmail($tleadEmail, $message);
}

else {
    echo "Error";
}
