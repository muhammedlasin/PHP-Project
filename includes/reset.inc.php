<?php

if (isset($_POST["reset"])) {

    $password=$_POST["password"];
    $password1=$_POST["password1"];
    $email=$_POST["email"];



    include "../classes/Dbh.class.php";
    include "../classes/Reset.classes.php";
    include "../classes/ResetContr.classes.php";




    $reset = new ResetContr();
    $reset->resetUser($password, $password1, $email);
    header("location:../reset.php?status=success");


}