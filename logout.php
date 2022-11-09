<?php
    include "./includes/login.inc.php";
    session_start();
    //Validating Session
    if(strlen($_SESSION["email"])==0)
    {
    header('location:index.php');
    }
    else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Logout</title>
    <link rel="stylesheet" href="./styles/welcome.css">

</head>
<body>
    <?php
        $uemail=$_SESSION["email"];
        $uname=$_SESSION["users_name"];
       
    ?>
    <h3>Welcome <?php echo $uname;?>
    <form action="./includes/logout.inc.php" method=POST>
        <button type="submit" name="logout">Logout</button>
    </form> 
</body>
</html>

<?php } ?>






















