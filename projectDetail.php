<?php
include 'header.php';

$edit = $_GET['edit'];
if ($edit === 'heading') {
    $message = "Project heading";
}

echo "<p id='pop-up'>$message is updated.</p>
<script>
function setVis(){
    
    document.getElementById('pop-up').style.visibility = 'visible'; 
}
setVis();
setTimeout(function(){
    document.getElementById('pop-up').style.visibility = 'hidden'; 
 }, 2000);
</script>";


?>



<div class="project-container">
    <?php
    include 'includes/projectDetail.inc.php'
        ?>
</div>