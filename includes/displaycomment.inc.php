<?php 

$commentObj = new CommentsView();

$task_id = 6;

$all = $commentObj-> displayComment($task_id);

$allComments = array_reverse($all);

foreach ($allComments as $comment){

   $content = $comment['content'];

   $comment_id = $comment['comment_id'];

   $date = $comment['created_at'];

   $uid = $comment['users_id'];

   $userObj = new UsersView();

   $user = $userObj->getUserNamebyId($uid);

   echo "<div>
   <hr>
   <p>$user</p>
   <p>$date</p>
   <p>$content</p>
   <a href='includes/deletecomment.inc.php?varname=$comment_id'>Delete</a>
   </div>";
 
   
}