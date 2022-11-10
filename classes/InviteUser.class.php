<?php

class InviteUser extends Dbh{
    


    protected function checkUser ($email) {

        $sql="SELECT email FROM Users WHERE email=?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$email]); 
        $result=$stmt->fetchAll();
        $resultCheck;

        if(!empty($result)){
            $resultCheck=false;
        }

        else{
            $resultCheck=true;
        }
        return $resultCheck;
}

    protected function setUser($name, $email, $role, $hashedpwd,$createdby, $updatedby){

        // $sql = "INSERT INTO Users(users_name, email, users_role, password_hashed, remember_pwd, created_by, updated_by) VALUES ('unknown', ?, ?, 'dfdvdfb', true, 1, 1)";
      
        $sql="INSERT INTO Users (users_name,email,users_role,password_hashed,created_by,updated_by) VALUES (?,?,?,?,?,?)";

     

                // $stmt = $this->connect()->prepare('INSERT INTO invited_users(Email_ID, Roles, Descriptions) VALUES (?,?,?);');
        $stmt = $this->connect()->prepare($sql);
        
        $stmt->execute([$name, $email, $role, $hashedpwd, $createdby, $updatedby]);
    }
      
        
    
        // if(!$stmt->execute(array($email))){
        //     $stmt = null;
        //     header("location: ../invite_user.php?error=stmtfailed");
        //     exit();
        // }

        // $resultCheck;
        // if($stmt->rowCount() > 0){
        //     $resultCheck = false;
        // }else{
        //     $resultCheck = true;
        // }
        // return $resultCheck;
    }


    // protected function checkUser($email){
    //     $stmt = $this->connect()->prepare('SELECT email FROM Users WHERE email = ?;');
    
    //     if(!$stmt->execute([$email])){
    //         $stmt = null;
    //         header("location: ../InviteUser.php?error=stmtfailed");
    //         exit();
    //     }

    //     $resultCheck;
    //     if($stmt->rowCount() > 0){
    //         $resultCheck = false;
    //     }else{
    //         $resultCheck = true;
    //     }
    //     return $resultCheck;
    // }
