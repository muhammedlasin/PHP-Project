<?php


if(isset($_POST["signup"]))
{
    
    $name=$_POST["name"];
    $email=$_POST["email"];
    $pswd=$_POST["pswd"];
    $pswd1=$_POST["pswd1"];

   
    include "../classes/Dbh.class.php";
    include "../classes/Signup.classes.php";
    include "../classes/SignupContr.classes.php";
    
   

    
    
    $signup= new SignupContr();
 
    $signup-> signupUser($name,$email,$pswd,$pswd1);
    
    header("location:../index.php?status=success");


}















   

