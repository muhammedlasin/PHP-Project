<?php

include './header.php';
?>

<div class="task-container">
    <?php
    //code to display attachments

    $taskId = $_GET['taskid'];

    ?>

    <form action="./includes/attachFiles.inc.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="upload[]" multiple="multiple">
        <input type="hidden" name="taskidattach" value="<?=$taskId?>"/>
        <button type="submit" name="create-attachments-submit">Attach files</button>
    </form>

    <?php

    $attachmentsContrObj = new AttachmentsContr();

    $attachments = $attachmentsContrObj->getAttachmentsFromTaskId($taskId);
    ?>

    <div class="attachments-image-container">
        <?php
        foreach ($attachments as $val) {
            $element = $val["attachment_file"];
            $filePath =  "includes/" . $element;
            echo "<img src=$filePath>" . "<br>";
            // echo $val["attachment_file"]; //this works
        }
        ?>
    </div>
    
    <?php 
    include 'includes/viewTask.inc.php';
    include 'comment.php';
    ?>

</div>





