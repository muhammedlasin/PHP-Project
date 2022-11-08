<?php

class UsersContr extends Users {
    //creating user

    public function getCurrentUserId() {
        return $this->getCurrentUserIdModel();
    }

    public function getCurrentUserRole() {

    }

    public function getUserIdFromName($userName) {
        return $this->getUserIdFromNameModel($userName);
    }

    public function getEmailFromUsersId($userId) {
        return $this->getEmailFromUserIdModel($userId);
    }

}