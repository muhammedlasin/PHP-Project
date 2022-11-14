<?php
include 'header.php';
$edit = $_GET['edit'];
if ($edit === 'heading') {
    $message = "Project heading";
}
echo "<p id='pop-up'>$message is updated.</p>
<script>
setTimeout(function(){
    document.getElementById('pop-up').style.display = 'none'; 
 }, 5000);
</script>";


?>



<div class="project-container">
    <?php
    include 'includes/projectDetail.inc.php'
        ?>
</div>