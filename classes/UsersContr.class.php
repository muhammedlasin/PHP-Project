<?php

class UsersContr extends Users{

    public function deleteUsers($id){

        $this->setdeleteStmt($id);

    }
    public function getEmailFromUsersId($userId){
    
        return $this->getEmailFromUsersIdModel($userId);

    }

}