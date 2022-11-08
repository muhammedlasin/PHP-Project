<?php

class UsersView extends Users {
    public function getEveryUser() {
        return $this->getAllUsers();
    }
    

    public function getUserNamebyId($userId) {

        return $this->getUserStmt($userId);

        
        $result = $this->getUserStmt($userId);

        return $result;
    }


    public function displayUsersByRole($users_role){

        $result = $this->getUsersByRole($users_role);

        return $result;

    }


}