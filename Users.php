<?php

include 'header.php';
session_start();
if (strlen($_SESSION["email"]) == 0) {
    header('location:index.php');
} else {

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="styles/userlisting-style.css">
    <title>Users Page</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h2>All Users</h2>
            <form action="InviteUser.php">
                <div class="btn3"><button class="btn2">Invite Users</button></div>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
    include 'includes/DisplayUsers.inc.php';
                    ?>
                </tbody>
            </table>

            <?php

            ?>
        </div>
    </div>
</body>

</html>
<?php } ?>