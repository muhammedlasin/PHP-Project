<?php

class InviteContr extends InviteUser
{
    public function getUser($name, $email, $role, $hashedpwd, $createdby, $updatedby)
    {

        if ($this->emptyInput($email) == false) {

            header("location: ../InviteUser.php?error=emptyinput");

            exit();

        }
        if ($this->invalidEmail($email) == false) {

            header("location: ../InviteUser.php?error=invalidemail");

            exit();

        }
        if ($this->checkUser($email) == false) {

            header("location: ../InviteUser.php?error=emailalreadyexist");

            exit();
        }

        $this->setUser($name, $email, $role, $hashedpwd, $createdby, $updatedby);

    }

    private function emptyInput($email)
    {
        $result = '';

        if (empty($email)) {

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