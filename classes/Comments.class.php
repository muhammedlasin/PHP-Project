<?php


class Comments extends Dbh{

    protected function setCommentStmt($task_id, $content, $users_id){

        $sql = "INSERT INTO Comments(task_id, content, users_id) VALUES (?,?,?)";

        $stmt = $this->connect()->prepare($sql);
        
        $stmt->execute([$task_id, $content, $users_id]);

    

 }

    protected function displayCommentStmt($task_id){

        $sql = "SELECT * FROM Comments WHERE task_id=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$task_id]);

        $results = $stmt->fetchAll();

        return $results;

    }

    protected function deleteCommentStmt($comment_id){

        $sql = "DELETE FROM Comments WHERE comment_id=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$comment_id]);

     }


}