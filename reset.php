<?php

// if(isset($_SESSION["email"])){
//     header("location:./home.php");
//   }
//   else{
// ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="./styles/reset.css">
</head>
<body>
<?php
$email=$_GET["email"];
?>
<div class="intro">
  <a href="index.php"><img src="clnf-logo.png" class="intro1"></a>
</div> 
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Reset Password</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm">
                <form action="./includes/reset.inc.php" method="POST">
                    <div class="group">
                        <label for="user" class="label">Enter your new Password</label>
                        <input id="user" type="password" class="input" name="password">
                    </div>
                    <div class="group">
                        <label for="user" class="label">Repeat your new password</label>
                        <input id="user" type="password" class="input" name="password1">
                    </div>
                    <div class="group">
                        <input id="user" type="hidden" class="input" name="email" value='<?php echo $email ?>'>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Reset Password" name="reset">
                    </div>
                </form>
                <?php
                    if ($_GET['error'] === "emptyinput") {
                        echo "<p class='err'>Please fill all the fields !</p>";
                    }
                    elseif ($_GET['error'] === "differentpwd") {
                        echo "<p class='err'>Please repeat the same password !</p>";
                    }
                    elseif ($_GET['status'] === "success") {
                        echo "<p class=err>Your password has been sucessfully changed. You can click here to <u><a href=login.php>Login</a></u></p>";
                    }

                ?>
                <div class="hr"></div>
			</div>	
	    </div>
    </div>
</div>
    

    
</body>
</html> 


<!-- <div class="container">
        <h1>Reset password</h1>
        <h3>Please enter your new password<h3>
        <form action="./includes/reset.inc.php" method="POST">
            <p><input type="password" name="password" placeholder="Enter your new password"> </P>
            <p><input type="password" name="password1" placeholder="Repeat your new password"></p>
    
            <p><button type="submit" name="reset">Reset Password</button></p>
        </form>
    </div> -->
