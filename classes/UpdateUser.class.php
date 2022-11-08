<?php

class UpdateUser extends Dbh{

    protected function setUser($user_id, $name, $role, $email){

        // $sql = "INSERT INTO Users(users_name, email, users_role, password_hashed, remember_pwd, created_by, updated_by) VALUES ('unknown', ?, ?, 'dfdvdfb', true, 1, 1)";

        $sql="UPDATE Users SET users_name=?,users_role=?,email=? WHERE users_id = ?";
// echo "$user_id";    
                // $stmt = $this->connect()->prepare('INSERT INTO invited_users(Email_ID, Roles, Descriptions) VALUES (?,?,?);');
        $stmt = $this->connect()->prepare($sql);

        $stmt->execute([$name, $role, $email, $user_id]);         
        
    
        // if(!$stmt->execute(array($email))){
        //     $stmt = null;
        //     header("location: ../UpdateUser.php?error=stmtfailed");
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
    //         header("location: ../UpdateUser.php?error=stmtfailed");
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
}