<?php
                        // include_once ('../classes/Dbh.class.php');
                        // include_once ('../classes/Users.class.php');
                        // include_once ('../classes/UsersView.class.php');
                        // $stmt = $conn->prepare(
                        //         "SELECT * FROM Users");
                        // $stmt->execute();
                        // $users = $stmt->fetchAll();
//                         ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


$usersObj = new UsersView();
$users = $usersObj->displayUser();
foreach($users as $user)
                        {
                            // $uid = $user['users_id'];
                            // $delete = "includes/delete.inc.php?var=" .$user['users_id'];
                    ?>
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
                        <!-- <button class="btn"><a href='{$delete}'>Delete</a></button> -->
                            <input type="hidden" value="<?php echo $user['users_id']; ?>" name="val" />
                            <input type="submit" value="Update" class="btn" name="submit" />
                        </form></div>
                        </td>
                        <td>
                        <div class="btn1">
                            <form action="/PHP_testing/includes/delete.inc.php?id=<?php echo $user['users_id']; ?>" method="POST">
                        <!-- <button class="btn"><a href='{$delete}'>Delete</a></button> -->
                            <input type="hidden" value="<?php echo $user['users_id']; ?>" name="val" />
                            <input type="submit" value="Delete" class="btn" name="submit" />
                        </form></div>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>

                    
                    

        
                