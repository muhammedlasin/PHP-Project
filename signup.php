<!DOCTYPE html>
<html lang="en">
<head>
    <title>Signup</title>
    <link rel="stylesheet" href="./styles/signup.css">
</head>
<body>

    <div class="container">
    
        <h1>Sign Up</h1>
        <h3>Please fill this form to create an account <h3>
        <form action="./includes/signup.inc.php" method="POST">
            <p><input type="text" name="name" placeholder="Enter your Name"></p>
            <p><input type="text" name="email" placeholder="Enter your email"></p>
            <p><input type="password" name="pswd" placeholder="Enter your password"></p>
            <p><input type="password" name="pswd1" placeholder="Enter the same password"></p>
            <p><button type="submit" name="signup">Sign Up</button></p>
        </form>
    </div> 
<?php
if ($_GET['error'] === "emptyinput") {
    echo "<p class='err'>Please fill all the fields</p>";
  }elseif($_GET['error'] === "invalidemail"){
    echo "<p class='err'>Please enter valid email id</p>";
  }elseif($_GET['error'] === "noaccess"){
    echo "<p class='err'>Sorry! You have no access to this page</p>";
  }elseif($_GET['error'] === "differentpwd"){
    echo "<p class='err'>Sorry! You have to enter same password</p>";
  }

?>
</body>
</html>
