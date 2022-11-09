<?php


class SignupContr extends Signup
{
    // private $first;
    // private $last;
    // private $email;
    // private $pswd;


    // public function _construct ($first,$last,$email,$pswd){
    //     $this->first = $first;
    //     $this->last = $last;
    //     $this->email = $email;
    //     $this->pswd = $pswd;
    // }

    public function signupUser($name, $email, $pswd, $pswd1)
    {

        if ($this->emptyInput($name, $email, $pswd, $pswd1) == false) {
            header("location:../index.php?error=emptyinput");
            exit();
        }


        if ($this->invalidEmail($email) == false) {
            header("location:../index.php?error=invalidemail");
            exit();
        }
        if ($this->pwdMatch($pswd, $pswd1) == false) {
            header("location:../index.php?error=differentpwd");
            exit();
        }
        if ($this->checkUser($email) == false) {
            header("location:../signup.php?error=noaccess");
            exit();
        }
        // if($this->uidTaken($email)==false){
        //     header("location:../index.php?error=alreadyexists");
        //     exit();  
        // }
        $this->setUser($name, $email, $pswd);

    }

    private function emptyInput($name, $email, $pswd, $pswd1)
    {
        $result = '';
        if (empty($name) || empty($email) || empty($pswd) || empty($pswd1)) {
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


    private function pwdMatch($pswd, $pswd1)
    {
        $result = '';
        if ($pswd !== $pswd1) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

// private function uidTaken($email){
//     $result;
//     if($this->checkUser($email)){
//         $result=false;
//     }
//     else{
//         $result=true;
//     }
//     return $result;
// }
}