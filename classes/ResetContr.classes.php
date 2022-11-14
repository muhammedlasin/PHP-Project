<?php

class ResetContr extends Reset
{

    public function resetUser($password, $password1, $email)
    {

        if ($this->emptyInput($password, $password1) == false) {
            header("location:../reset.php?error=emptyinput");
            exit();
        }
        if ($this->pwdMatch($password, $password1) == false) {
            header("location:../reset.php?error=differentpwd");
            exit();
        }

        $this->resetPswd($password, $email);
    }

    private function emptyInput($password, $password1)
    {
        $result;
        if (empty($password) || empty($password1)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;

    }
    private function pwdMatch($password, $password1)
    {
        $result = '';
        if ($password !== $password1) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }


}