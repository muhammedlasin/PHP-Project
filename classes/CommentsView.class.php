<?php

class CommentsView extends Comments{

    public function displayComment($task_id){

        $comments_array = $this->displayCommentStmt($task_id);

        return $comments_array;
    }

}