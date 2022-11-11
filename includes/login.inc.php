<?php

session_start();



if (isset($_POST["login"])) {


   
    include "../classes/Dbh.class.php";
    include "../classes/Login.classes.php";
    include "../classes/LoginContr.classes.php";



    
    $login = new LoginContr();

  include "../classes/Dbh.class.php";
  include "../classes/Login.classes.php";
  include "../classes/LoginContr.classes.php";

    
    $_SESSION["email"];
    $_SESSION["users_name"];
    $_SESSION["users_id"];
    $_SESSION["users_role"];
   

    
    // if(isset($_POST["remember"])){
    //     setcookie('email',$email,time() + 3600*24*7);
    //     setcookie('password',$pswd,time() + 3600*24*7);
    // // }
    // print_r($_COOKIE);
      
    header("location:../home.php?status=loggedin");

}

if (isset($_POST["signup"])) {
  header("location:../signup.php?");
}