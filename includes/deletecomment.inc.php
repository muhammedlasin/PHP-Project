<?php

include '../classes/Dbh.class.php';
include '../classes/Comments.class.php';
include '../classes/CommentsContr.class.php';

$comment_id = $_GET['varname'];

$taskId = $_GET['taskid'];

$commentObj = new CommentsContr();

$commentObj-> deleteComment($comment_id);



header("Location: ../viewTask.php?taskid=$taskId");