<?php

class UsersView extends Users {
    public function getEveryUser() {
        return $this->getAllUsers();
    }
    
    public function getUsersByRole($userRole) {
        return $this->getUsers($userRole);
    }

    public function getCurrentUserId() {

    }

    public function getUserRole($currentUserId) {

    }

    public function getUserNamebyId($userId) {
        return $this->getUserStmt($userId);
    }


}