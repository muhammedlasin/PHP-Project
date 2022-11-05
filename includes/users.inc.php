<?php

 $usersObj = new UsersView();

 $userRole = "team-lead";
 $users = $usersObj->getEveryUser();

 foreach ($users as $user){

    $uname = $user['users_name'];

    $uid = $user['users_id'];

    echo "<option value='$uid'>$uname</option>";

 }
?>