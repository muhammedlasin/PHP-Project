<?php
include 'header.php';
if(strlen($_SESSION["email"])==0)
    {
    header('location:index.php');
    }
    else{


?>


<div class="container">
    <h1>Projects</h1>
    <button class="create-btn" onclick="window.location.href='createProject.php'">Create Project</button> 

 <div class="project-view">

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
<?php } ?>