<?php

include 'header.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/update-style.css">
    <title>Invite User</title>
</head>
<body>
    <div class="content">
        <form action="includes/InviteUser.inc.php" method="post">
            <h2>Invite User</h2>
            <label><b>Email ID</b></label><br>
            <input type="email" name="email" placeholder="Enter email id"><br><br>
            <!-- <label><b>Role</b></label><br>
            <input type="text" name="roles" placeholder="Enter role"><br><br> -->
            <label><b>Select role<b></label><br>

            <select name="roles" id="roles">
                <option value="developer">Developer</option>
                <option value="admin">Admin</option>
                <option value="team lead">Team Lead</option>
            </select><br><br>
            <!-- <label><b>Description</b></label><br>
            <input type="text" name="descriptions" placeholder="Enter description"><br><br> -->
            <!-- <form action="/PHP_testing/user.php" method="POST"><button class="cancel-btn" type="submit" name="cancel">Cancel</button></form>
            <form action="/PHP_testing/includes/invite_user.inc.php" method="POST"><button class="send-btn" type="submit" name="send">Send</button>
            </form> -->
            <!-- <div class="link"><a href="/PHP_testing/Users.php" data-role="button" data-inline="true">Cancel</a>
            <a href="/PHP_testing/includes/invite_user.inc.php" data-role="button" data-inline="true" data-theme="b">Send</a></div> -->
            <div class="link">
                <!-- <button class="btn" onclick="window.location.href='/PHP_testing/Users.php'" data-inline="true">Cancel</button> -->
                <a style="text-decoration:none" class="btn" href="Users.php">Cancel</a>
            <button class="btn" name="submit" type="submit" data-inline="true">Send</button></div>
        </form>

    <?php

    //   $user = new InviteContr ();
    //   $user-> inviteUser ("tina@gmail.com","developer","tfyttdd");
    

    // if ($_GET['error'] === "emptyinput") {
    //     echo "<p class='error'>Please fill all the fields</p>";
    //   }

    ?>


    </div>
</body>
</html>