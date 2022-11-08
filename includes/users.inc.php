<?php

 $usersObj = new UsersView();

 $users = $usersObj->getUsersByRole('team lead'); //check every user role entry in the code. fix lasins team lead selecting method
 //enter values into project and task database. then test your attachment code

 foreach ($users as $user){

    $uname = $user['users_name'];

    $uid = $user['users_id'];

    echo "<option value='$uid'>$uname</option>";

 }
?>