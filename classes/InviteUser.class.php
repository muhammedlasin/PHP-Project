<?php

class InviteUser extends Dbh
{

    protected function setUser($name, $email, $role, $hashedpwd, $createdby, $updatedby)
    {
        $sql = "INSERT INTO Users (users_name,email,users_role,password_hashed,created_by,updated_by) VALUES (?,?,?,?,?,?)";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$name, $email, $role, $hashedpwd, $createdby, $updatedby]);

    }
    protected function checkUser($email)
    {

        $sql = "SELECT email FROM Users WHERE email=?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$email]);

        $result = $stmt->fetchAll();

        $resultCheck = '';

        if (!empty($result)) {

            $resultCheck = false;

        } else {

            $resultCheck = true;

        }

        return $resultCheck;
    }

}