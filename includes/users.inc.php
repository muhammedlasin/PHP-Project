<?php

 $usersObj = new UsersView();

 $user_role = "team lead";
 $users = $usersObj->displayUsersByRole($user_role);


 foreach ($users as $user){

    $uname = $user['users_name'];

    $uid = $user['users_id'];

    echo "<option value='$uid'>$uname</option>";

 }
?>