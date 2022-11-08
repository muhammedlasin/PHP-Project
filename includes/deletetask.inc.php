<?php

include './autoloaderInc.inc.php';

$task_id = $_GET['taskid'];

$proj_id = $_GET['projid'];

//echo $proj_id . "  " . $task_id;

$taskContrObj = new TasksContr();

$taskContrObj->deleteATask($task_id);


header("location: ../projectDetail.php?pid=$proj_id");      

exit; 


