<?php
// if(isset($_POST["send"])){
//     echo "farseen";
//     $email = $_POST["email"];
//     $role = $_POST["roles"];
//     $description = $_POST["descriptions"];

    // include "../classes/Dbh.classes.php";
    // include "../classes/InviteUser.class.php";
    // include "../classes/InviteContr.class.php";

//     $invite = new InviteContr($email, $role, $description);

//     $invite->inviteUser();

//     header("location: ../invite_user.php?error=none");
// }

include '../smtp.php';

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
   
    $invite= new InviteContr();
    
    // $invite-> inviteUser($name, $email, $role, $hashedpwd, $rememberpwd, $createdby, $updatedby);
    $invite-> getUser($name, $email, $role, $hashedpwd, $rememberpwd, $createdby, $updatedby);
    
    
    $message = 'You can signup using the given link:
    http://localhost/PHP-Project/signup.php';
    sendEmail($email,$message);

    header("location: ../InviteUser.php?status=success");

}else{
    Location: '/PHP_testing/Users.php';
}