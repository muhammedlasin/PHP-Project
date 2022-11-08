<?php


$usersObj = new UsersView();
$users = $usersObj->displayUser();
foreach($users as $user)
                        {
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
                            <form action="/PHP-Project/UpdateUser.php?id=<?php echo $user['users_id']; ?>&name=<?php echo $user['users_name']; ?>&email=<?php echo $user['email']; ?>&role=<?php echo $user['users_role']; ?>" method="POST">
                            <input type="hidden" value="<?php echo $user['users_id']; ?>" name="val" />
                            <input type="submit" value="Update" class="btn" name="submit" />
                        </form></div>
                        </td>
                        <td>
                        <div class="btn1">
                            <form action="/PHP-Project/includes/delete.inc.php?id=<?php echo $user['users_id']; ?>" method="POST">
                            <input type="hidden" value="<?php echo $user['users_id']; ?>" name="val" />
                            <input type="submit" value="Delete" class="btn" name="submit" />
                        </form></div>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>

                    
                    

        
                