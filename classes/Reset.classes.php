<?php

class Reset extends Dbh{
    protected function resetPswd($password,$email){


        $sql="UPDATE Users SET password_hashed= ? WHERE email=?";
        
        $stmt=$this->connect()->prepare($sql);
   
        $hashedpwd=password_hash($password,PASSWORD_DEFAULT);
       
        $stmt->execute([$hashedpwd,$email]);  
       
            
    }

}

