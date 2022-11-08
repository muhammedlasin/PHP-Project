<?php

if(isset($_POST["reset"])){
   
    $email=$_POST["email"];
    $password=$_POST["password"];
    $password1=$_POST["password1"];
    

    include "../classes/Dbh.classes.php";
    include "../classes/Reset.classes.php";
    include "../classes/ResetContr.classes.php";
  

    $reset = new ResetContr();
    $reset-> resetUser($password,$password1,$email);
    echo "reached";
    header("location:../index.php?status=passwordresetsuccess");

 
}


