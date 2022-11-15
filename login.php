<?php
session_start();
include "./includes/login.inc.php";
$email=$_SESSION['email'];
$pswd=$_SESSION['pswd'];


// setcookie('email',"ghg",time() - 3600*24*7);
// setcookie('password',"ghg",time() - 3600*24*7);

// $email=$_SESSION["email"];
// $pswd=$_SESSION["pswd"];
// setcookie('email',"email",time() + 3600*24*7);
// setcookie('password',"pswd",time() + 3600*24*7);
if(isset($_COOKIE['email']) || isset($_COOKIE['pswd'])){
  $emailc=$_COOKIE['email'];
  $pswdc=$_COOKIE['pswd'];
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="./styles/login.css">

</head>
<body>
<div class="intro">
  <a href="index.php"><img src="clnf-logo.png" class="intro1"></a>
</div> 
<p class=intro2>Sign in to CLNF</p>
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm"> 
        <form action="./includes/login.inc.php" method="POST">
          <div class="group">
            <label for="user" class="label">Email </label>
            <input id="user" type="text" class="input" name="email" value="<?php echo $emailc ?>">
          </div>
          <div class="group">
            <label for="pass" class="label">Password</label>
            <input id="pass" type="password" class="input" data-type="password" name="pswd" value="<?php echo $pswdc  ?>">
          </div>
          <div class="group">
					  <input id="check" type="checkbox" class="check" name="remember" checked>
					  <label for="check"><span class="icon"></span> Keep me Signed in</label>
				  </div>
          <div class="group">
            <input type="submit" class="button" value="Sign In" name="login">
          </div>
        </form>
        <?php
          if ($_GET['error'] === "emptyinput") {
          echo "<p class='err'>Please fill all the fields !</p>";
          }
          elseif ($_GET['error'] === "invalidemail") {
            echo "<p class='err'>Please enter a Valid email addresss !</p>";
          }
          elseif($_GET['status']==="remember"){
            setcookie('email',$email,time()+3600*24*7);
            setcookie('pswd',$pswd,time()+3600*24*7);
            header("location:home.php?status=loggedin");
          }
          elseif($_GET['status']==="notremember"){
            setcookie('email',$email,time()-3600*24*7);
            setcookie('pswd',$pswd,time()-3600*24*7);
            header("location:home.php?status=loggedin");
          }
          if(isset($_SESSION["email"])){
            header("location:home.php");
          }
          else{


        ?>
        
<?php
// if($rem==true){

//   setcookie('email',$email,time() + 3600*24*7);
//   setcookie('password',$pswd,time() + 3600*24*7);
// }
// elseif($rem==false){
//   setcookie('email',$email,time() - 3600*24*7);
//   setcookie('password',$pswd,time() - 3600*24*7);
// }
?>
        <div class="hr"></div>
        <div class="foot-lnk">
          <a href="forgot.php">Forgot Password?</a>
        </div>
			</div>
			
	</div>
</div>
</body>
</html>
<?php 
} 
?> 