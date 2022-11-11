<?php
session_start();


$u_email = $_SESSION["email"];
$u_id = $_SESSION["users_id"];
$u_name = $_SESSION["users_name"];
$u_role = $_SESSION["users_role"];

if($_POST['users'] != '') {
   
    include "../classes/Dbh.class.php";
       
        include "../classes/Users.class.php";
        
        include "../classes/UsersContr.class.php";

        include "../classes/UsersView.class.php";
        
    if($_POST['users']=='admin'){
        $roles = 'admin';
        $usersObj = new UsersView();
        $users = $usersObj->filterUsers($roles);
    }elseif($_POST['users']=='team-lead'){
        $roles = 'team lead';
        $usersObj = new UsersView();
        $users = $usersObj->filterUsers($roles);
    }elseif($_POST['users']=='developer'){
        $roles = 'developer';
        $usersObj = new UsersView();
        $users = $usersObj->filterUsers($roles);
    }elseif($_POST['users']=='all users'){
        $roles = 'all users';
        $usersObj = new UsersView();
        $users = $usersObj->displayUser();
    }else{

$usersObj = new UsersView();
$users = $usersObj->displayUser();
}
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
          
                <a name="submit" onClick="return confirm('Are you sure you want to delete this user?');" href="includes/delete.inc.php?id=<?php echo $user['users_id']; ?>">Delete</a>
            
        </div>
        <?php
    }
        ?>
    </td>
</tr>
<?php
}}
?>