<?php
include './autoloaderInc.inc.php';

echo "Reaches attachfiles";

if (isset($_POST['create-attachments-submit'])) {
    $taskId  = $_POST['taskidattach'];

    $project_id = $_GET['projid'];

    //adding attachments

    $arrayOfAttachments = array();

    // $taskContrObj = new TasksContr();

    // $currentTaskId = $taskContrObj->getCurrentTaskId();

    //echo "Task Id obtained";

    $total_count = count($_FILES['upload']['name']);

    
    if ($_FILES['upload']['name'][0] === "") {
        header("location: ../viewTask.php?taskid=$taskId&projid=$project_id&error=emptyattachments");
        exit;
    }
    
    // Loop through every file
    for ($i = 0; $i < $total_count; $i++) {
        $fileName = $_FILES['upload']['name'][$i];
        $fileTemp = $_FILES['upload']['tmp_name'][$i];
        $fileSize = $_FILES['upload']['size'][$i];
        $fileError = $_FILES['upload']['error'][$i];
        $fileType = $_FILES['upload']['type'][$i];

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
                        echo "Moved";
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

    $attachmentContrObj->insertAttachments($arrayOfAttachments, $taskId);

    header("location: ../viewTask.php?taskid=$taskId&projid=$project_id");

    exit;
}
