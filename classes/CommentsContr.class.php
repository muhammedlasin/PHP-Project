<?php

class CommentsContr extends Comments {

   public function createComment($task_id, $content, $users_id){

   
    $this-> setCommentStmt($task_id, $content, $users_id);
   }
    
   public function deleteComment($comment_id){
      $this->deleteCommentStmt($comment_id);
   }

   public function deleteCommentInTasks($task_id){
      $this->deleteCommentByTaskId($task_id);
   }


}