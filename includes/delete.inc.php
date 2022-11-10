<?php

include_once '../classes/Dbh.class.php';
include_once '../classes/Users.class.php';
include_once '../classes/UsersContr.class.php';





    $id = $_GET['id'];
   
    $userObj = new UsersContr();

    $userObj->deleteUsers($id);



