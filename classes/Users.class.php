<?php


class Users extends Dbh
{

    protected function getUsers()
    {
        $sql = "SELECT * FROM Users;";

        $stmt = $this->connect()->query($sql);

        $row = $stmt->fetchAll();

        return $row;
    }



    protected function setdeleteStmt($id)
    {
        $sql = "DELETE FROM Users WHERE users_id= ?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$id]);

        header("Location: ../Users.php?status=deleted");

    }

    protected function filterusersStmt($roles)
    {
        $sql = "SELECT users_id,users_name,email,users_role FROM Users WHERE users_role=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$roles]);

        $row = $stmt->fetchAll();

        return $row;

    }

    protected function getEmailFromUserIdModel($userId)
    {
        $sql = "SELECT email FROM Users WHERE users_id = ?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$userId]);

        $name = $stmt->fetch();

        return $name['email'];
    }


    protected function getUserIdFromNameModel($userName)
    {

        $sql = "SELECT users_id FROM Users WHERE users_name = ?;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$userName]);

        $name = $stmt->fetch();

        return $name['users_id'];

    }

    protected function getAllUsers()
    {

        $sql = "SELECT * FROM Users;";

        $stmt = $this->connect()->query($sql);

        $row = $stmt->fetchAll();

        return $row;
    }


    protected function getUserStmt($userId)
    {

        $sql = "SELECT users_name FROM Users WHERE users_id=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$userId]);

        $name = $stmt->fetch();

        return $name['users_name'];
    }

    protected function getUsersByRole($users_role)
    {

        $sql = "SELECT * FROM Users WHERE users_role=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$users_role]);

        $names = $stmt->fetchAll();

        return $names;
    }



}