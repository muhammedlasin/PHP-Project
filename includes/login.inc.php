<?php




if (isset($_POST["login"])) {
  
    $email=$_POST["email"];
    $pswd=$_POST["pswd"];

    $_SESSION["pswd"] = $pswd;

    function useremail ($email){
      return $email;
    }
    function userpswd($pswd){
      return $pswd;
    }

    include "../classes/Dbh.class.php";
    include "../classes/Login.classes.php";
    include "../classes/LoginContr.classes.php";
    
  
    $login = new LoginContr();
    $login->loginUser($email, $pswd);

    if(isset($_POST["remember"])){
      header("location:../login.php?status=remember");
    }
    else{
      header("location:../login.php?status=notremember");
    }
  
    // header("location:../home.php?status=loggedin");


    // setcookie('email',"ggg",time() +3600*24*7);
    // setcookie('password',"ggg",time() + 3600*24*7);

    // public function cookieLogin($email,$pswd){

    // }
    // $rem;

  //  if(isset($_POST["remember"])){
  //     header("location:../login.php?status=remember");
  //  }
    // setcookie('email',$email,time() + 3600*24*7);
      
    
    //   $rem=true;
    // }
    // else{
    //   $rem=false;
    // }

    //     
    // }
    // print_r($_COOKIE);

  // include "../classes/Dbh.class.php";
  // include "../classes/Login.classes.php";
  // include "../classes/LoginContr.classes.php";

    
    // $_SESSION["email"];
    // $_SESSION["users_name"];
    // $_SESSION["users_id"];
    // $_SESSION["users_role"];
   

    
    // if(isset($_POST["remember"])){
    //     setcookie('email',$email,time() + 3600*24*7);
    //     setcookie('password',$pswd,time() + 3600*24*7);
    // // }
    // print_r($_COOKIE);
  
    
    
}

if (isset($_POST["signup"])) {
  header("location:../signup.php?");
}