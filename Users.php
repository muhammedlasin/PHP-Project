<?php
include 'header.php';
session_start();
if(strlen($_SESSION["email"])==0)
    {
    header('location:index.php');
    }
    else{

?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=
        "width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
    <link rel="stylesheet" href="styles/userlisting-style.css">
    <title>Users Page</title>
</head>
 
<body>
    <div class="container">
        <div class="row">
            <form action="includes/Users.inc.php" method="POST"> 
                <h2><select name="users" id="users" style="height: 25px;" onchange='this.form.submit()'>
                    <option value="all users" selected>All Users</option>
                    <option value="admin">Admin</option>
                    <option value="team lead">Team Lead</option>
                    <option value="developer">Developer</option>
                   
                </select>
            
            </form>
            <form action="InviteUser.php"><div class="btn3"><button class="btn2">Invite Users</button></div></form></h2>
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