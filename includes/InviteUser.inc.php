<?php

include '../sendmail.php';


if(isset($_POST["submit"]))
{
    $name = "unknown";
    $email = $_POST["email"];
    $role = $_POST["roles"];
    // $description = $_POST["descriptions"];
    $hashedpwd = "hcsuv";
    $createdby = 1;
    $updatedby = 1;
    include "../classes/Dbh.class.php";
    include "../classes/InviteUser.class.php";
    include "../classes/InviteContr.class.php";
   
    $invite= new InviteContr();
   

    

    $invite-> getUser($name, $email, $role, $hashedpwd,$createdby, $updatedby);
    echo "hgg";
    $subject="Welcome to CLNF";

    
    $message = 'You can signup using the given link:
    http://localhost/php-project-test/PHP-Project/signup.php';

    sendEmail($email,$message,$subject);

   

    header("location: ../InviteUser.php?status=success");

}else{
    Location: '/PHP-Project/Users.php';
}


