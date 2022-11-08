<?php 

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

   if ($user_role === "admin") {
      echo "<a class='comment-btn'href='includes/deletecomment.inc.php?varname=$comment_id&taskid=$taskId'>Delete</a>
      ";
   }
   echo "</div>
   <hr>";


}