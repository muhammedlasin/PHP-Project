<?php
// include 'UpdateUser.php';
class UpdateContr extends UpdateUser
{
    // private $email;
    // private $role;
    // private $description;

    // public function __construct($email, $role, $description){
    //     $this->email = $email;
    //     $this->role = $role;
    //     $this->description = $description;
    // }

    public function getUser($user_id, $name, $role, $email)
    {

        if ($this->emptyInput($email, $name) == false) {
            header("location: ../UpdateUser.php?error=emptyinput");
            exit();
        }
        // if($this->invalidRole() == false){
        //     header("location: ../UpdateUser.php?error=invalidrole");
        //     exit();
        // }
        if ($this->invalidEmail($email) == false) {
            header("location: ../UpdateUser.php?error=invalidemail");
            exit();
        }

        // if($this->userMatch() == false){
        //     header("location: ../UpdateUser.php?error=emailtaken");
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

    // private function invalidRole(){
    //     $result;
    //     if (!preg_match("/^[a-zA-Z0-9]*$/", $this->$role)){
    //         $result = false;
    //     }else{
    //         $result = true;
    //     }
    //     return $result;
    // }

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