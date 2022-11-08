<?php
include 'header.php';
?>

<div class="container">
    <h1>Projects</h1>
    <button class="create-btn" onclick="window.location.href='createProject.php'">Create Project</button> 

 <div class="project-view">
 <!-- <div>
    <span><strong>Project</strong></span>
    <span><strong>Code</strong></span>
    <span><strong>Client</strong></span>
    <span><strong>Team Lead</strong></span>
</div> -->
<table class="table">
                <thead>
                    <tr>
                        <th>Project</th>
                        <th>Code</th>
                        <th>Client</th>
                        <th>Team Lead</th>
                        <th></th>
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