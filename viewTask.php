<?php

include './header.php';

$project_id = $_GET['projid'];

echo "<button><a href='./projectDetail.php?pid=$project_id'>Back</a></button>";

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
    <?php //echo "<form action=./includes/attachFiles.inc.php?projid=$project_id method=POST enctype=multipart/form-data>";?>
    <form action="./includes/attachFiles.inc.php?projid=<?php echo $project_id ?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="upload[]" multiple="multiple">
        <input type="hidden" name="taskidattach" value="<?= $taskId ?>" />
        <button type="submit" name="create-attachments-submit">Attach files</button>
        <?php
        if ($_GET['error'] === 'emptyattachments') {
            echo "<p style=color:red>No attachment added</p>";
        }
        ?>
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
                echo "<a href=$filePath><img src=$filePath>" . "<br></a>";
                //echo "<img src=$filePath>" . "<br>";
                echo "<button><a href='./includes/deleteattachments.inc.php?attachmentid=$attachmentId&taskid=$taskId&projid=$project_id'>Delete</a></button>";
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