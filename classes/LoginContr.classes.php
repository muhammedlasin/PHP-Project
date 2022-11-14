<?php

class LoginContr extends Login
{

    public function loginUser($email, $pswd)
    {
        if ($this->emptyInput($email, $pswd) == false) {
            header("location:../index.php?error=emptyinput");
            exit();
        }
        if ($this->invalidEmail($email) == false) {
            header("location:../index.php?error=invalidemail");
            exit();
        }

        if(isset($_POST["remember_me"])){
            //COOKIES for username
            setcookie ("email",$email,time()+ (10 * 365 * 24 * 60 * 60));
                            
            //COOKIES for password
            setcookie ("pswd",$pswd,time()+ (10 * 365 * 24 * 60 * 60));              
            }  
            else{
                if(isset($_COOKIE["email"])){
                    setcookie("email"," ");
                    if(isset($_COOKIE["pswd"])){
                        setcookie("pswd"," ");
                    }
                }
            }              

        $this->signinUser($email, $pswd);



    }


    private function emptyInput($email, $pswd)
    {
        $result = '';
        if (empty($email) || empty($pswd)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;

    }

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
    



}