<?php

class UpdateContr extends UpdateUser
{
    public function getUser($user_id, $name, $role, $email)
    {

        if ($this->emptyInput($email, $name) == false) {

            header("location: ../UpdateUser.php?error=emptyinput");

            exit();

        }

        if ($this->invalidEmail($email) == false) {

            header("location: ../UpdateUser.php?error=invalidemail");

            exit();

        }

        // if ($this->checkUser($email) == false) {

        //     header("location: ../UpdateUser.php?error=emailalreadyexist");

        //     exit();

        // }

        $this->setUser($user_id, $name, $role, $email);

    }

    private function emptyInput($email, $name)
    {
        $result = '';

        if (empty($email) || empty($name)) {

            $result = false;

        } else {

            $result = true;

        }

        return $result;

    }

    private function invalidEmail($email)
    {
        $result = '';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $result = false;

        } else {

            $result = true;

        }

        return $result;

    }

}