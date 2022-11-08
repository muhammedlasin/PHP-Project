<?php

include 'header.php';

if(isset($_GET['id'])){
    $user_id = $_GET['id'];
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/update-style.css">
    <title>Update User</title>
</head>
<body>
    <div class="content">
        <form action="/PHP_testing/includes/UpdateUser.inc.php" method="post">
            <h2>Update User</h2>
            <label><b>Username</b></label><br>
            <input type="text" name="username" placeholder="Enter username" value="<?php echo $_GET['name']; ?>"><br><br>
            <!-- <label><b>Role</b></label><br>
            <input type="text" name="roles" placeholder="Enter role"><br><br> -->
            <label><b>Select role<b></label><br>
            <?php $default = $_GET['role']; ?>
            <select name="roles" id="roles">
            <option value='<?php echo $default?>' selected='selected'><?php echo $default?></option>
                <option value="developer">developer</option>
                <option value="admin">admin</option>
                <option value="team lead">team lead</option>
            </select><br><br>
            <label><b>Email ID</b></label><br>
            <input type="email" name="email" placeholder="Enter email id" value="<?php echo $_GET['email']; ?>"><br><br>
            <!-- <form action="/PHP_testing/user.php" method="POST"><button class="cancel-btn" type="submit" name="cancel">Cancel</button></form>
            <form action="/PHP_testing/includes/invite_user.inc.php" method="POST"><button class="send-btn" type="submit" name="send">Send</button>
            </form> -->
            <!-- <div class="link"><a href="/PHP_testing/Users.php" data-role="button" data-inline="true">Cancel</a>
            <a href="/PHP_testing/includes/invite_user.inc.php" data-role="button" data-inline="true" data-theme="b">Send</a></div> -->
            
            <!-- <div class="link"><button class="btn" onclick="window.location.href='/PHP_testing/Users.php'" data-inline="true">Cancel</button> -->
            <div class="link"><a style="text-decoration:none" class="btn" href="Users.php">Cancel</a>
            <button class="btn" name="submit" type="submit" data-inline="true">Update</button></div>
            <div style="display:none"><input type="hidden" value="<?php echo $_GET['id']; ?>" name="val" /></div>
            </div>
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