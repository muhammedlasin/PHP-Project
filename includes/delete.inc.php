<?php

include '../classes/Dbh.class.php';
include '../classes/Users.class.php';
include '../classes/UsersContr.class.php';
include '/PHP_testing/includes/DisplayUsers.inc.php';

// $userid = $_GET['var'];

// $userObj = new UsersContr();

// $userObj->deleteUsers($userid);

// header("Location: ../Users.php");

if(isset($_POST['submit'])){
   
    $id = $_POST['val'];
  
    // echo "$id";
    $userObj = new UsersContr();
 
    $userObj->deleteUsers($id);
    

    // $sql = "DELETE FROM Users WHERE users_id = ?";
   
    // $stmt = $this->connect()->prepare($sql);
    // $stmt->execute($id);
    
}