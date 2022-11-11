<?php

include "../sendmail.php";

if (isset($_POST["forgot"])) {


    include "../classes/Dbh.class.php";
    include "../classes/Forgot.classes.php";
    include "../classes/ForgotContr.classes.php";


    $forgot = new ForgotContr();

    $forgot-> forgotUser($email);
    
    $subject="Reset password";
    $message=" Please click this link to reset your password : http://localhost/PHP-Project/reset.php?email=$email ";
    sendEmail($email, $message,$subject);
    // echo $result;
    // if($result==true){
    //     $message=" Please click this link to reset your password : http://localhost/PHP-Project/reset.php?email=$email ";
    //     sendEmail($email, $message);

    // }
    // else{
    //     header("location:../forgot.php?status=userdoesnotexist");
    // }


}