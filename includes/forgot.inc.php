<?php

include "../sendmail.php";

if (isset($_POST["forgot"])) {
    echo "reached";
    $email=$_POST["email"];


    include "../classes/Dbh.class.php";
    include "../classes/Forgot.classes.php";
    include "../classes/ForgotContr.classes.php";


    $forgot = new ForgotContr();

    $forgot-> forgotUser($email);
    
    $subject="Reset password";
    $message=" Please click this link to reset your password : http://localhost/PHP-Project/reset.php?email=$email ";
    sendEmail($email, $message,$subject);
    header("location:../forgot.php?status=success");


}
