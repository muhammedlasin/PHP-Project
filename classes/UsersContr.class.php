<?php

class UsersContr extends Users
{

    public function deleteUsers($id)
    {

        $this->setdeleteStmt($id);
        echo "111";

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