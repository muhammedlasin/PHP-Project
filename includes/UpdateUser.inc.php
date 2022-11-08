
<?php
// ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
//  $user_id = $_GET['id'];


if(isset($_POST["submit"]))
{
    $user_id = $_POST['val'];

    $name = $_POST["username"];
    $role = $_POST["roles"];
    $email = $_POST["email"];
    
    // $description = $_POST["descriptions"];
    include "../classes/Dbh.class.php";
    include "../classes/UpdateUser.class.php";
    include "../classes/UpdateContr.class.php";


    $update= new UpdateContr();

    // $invite-> inviteUser($name, $email, $role, $hashedpwd, $rememberpwd, $createdby, $updatedby);
    
    $update-> getUser($user_id, $name, $role, $email);

     
    header("location: ../Users.php?status=sucess");
}else{
    Location: '/PHP_testing/Users.php';
}

