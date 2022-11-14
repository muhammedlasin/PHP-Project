<?php

include './header.php';

$update = $_GET['update'];


?>

<div class="task-container">
    <?php
    //code to display attachments
    
    $taskId = $_GET['taskid'];



    ?>



    <?php

    $attachmentsContrObj = new AttachmentsContr();

    $attachments = $attachmentsContrObj->getAttachmentsFromTaskId($taskId);
    ?>



    <?php
    include 'includes/viewTask.inc.php';
    ?>
    <form action="./includes/attachFiles.inc.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="upload[]" multiple="multiple">
        <input type="hidden" name="taskidattach" value="<?= $taskId ?>" />
        <button type="submit" name="create-attachments-submit">Attach files</button>
    </form>
    <div class="attachments-image-container">
        <?php
        foreach ($attachments as $val) {
        ?>
        <div class="attachment-item">
            <?php
            $element = $val["attachment_file"];
            $attachmentId = $val["attachment_id"];
            $filePath = "includes/" . $element;
            echo "<img src=$filePath>" . "<br>";
            echo "<button><a href='./includes/deleteattachments.inc.php?attachmentid=$attachmentId&taskid=$taskId'>Delete</a></button>";
            // echo $val["attachment_file"]; //this works
            ?>
        </div>
        <?php
        }
        ?>
    </div>
    <?php
    include 'comment.php';

    ?>

</div>