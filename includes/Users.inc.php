<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/userlisting-style.css">
    <title>Document</title>
</head>
<body>



<?php
if($_POST['users'] != '') {
   
    include "../classes/Dbh.class.php";
       
    include "../classes/Users.class.php";
        
    include "../classes/UsersContr.class.php";

    include "../classes/UsersView.class.php";
        
    if($_POST['users']=='admin'){
        $roles = 'admin';
        $usersObj = new UsersView();

            $users = $usersObj->filterUsers($roles);
    }elseif($_POST['users']=='team lead'){
        $roles = 'team lead';
        $usersObj = new UsersView();

            $users = $usersObj->filterUsers($roles);
    }elseif($_POST['users']=='developer'){
        $roles = 'developer';
        $usersObj = new UsersView();

            $users = $usersObj->filterUsers($roles);
    }else{
        $roles = 'all users';
        $usersObj = new UsersView();

        $users = $usersObj->displayUser();
    }
        
                foreach($users as $user)
                    {
                        ?>
                        
 
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
                
                        <tr>
                            <td>
                                <?php echo $user['users_id']; 
                                $user_id=$user['users_id'];
                                ?>
                            </td>
                            <td>
                                <?php echo $user['users_name']; ?>
                            </td>
                            <td>
                                <?php echo $user['email']; ?>
                            </td>
                            <td>
                                <?php echo $user['users_role']; ?>
                            </td>
                            <td>
                            <div class="btn1">
                                <form action="/PHP_testing/UpdateUser.php?id=<?php echo $user['users_id']; ?>&name=<?php echo $user['users_name']; ?>&email=<?php echo $user['email']; ?>&role=<?php echo $user['users_role']; ?>" method="POST">
                                <input type="hidden" value="<?php echo $user['users_id']; ?>" name="val" />
                                <input type="submit" value="Update" class="btn" name="submit" />
                            </form></div>
                            </td>
                            <td>
                            <div class="btn1">
                                <form action="/PHP_testing/includes/delete.inc.php?id=<?php echo $user['users_id']; ?>" method="POST">
                                <input type="hidden" value="<?php echo $user['users_id']; ?>" name="val" />
                                <input type="submit" value="Delete" class="btn" name="submit" />
                            </form></div>
                            </td>
                        </tr>
                        </tbody>
            </table>
            </body>
                        </html>
                        <?php
                        }
                        // header("location:../Users.php?status=sucess");
                    }
                        ?>
                    


       

 
  