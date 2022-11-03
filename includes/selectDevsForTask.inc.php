<?php

$userViewObj = new UsersView();

$listOfDevs = $userViewObj->getUsersByRole('developer'); //expects an assoc array

//$listOfDevs = array('Dev 1', 'Dev 2', 'Dev 3');

?>

<select name="task-dev">
    <?php 
        foreach($listOfDevs as $val) {
            echo "<option value=".$val.">$val</option>";
        }
    ?>
</select>