<?php

if (isset($_POST["reset"])) {

    include "../classes/Dbh.class.php";
    include "../classes/Reset.classes.php";
    include "../classes/ResetContr.classes.php";


    $reset = new ResetContr();
    $reset->resetUser($password, $password1, $email);
    echo "reached";
    header("location:../index.php?status=passwordresetsuccess");


}