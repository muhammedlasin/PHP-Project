<?php

session_start();



if(isset($_POST["login"]))
{
    
   
    $email=$_POST["email"];
    $pswd=$_POST["pswd"];


   
    include "../classes/Dbh.classes.php";
    include "../classes/Login.classes.php";
    include "../classes/LoginContr.classes.php";


    
    $login = new LoginContr();

    
    $login-> loginUser($email,$pswd);

    
    $_SESSION["email"];
    $_SESSION["users_name"];
    $_SESSION["users_id"];
    $_SESSION["users_role"];

    
    // if(isset($_POST["remember"])){
    //     setcookie('email',$email,time() + 3600*24*7);
    //     setcookie('password',$pswd,time() + 3600*24*7);
    // // }
    // print_r($_COOKIE);

   
    header("location:../logout.php?status=sucess");

}

if(isset($_POST["signup"])){
    header("location:../signup.php?");
}


























