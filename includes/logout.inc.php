<?php

session_start();
if(isset($_POST["logout"])){
    unset($_SESSION['email']); 
    unset($_SESSION["users_name"]);
    unset($_SESSION["users_id"]);
    unset($_SESSION["users_role"]);
    session_destroy(); 
    header("location:../index.php?status=loggedout");
}

?>
