<?php

include '../classes/Dbh.class.php';
include '../classes/Users.class.php';
include '../classes/UsersContr.class.php';
include '/PHP-Project/includes/DisplayUsers.inc.php';



if(isset($_POST['submit'])){
   
    $id = $_POST['val'];
  
    // echo "$id";
    $userObj = new UsersContr();
 
    $userObj->deleteUsers($id);

    
}