<?php

 $usersObj = new UsersView();

 $users = $usersObj->getEveryUser();

 foreach ($users as $user){

    $uname = $user['users_name'];

    $uid = $user['users_id'];

    echo "<option value='$uid'>$uname</option>";

 }
?>