<?php

include '../includes/autoloaderInc.inc.php';

$attachmentId = $_GET['attachmentid'];

$project_id = $_GET['projid'];

$taskId = $_GET['taskid'];

$attachContrObj = new AttachmentsContr();

$attachContrObj->delteAttachmentById($attachmentId);

header("location: ../viewTask.php?taskid=$taskId&projid=$project_id");