<?php

class CommentsContr extends Comments {

   public function createComment($task_id, $content, $users_id,$project_id){

      if ($this->emptyInput($content) == false) {
         header("location: ../viewTask.php?error=emptycomment&taskid=$task_id&projid=$project_id");
         exit();
      }
    $this-> setCommentStmt($task_id, $content, $users_id);
   }
    
   public function deleteComment($comment_id){
      $this->deleteCommentStmt($comment_id);
   }

   public function deleteCommentInTasks($task_id){
      $this->deleteCommentByTaskId($task_id);
   }




   private function emptyInput($content)
   {
      $result = '';
      if (empty($content)) {

         $result = false;
      } else {
         $result = true;
      }
      return $result;
   }


}