<?php
include 'header.php';
$u_email = $_SESSION["email"];
$u_id = $_SESSION["users_id"];
$u_name = $_SESSION["users_name"];
$u_role = $_SESSION["users_role"];

?>


<div class="container">
    <h1>Projects</h1>
    <?php
    if ($u_role === 'admin') {
    ?>
    <button class="create-btn" onclick="window.location.href='createProject.php'">Create Project</button>
    <?php
    }
    ?>
    <div class="project-view">

        <table class="table">
            <thead>
                <tr>
                    <th>Project</th>
                    <th>Code</th>
                    <th>Client</th>
                    <th>Team Lead</th>
                    <?php
                    if ($u_role === 'admin') {

                        echo "<th></th>";

                    }


                    ?>

                </tr>
            </thead>

            <tbody>
                <?php
                include 'includes/project.inc.php';
                ?>
            </tbody>
        </table>

    </div>
</div>
