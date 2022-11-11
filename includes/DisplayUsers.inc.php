<?php
session_start();


$u_email = $_SESSION["email"];
$u_id = $_SESSION["users_id"];
$u_name = $_SESSION["users_name"];
$u_role = $_SESSION["users_role"];

$usersObj = new UsersView();
$users = $usersObj->displayUser();
foreach ($users as $user) {
?>
<tr>
    <td>
        <?php echo $user['users_id'];
    $user_id = $user['users_id'];
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
            <form
                action="UpdateUser.php?id=<?php echo $user['users_id']; ?>&name=<?php echo $user['users_name']; ?>&email=<?php echo $user['email']; ?>&role=<?php echo $user['users_role']; ?>"
                method="POST">
                <input type="hidden" value="<?php echo $user['users_id']; ?>" name="val" />
                <input type="submit" value="Update" class="btn" name="submit" />
            </form>
        </div>
    </td>
    <td>
        <?php
    if ($u_email !== $user['email']) {
        ?>
        <div class="btn1">
            <form action="includes/delete.inc.php?id=<?php echo $user['users_id']; ?>" method="POST">
                <input type="hidden" value="<?php echo $user['users_id']; ?>" name="val" />
                <input type="submit" value="Delete" class="btn" name="submit" />
            </form>
        </div>
        <?php
    }
        ?>
    </td>
</tr>
<?php
}
?>
