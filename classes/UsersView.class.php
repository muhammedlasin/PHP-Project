<?php

class UsersView extends Users {
    public function getEveryUser() {
        return $this->getAllUsers();
    }
    
    public function getUsersByRole($userRole) {
        //change this later
        return array('UserDev2', 'UserDev3', 'UserDev6');

       // return $this->getUsers($userRole);
    }

    public function getCurrentUserId() {

    }

    public function getUserRole($currentUserId) {

    }

    public function getUserNamebyId($userId) {
        $this->getUserStmt($userId);
    }


}