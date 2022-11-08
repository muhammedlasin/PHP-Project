<?php

class InviteContr extends InviteUser{
    // private $email;
    // private $role;
    // private $description;

    // public function __construct($email, $role, $description){
    //     $this->email = $email;
    //     $this->role = $role;
    //     $this->description = $description;
    // }

    public function getUser($name, $email, $role, $hashedpwd, $rememberpwd, $createdby, $updatedby){
       
        if($this->emptyInput($email,$role) == false){
            header("location: ../InviteUser.php?error=emptyinput");
            exit();
        }
        // if($this->invalidRole() == false){
        //     header("location: ../invite_user.php?error=invalidrole");
        //     exit();
        // }
        if($this->invalidEmail($email) == false){
            header("location: ../InviteUser.php?error=invalidemail");
            exit();
        }
        // if($this->userMatch() == false){
        //     header("location: ../InviteUser.php?error=emailtaken");
        //     exit();
        // }

        $this->setUser($name, $email, $role, $hashedpwd, $rememberpwd, $createdby, $updatedby);
    }

    private function emptyInput($email, $role){
        $result;
        if(empty($email) || empty($role)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    // private function invalidRole(){
    //     $result;
    //     if (!preg_match("/^[a-zA-Z0-9]*$/", $this->$role)){
    //         $result = false;
    //     }else{
    //         $result = true;
    //     }
    //     return $result;
    // }

    private function invalidEmail($email){
        $result;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    // private function userMatch(){
    //     $result;
    //     if(!$this->checkUser($this->email)){
    //         $result = false;
    //     }else{
    //         $result = true;
    //     }
    //     return $result;
    // }

    
}