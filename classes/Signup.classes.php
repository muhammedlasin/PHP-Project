<?php 


class Signup extends Dbh{


    protected function checkUser ($email) {

        $sql="SELECT email FROM Users WHERE email=?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$email]); 
        $result=$stmt->fetchAll();
        $resultCheck;
        if(empty($result)){
            $resultCheck=false;
        }
        else{
            $resultCheck=true;
        }
        return $resultCheck;
    }

    protected function setUser($name,$email,$pswd) {

       
        $sql="UPDATE Users SET users_name= ?,password_hashed= ? WHERE email=?";
        echo "reached";

        $stmt=$this->connect()->prepare($sql);
    
   
        $hashedpwd=password_hash($pswd,PASSWORD_DEFAULT);
       
        $stmt->execute([$name,$hashedpwd,$email]);  
       
            
    }

    
}

