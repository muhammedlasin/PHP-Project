<?php




if (isset($_POST["login"])) {

  $email = $_POST["email"];
  $pswd = $_POST["pswd"];


  include "../classes/Dbh.class.php";
  include "../classes/Login.classes.php";
  include "../classes/LoginContr.classes.php";



  $login = new LoginContr();


  $login->loginUser($email, $pswd);

  // $_COOKIE["email"] = $email;
  // $_COOKIE["pswd"] = $pswd;

  

  // function cookieLogin($email, $pswd){


//                     {

//                     $hour = time() +(10 * 365 * 24 * 60 * 60);
//                     setcookie("email", $email, $hour);
//                     setcookie("password", $pswd, $hour);
//                     }
               
  // $_SESSION["email"];
  // $_SESSION["users_name"];
  // $_SESSION["users_id"];
  // $_SESSION["users_role"];
  // $urole = $_SESSION["users_role"];


  // if(isset($_POST["remember"])){
  //     setcookie('email',$email,time() + 3600*24*7);
  //     setcookie('password',$pswd,time() + 3600*24*7);
  // // }
  // print_r($_COOKIE);
  header('Location: ../project.php');


}

if (isset($_POST["signup"])) {
  header("location:../signup.php?");
}