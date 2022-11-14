<?php

include '../classes/Dbh.class.php';
include '../classes/Comments.class.php';
include '../classes/CommentsContr.class.php';

$comment_id = $_GET['varname'];

$taskId = $_GET['taskid'];

$project_id = $_GET['projid'];

$commentObj = new CommentsContr();

$commentObj-> deleteComment($comment_id);



header("Location: ../viewTask.php?taskid=$taskId&projid=$project_id");