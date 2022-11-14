<?php

session_start();

$u_email = $_SESSION["email"];
$u_id = $_SESSION["users_id"];
$u_name = $_SESSION["users_name"];
$u_role = $_SESSION["users_role"];

// $project_id = $_GET['projid'];


$commentObj = new CommentsView();

$user_role = 'admin';

$task_id = $taskId;

$all = $commentObj->displayComment($task_id);

$allComments = array_reverse($all);

foreach ($allComments as $comment) {

   $content = $comment['content'];

   $comment_id = $comment['comment_id'];

   $date = $comment['created_at'];

   $uid = $comment['users_id'];

   $userObj = new UsersView();

   $user = $userObj->getUserNamebyId($uid);

   echo "<div class='display-comment'>
   
   <p class='comment-user'>$user</p>
   <p class='comment-date'>$date</p>
   <p class='comment-content'>$content</p>";

   if ($u_role === "admin") {
      echo "<a class='comment-btn'href='includes/deletecomment.inc.php?varname=$comment_id&taskid=$taskId&projid=$project_id'>Delete</a>
      ";
   }
   echo "</div>
   <hr>";


}