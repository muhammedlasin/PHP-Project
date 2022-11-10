<?php

include '../includes/autoloaderInc.inc.php';

$attachmentId = $_GET['attachmentid'];

$taskId = $_GET['taskid'];

$attachContrObj = new AttachmentsContr();

$attachContrObj->delteAttachmentById($attachmentId);

header("location: ../viewTask.php?taskid=$taskId");