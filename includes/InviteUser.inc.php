<?php

include '../sendmail.php';

if(isset($_POST["submit"]))
{
    $name = "unknown";
    $email = $_POST["email"];
    $role = $_POST["roles"];
    // $description = $_POST["descriptions"];
    $hashedpwd = "hcsuv";
    $rememberpwd = 0;
    $createdby = 1;
    $updatedby = 1;
    include "../classes/Dbh.class.php";
    include "../classes/InviteUser.class.php";
  
    include "../classes/InviteContr.class.php";

    $invite = new InviteContr();


    $invite->getUser($name, $email, $role, $hashedpwd, $rememberpwd, $createdby, $updatedby);

    $subject="Welcome to CLNF";
    $message = 'Hi User,<br>

    Welcome to CLNF.<br><br>

    CLNF is a single platform to manage all your projects.<br><br>

    You can signup to CLNF using the given link:
    http://localhost/PHP-Project/signup.php 
    
    <br><br>

    Best Regards,<br>
    Team CLNF';
    
    sendEmail($email, $message,$subject);

    header("location: ../InviteUser.php?status=success");

} else {
    Location:
    '/PHP-Project/Users.php';
}