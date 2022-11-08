<?php

//include './header.php';

 session_start();
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require './vendor/phpmailer/phpmailer/src/Exception.php';
// require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require './vendor/phpmailer/phpmailer/src/SMTP.php';


// require 'vendor/autoload.php';


require '../includes/autoloaderInc.inc.php';


if (isset($_POST['create-task-submit'])) {

    $taskName = $_POST['task-name'];
    $taskDescription = $_POST['task-description'];
    $taskPriority = $_POST['task-priority'];
    $taskDevName = $_POST['task-dev']; //add mail id also
    $taskDueDate = $_POST['task-due-date'];


    $projectId = $_POST['projid'];

    //values that need to be fetched

    $taskCreatedBy = 1; //$_SESSION["users_id"];

    $taskUpdatedBy = 1; //$_SESSION["users_id"];


    //task creation 


    $userContrObj = new UsersContr();

    

    $taskDevId =  $userContrObj->getUserIdFromName($taskDevName); //change this to getUserIdFromEmail() as it is unique

    
    $taskContrObj = new TasksContr();

    if($taskContrObj->isInvalidTask($projectId, $taskName, $taskDescription, $taskDevId, $taskPriority, $taskCreatedBy, $taskUpdatedBy, $taskDueDate)) {
        echo "Enter all fields";
    }

    else {
        $taskContrObj->createNewTask($projectId, $taskName, $taskDescription, $taskDevId, $taskPriority, $taskCreatedBy, $taskUpdatedBy, $taskDueDate);
    }


    

    

    //sending email to the developer on assigning a task

    include '../sendEmail.php';

    sendEmailToUser($taskDevId, "You have been assigned a new task");



    //adding attachments

    $arrayOfAttachments = array();

    $currentTaskId = $taskContrObj->getCurrentTaskId();


    $total_count = count($_FILES['file']['name']);
    // Loop through every file
    for ($i = 0; $i < $total_count; $i++) {
        $fileName = $_FILES['file']['name'][$i];
        $fileTemp = $_FILES['file']['tmp_name'][$i];
        $fileSize = $_FILES['file']['size'][$i];
        $fileError = $_FILES['file']['error'][$i];
        $fileType = $_FILES['file']['type'][$i];

        $fileExt = explode('.', $fileName);

        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpeg', 'jgp', 'pdf', 'png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;

                    $fileDestination = 'uploads/' . $fileNameNew;

                    if (move_uploaded_file($fileTemp, $fileDestination)) {
                        array_push($arrayOfAttachments, $fileDestination);
                        // header("location: ../project.php?upload=success");
                    } else {
                        echo $fileDestination . "<br>";
                    }
                } else {
                    echo "File size exceeded";
                }
            } else {
                echo "There was an error";
            }
        } else {
            echo "Cannot upload files of this type";
        }
    }

    $attachmentContrObj = new AttachmentsContr();

    $attachmentContrObj->insertAttachments($arrayOfAttachments, $currentTaskId);

    header("location: ../projectDetail.php?pid=$projectId");
    exit;
} else {
    header("location: ../create-task.php");
}

