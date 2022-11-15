<?php

// if(isset($_SESSION["email"])){
//     header("location:./home.php");
//   }
//   else{
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Forgot Password </title>
    <link rel="stylesheet" href="./styles/forgot.css">
    
</head>
<body>

<div class="intro">
  <a href="index.php"><img src="clnf-logo.png" class="intro1"></a>
</div> 
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Forgot Password</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm">
                <form action="./includes/forgot.inc.php" method="POST">
                    <p class="intro2">You will recieve a link in your registered Email ID to reset your passowrd</p>
                    <div class="group">
                        <label for="user" class="label">Email </label>
                        <input id="user" type="text" class="input" name="email">
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Submit" name="forgot">
                    </div>
                </form>
                <?php
                    if ($_GET['error'] === "emptyinput") {
                        echo "<p class='err'>Please fill all the fields !</p>";
                    }
                    elseif ($_GET['error'] === "invalidemail") {
                        echo "<p class='err'>Please enter a Valid email addresss !</p>";
                    }
                    elseif ($_GET['error'] === "userdoesnotexist") {
                        echo "<p class='err'>This is not a registered email ID !</p>";
                    }
                    elseif ($_GET['status'] === "success") {
                        echo "<p class='err'>Message sent, Please check your email for the reset link</p>";
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
        <form action="./includes/forgot.inc.php" method="POST">
            <h2>Forgot Password?</h2>
            <h5>You will recieve a link in your registered mail ID to reset your passowrd</p>
            <label><b>Email ID</b></label><br>
            <p><input type="email" name="email" placeholder="Enter email id"></p>
            <p><button class="btn" name="forgot" type="submit">Send</button></p>
        </form>
</div>    -->
