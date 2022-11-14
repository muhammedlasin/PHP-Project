<?php
session_start();

include '../sendmail.php';

if (isset($_POST["submit"])) {
    $name = "unknown";
    $email = $_POST["email"];
    $role = $_POST["roles"];
    // $description = $_POST["descriptions"];
    $hashedpwd = "hcsuv";
    $rememberpwd = 0;
    $createdby = $_SESSION['users_id'];
    $updatedby = $_SESSION['users_id'];
    include "../classes/Dbh.class.php";
    include "../classes/InviteUser.class.php";
    include "../classes/InviteContr.class.php";


    $invite = new InviteContr();


    $invite->getUser($name, $email, $role, $hashedpwd, $rememberpwd, $createdby, $updatedby);

    $subject = 'Welcome to CLNF';
    $message = 'You can signup using the given link:
    http://localhost/PHP-main/PHP-Project/signup.php';
    sendEmail($email, $message, $subject);

    header("location: ../InviteUser.php?status=success");

}