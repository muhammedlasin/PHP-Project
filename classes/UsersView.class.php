<?php

class UsersView extends Users
{
    public function displayUser()
    {
        $result = $this->getUsers();
        return $result;
    }
    public function filterUsers($roles)
    {

        $results = $this->filterusersStmt($roles);
        return $results;

    }

    public function getEveryUser()
    {
        return $this->getAllUsers();
    }


    public function getUserNamebyId($userId)
    {




        $result = $this->getUserStmt($userId);

        return $result;
    }


    public function displayUsersByRole($users_role)
    {

        $result = $this->getUsersByRole($users_role);

        return $result;

    }

}