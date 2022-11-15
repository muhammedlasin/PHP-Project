<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="./styles/signup.css">
</head>
<body>
<div class="intro">
  <a href="index.php"><img src="clnf-logo.png" class="intro1"></a>
</div> 
<p class=intro2>Sign in to CLNF</p>
    <div class="login-wrap">
        <div class="login-html">
		    <input id="tab-1" type="radio" name="tab" class="sign-in"><label for="tab-1" class="tab"></label>
		    <input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">Sign Up</label>
            <div class="login-form">
            <div class="sign-up-htm">
                <form action="./includes/signup.inc.php" method="POST">
                    <div class="group">
                        <label for="user" class="label">Username</label>
                        <input id="user" type="text" class="input" name="name">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Email Address</label>
                        <input id="pass" type="text" class="input" name="email">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input" data-type="password" name="pswd">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Repeat Password</label>
                        <input id="pass" type="password" class="input" data-type="password" name="pswd1">
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign Up" name="signup">
                    </div>
                </form>
                <?php
                    if ($_GET['error'] === "emptyinput") {
                        echo "<p class='err'>Please fill all the fields !</p>";
                    }
                    elseif ($_GET['error'] === "invalidemail") {
                        echo "<p class='err'>Please enter a Valid email addresss !</p>";
                    }
                    elseif ($_GET['error'] === "diffpwd") {
                        echo "<p class='err'>Please repeat the same Password</p>";
                    }
                    elseif ($_GET['error'] === "noaccess") {
                        echo "<p class='err'>You do not have access to this page, please contact the admin</p>";
                    }


                ?>
				<div class="hr"></div>
                
				<!-- <div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div> -->
		    </div>
            </div>
	    </div>
    </div>
</body>
</html>
 <!-- <div class="container">
    
        <h1>Sign Up</h1>
        <h3>Please fill this form to create an account <h3>
        <form action="./includes/signup.inc.php" method="POST">
            <p><input type="text" name="name" placeholder="Enter your Name"></p>
            <p><input type="text" name="email" placeholder="Enter your email"></p>
            <p><input type="password" name="pswd" placeholder="Enter your password"></p>
            <p><input type="password" name="pswd1" placeholder="Enter the same password"></p>
            <p><button type="submit" name="signup">Sign Up</button></p>
        </form>
    </div>  -->