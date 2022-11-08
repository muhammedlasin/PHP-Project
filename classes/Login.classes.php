<?php

class Login extends Dbh{
    protected function signinUser($email,$pswd) {

        $sql="SELECT password_hashed FROM Users where email=?";
        
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute([$email]);
        
        

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pswd,$pwdHashed[0]["password_hashed"]);
      

        if($checkPwd == false){
            header("location:../index.php?error=wrongpassword");
            exit();
        }
        elseif($checkPwd == true){
            $sql="SELECT * FROM Users WHERE email=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email]); 
            $datas=$stmt->fetchAll();
            foreach($datas as $data){
                $email=$data["email"];
                $userid = $data["users_id"];
                $name=$data["users_name"];
                $role=$data["users_role"];
            }
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["users_id"] = $userid;
            $_SESSION["users_name"] = $name;
            $_SESSION["users_role"] = $role;

        }

    }
}



