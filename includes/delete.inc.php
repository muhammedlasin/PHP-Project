<?php

include_once '../classes/Dbh.class.php';
include_once '../classes/Users.class.php';
include_once '../classes/UsersContr.class.php';




if (isset($_POST['submit'])) {

    $id = $_POST['val'];


    $userObj = new UsersContr();



    $userObj->deleteUsers($id);



}