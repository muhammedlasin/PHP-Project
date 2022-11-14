<?php
include 'header.php';
if (isset($_GET['edit'])) {
    $edit = $_GET['edit'];
    $pid = $_GET['pid'];
    $message = '';
    if ($edit === 'heading') {
        $message = "Project heading";

    } else if ($edit = 'description') {

        $message = "Project description";


    } else if ($edit === 'head') {

        $message = "Project head";

    }

}

?>



<div class="project-container">
    <?php
    include 'includes/projectDetail.inc.php'
        ?>
</div>