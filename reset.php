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
    <div class="container">
        <h1>Reset password</h1>
        <h3>Please enter your new password<h3>
        <form action="./includes/reset.inc.php" method="POST">
            <p><input type="password" name="password" placeholder="Enter your new password"> </P>
            <p><input type="password" name="password1" placeholder="Repeat your new password"></p>
            <p><input type="hidden" name="email" value='<?php echo $email ?>'></p>
            <p><button type="submit" name="reset">Reset Password</button></p>
        </form>
    </div>

    <?php
if ($_GET['error'] === "emptyinput") {
  echo "<p class='err'>Please fill all the fields</p>";
}elseif($_GET['error'] === "differentpwd"){
  echo "<p class='err'>Sorry! You have to enter same password</p>";
}
?>
    
</body>
</html> 
