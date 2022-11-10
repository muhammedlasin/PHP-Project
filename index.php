<?php

// print_r($_COOKIE);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="./styles/index.css">

</head>
<body>

<div class="container">
  <div class="login">
    <h1>Login</h1>
    <form method="POST" action="./includes/login.inc.php">
      <p><input type="text" name="email" placeholder="Enter your Email Address"></p>
      <p><input type="password" name="pswd" placeholder="Enter your Password"></p>
      <!-- <p class="remember_me">
        <label>
          <input type="checkbox" name="remember" id="remember_me">
          Remember me
        </label>
      </p> -->
      <p class="submit"><input type="submit" name="login" value="Login"></p>
      <p class="submit"><input type="submit" name="signup" value="Signup"></p>
    </form>
  </div>
 
  <div class="login-help">
    <p>Forgot your password? <a href="forgot.php">Click here to reset it</a>.</p>
  </div>
</div>

    <!-- <div class="container">
        <h1>Login</h1> <br>
        <h4>Please fill this form to login to your account </h4>
        <form action="./includes/login.inc.php" method="POST">
            <input type="text" name="email" placeholder="Enter your email"> <br> <br>
            <input type="password" name="pswd" placeholder="Enter your password"><br> <br>
            <button type="submit" name="login">Login</button>
            <button type="submit" name="signup">Sign Up</button>
            <input type="checkbox" name="remember">remember me<br>
            <a href="forgot.php">Forgot password</a>
        </form>
    </div>  -->

<?php
if ($_GET['error'] === "emptyinput") {
  echo "<p class='err'>Please fill all the fields</p>";
}elseif($_GET['error'] === "invalidemail"){
  echo "<p class='err'>Please enter valid email id</p>";
}elseif($_GET['error'] === "wrongpassword"){
  echo "<p class='err'>Sorry! You entered a wrong password</p>";
}
?>
</body>
