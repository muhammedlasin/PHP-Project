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
            <label><b>Select role<b></label><br>

            <select name="roles" id="roles">
                <option value="developer">Developer</option>
                <option value="admin">Admin</option>
                <option value="team lead">Team Lead</option>
            </select><br><br>
            <!-- <label><b>Description</b></label><br>
            <input type="text" name="descriptions" placeholder="Enter description"><br><br> -->
            <div class="link">
                <a style="text-decoration:none" class="btn" href="Users.php">Cancel</a>
            <button class="btn" name="submit" type="submit" data-inline="true">Send</button></div>
        </form>

    <?php
    

    // if ($_GET['error'] === "emptyinput") {
    //     echo "<p class='error'>Please fill all the fields</p>";
    //   }

    ?>


    </div>
</body>
</html>