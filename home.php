<?php
include 'header.php';
?>
<div class="home">
    <h1 class="home-heading">Welcome
        <?php echo $_SESSION['users_name'] ?>
    </h1>

    <h1>Manage all your projects under one platform</h1>

    <h3 class="home-heading">Recent Works</h3>
    <div class="home-container">
        <?php

    include 'includes/home.inc.php';
    ?>
    </div>
</div>