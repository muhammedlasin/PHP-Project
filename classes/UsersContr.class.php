<?php

class UsersContr extends Users {
    
   

    public function getUserIdFromName($userName) {
        return $this->getUserIdFromNameModel($userName);
    }

    public function getEmailFromUsersId($userId) {
        return $this->getEmailFromUserIdModel($userId);
    }


}