<?php

if(isset($_POST['submit'])){

   
    $comment_task_id = $_POST['taskidcomment'];
    $comment_content = $_POST["content"];
    $comment_user_id = 10; //session

    include '../classes/Dbh.class.php';
    include '../classes/Comments.class.php';
    include_once '../classes/CommentsContr.class.php';

    $commentObj = new CommentsContr();

    $commentObj -> createComment($comment_task_id, $comment_content, $comment_user_id);

    header("Location: ../viewTask.php?taskid=$comment_task_id");
    
}

else{
   echo "Error";
}