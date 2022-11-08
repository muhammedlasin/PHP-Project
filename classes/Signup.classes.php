<?php 


class Signup extends Dbh{

    protected function setUser($name,$email,$pswd) {

       
        $sql="UPDATE Users SET users_name= ?,password_hashed= ? WHERE email=?";

        $stmt=$this->connect()->prepare($sql);
     
     
   
        $hashedpwd=password_hash($pswd,PASSWORD_DEFAULT);
       
        $stmt->execute([$name,$hashedpwd,$email]);  
            
    }


    // protected function checkUser ($email) {
    //     $sql="SELECT email_id FROM users WHERE email_id=?";
    //     $stmt=$this->connect()->prepare($sql);
    //     $stmt->execute([$email]); 
    //     $resultCheck;
    //     if(!$stmt->rowCount == 0){
    //         $resultCheck=false;
    //     }
    //     else{
    //         $resultCheck=true;
    //     }
    //     return $resultCheck;
    // }
}

