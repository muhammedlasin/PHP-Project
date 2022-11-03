<?php

class Users extends Dbh
{
    protected function createUser()
    {
    }

    protected function getUsers($userRole)
    {
        //to get a list of all users by user role
    }

    protected function getAllUsers()
    {

        $sql = "SELECT * FROM Users;";

        $stmt = $this->connect()->query($sql);

        $row = $stmt->fetchAll();

        return $row;
    }


    protected function getUserStmt($team_lead_id)
    {

        $sql = "SELECT users_name FROM Users WHERE users_id=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$team_lead_id]);

        $name = $stmt->fetch();

        return $name['users_name'];
    }
}
