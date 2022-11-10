<?php

class UsersContr extends Users
{

    public function deleteUsers($id)
    {

        $this->setdeleteStmt($id);


    }

    public function getUserIdFromName($userName)
    {
        return $this->getUserIdFromNameModel($userName);
    }

    public function getEmailFromUsersId($userId)
    {
        return $this->getEmailFromUserIdModel($userId);
    }


}