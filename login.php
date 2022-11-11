<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="./styles/login.css">

</head>
<body>
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
		<div class="login-form">
			<div class="sign-in-htm">
        <form action="./includes/login.inc.php" method="POST">
          <div class="group">
            <label for="user" class="label">Email </label>
            <input id="user" type="text" class="input" name="email">
          </div>
          <div class="group">
            <label for="pass" class="label">Password</label>
            <input id="pass" type="password" class="input" data-type="password" name="pswd">
          </div>
          <!-- <div class="group">
            <input id="check" type="checkbox" class="check" checked>
            <label for="check"><span class="icon"></span> Keep me Signed in</label>
          </div> -->
          <div class="group">
            <input type="submit" class="button" value="Sign In" name="login">
          </div>
        </form>
        <div class="hr"></div>
        <div class="foot-lnk">
          <a href="forgot.php">Forgot Password?</a>
        </div>
			</div>
			
	</div>
</div>
</body>
</html>