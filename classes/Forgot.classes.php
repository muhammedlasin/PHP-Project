<?php

class Forgot extends Dbh
{


    protected function forgotPswd($email)
    {


        $sql = "SELECT email FROM Users where email=?";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $datas1=$stmt->fetchAll();
        $resultCheck;

        if(empty($datas1)){
            $resultCheck=false;
        }

        else{
            $resultCheck=true;
        }
        return $resultCheck;

        

    }

}

