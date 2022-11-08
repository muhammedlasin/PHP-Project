<?php

require '../includes/autoloader.inc.php';

if(isset($_POST['create-task-submit'])) {

    $taskName = $_POST['task-name'];
    $taskDescription = $_POST['task-description'];
    $taskPriority = $_POST['task-priority'];
    $taskDev = $_POST['task-dev'];
    $taskDueDate = $_POST['task-due-date'];


    //values that need to be fetched

    $projectId = 1;  //$projectContrObj->getProjectId(); The project on which the admin or the team lead clicks

    $taskCreatedBy = 1; //The current user that clicks on create task

    $taskUpdatedBy = 1; //The current user that changes the description, priority or due date

    //$taskDevId = 6; //will have to be fetched from User

    //I could use the user table in my Task to get the devId. write a getUserIdByName() in UsersContr


    $taskObj = new TasksContr();

    $taskObj->createNewTask($projectId, $taskName, $taskDescription, $taskDevId, $taskPriority, $taskCreatedBy, $taskUpdatedBy, $taskDueDate);

    header("location: ../project.php");

    exit;

}

else {
    header("location: ../create-task.php");
}

?>