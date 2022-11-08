<?php

$userViewObj = new UsersView();

$listOfDevs = $userViewObj->getUsersByRole('developer'); //expects an assoc array


?>

<select name="task-dev">
    <?php 
        foreach($listOfDevs as $val) {
            echo "<option value=\"$val[users_name]\">$val[users_name]</option>";
        }
    ?>
</select>