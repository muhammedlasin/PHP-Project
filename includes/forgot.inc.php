<?php

include "../sendmail.php";

if(isset($_POST["forgot"])){
   
    
    $email=$_POST["email"];


    include "../classes/Dbh.classes.php";
    include "../classes/Forgot.classes.php";
    include "../classes/ForgotContr.classes.php";
    

    $forgot = new ForgotContr();

    $forgot-> forgotUser($email);
    $message=" Please click this link to reset your password : http://localhost/PHP-Project/reset.php?email=$email ";
    sendEmail($email, $message);
    // echo $result;
    // if($result==true){
    //     $message=" Please click this link to reset your password : http://localhost/PHP-Project/reset.php?email=$email ";
    //     sendEmail($email, $message);

    // }
    // else{
    //     header("location:../forgot.php?status=userdoesnotexist");
    // }
    

}
    





