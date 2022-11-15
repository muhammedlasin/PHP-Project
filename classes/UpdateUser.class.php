<?php

class UpdateUser extends Dbh{

    protected function setUser($user_id, $name, $role, $email){

        $sql="UPDATE Users SET users_name=?,users_role=?,email=? WHERE users_id = ?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$name, $role, $email, $user_id]);         

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