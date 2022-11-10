<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Forgot Password </title>
    <link rel="stylesheet" href="./styles/forgot.css">
    
</head>
<body>

<div class="container">
        <form action="./includes/forgot.inc.php" method="POST">
            <h2>Forgot Password?</h2>
            <h5>You will recieve a link in your registered mail ID to reset your passowrd</p>
            <label><b>Email ID</b></label><br>
            <p><input type="email" name="email" placeholder="Enter email id"></p>
            <p><button class="btn" name="forgot" type="submit">Send</button></p>
        </form>
</div>   

<?php
if ($_GET['error'] === "emptyinput") {
  echo "<p class='err'>Please fill all the fields</p>";
}elseif($_GET['error'] === "invalidemail"){
  echo "<p class='err'>Please enter valid email id</p>";
}elseif($_GET['error'] === "userdoesnotexist"){
  echo "<p class='err'>Sorry! User does not exist</p>";
}
?>

</body>
</html>