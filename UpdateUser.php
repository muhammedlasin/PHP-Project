<?php

include 'header.php';

if (isset($_GET['id'])) {
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
        <form action="./includes/UpdateUser.inc.php" method="post">
            <h2>Update User</h2>
            <label><b>Username</b></label><br>
            <input class="input" type="text" name="username" placeholder="Enter username"
                value="<?php echo $_GET['name']; ?>"><br><br>
            <label><b>Select role<b></label><br>
            <?php $default = $_GET['role']; ?>
            <select name="roles" id="roles">
                <option value='<?php echo $default ?>' selected='selected'>
                    <?php echo $default ?>
                </option>
                <option value="developer">developer</option>
                <option value="admin">admin</option>
                <option value="team-lead">team-lead</option>
            </select><br><br>
            <label><b>Email ID</b></label><br>
            <input type="email" name="email" class="input" placeholder="Enter email id" value="<?php echo $_GET['email']; ?>"><br><br>
            <div class="link">
            <button class="btn" name="submit" type="submit" data-inline="true">Update</button>
                <button class="btn"><a style="text-decoration:none" class="btn" href="Users.php">Cancel</a></button>
            </div>
            <div style="display:none"><input type="hidden" value="<?php echo $_GET['id']; ?>" name="val" /></div>
    </div>
    </form>

    <?php


if ($_GET['error'] === "emptyinput") {
    echo "<p class='err1'>Please fill all the fields</p>";
  }elseif($_GET['error'] === "invalidemail"){
    echo "<p class='err1'>Please enter valid email id</p>";
  }
    //   }elseif($_GET['error'] === "emailalreadyexist"){
//     echo "<p class='err'>Email already taken</p>";
//   }
    

    ?>


    </div>
</body>

</html>