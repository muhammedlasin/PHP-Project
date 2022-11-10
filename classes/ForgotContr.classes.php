<?php 

class ForgotContr extends Forgot {

    public function forgotUser($email){
        if($this->emptyInput($email)==false){
            header("location:../forgot.php?error=emptyinput");
            exit();
        }
        if($this->invalidEmail($email)==false){
            header("location:../forgot.php?error=invalidemail");
            exit();  
        }
        if($this->forgotPswd($email)==false){
            header("location:../forgot.php?error=userdoesnotexist");
            exit();  
        }   
    }

    private function emptyInput($email){
        $result;
        if(empty($email)){
            $result = false;
        }
        else{
            $result=true;
        }
        return $result;
        
    }

    private function invalidEmail($email){
        $result;
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $result=false;
        }
        else{
            $result=true;
        }
        return $result;
    }
}




