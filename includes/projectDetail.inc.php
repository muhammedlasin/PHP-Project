<?php

session_start();

$u_email = $_SESSION["email"];
$u_id = $_SESSION["users_id"];
$u_name = $_SESSION["users_name"];
$u_role = $_SESSION["users_role"];

$pid= $_GET['pid'];


$projectObj = new ProjectsView();

$projectContrObj = new ProjectsContr();

$project_details = $projectObj -> showProjectDetails($pid);

$emailObj = new Email();



foreach($project_details as $project_detail){


$userObj = new UsersView();

$team_leads = $userObj -> displayUsersByRole('team-lead');

    $pname = $project_detail['project_name'];

    $pdescription = $project_detail['project_description'];

    $plead = $project_detail['team_lead_id'];

    $userObj = new UsersView();

    $lead_name =  $userObj -> getUserNamebyId($plead);


    //back button

    echo "<button><a href='./project.php?uid=$u_id'>Back</a></button>";



    // Title edit

   

    echo "<form method='post' action=''>";
    if($u_role === 'admin'){
    
    echo "<input id='project-heading' onclick='showHeadingButton()' name='projectheading' class='inherit' value='$pname'>

        <script>
        function showHeadingButton(){
            hideButton()
            document.getElementById('save-heading-btn').style.display = 'inline-block';
            document.getElementById('cancel-heading-btn').style.display = 'inline-block';
        
            console.log('clicked');
        }

        function hideHeadingButton(){
            document.getElementById('save-heading-btn').style.display = 'none';
            document.getElementById('cancel-heading-btn').style.display = 'none';
        }
        </script>
    <br>
    <button id='save-heading-btn' onchange='this.form.submit()' name='save-heading-btn'>Save</button>
    <button id='cancel-heading-btn' onclick='hideHeadingButton()'>Cancel</button>
    <br>
    <br>"
    ;
    }
    else{
            echo "<input id='project-heading' value=$pname name='projectheading' class='inherit' readonly />
            <br>";
    }

    echo "</form>";

    if(isset($_POST["save-heading-btn"])){


        $updatedHeading = $_POST["projectheading"];

        $projectContrObj->updateHeading($updatedHeading, $pid);


        header("Location: projectDetail.php?pid=$pid&edit=heading");
    
    }



    //description edit



  echo "<h3>Description</h3>
  <form method='post' action=''>";
    if($u_role === 'admin'){
    
    echo "<textarea class='text-area' id='task-para' onclick='showButton()' name='projectpara'>$pdescription</textarea>

        <script>
        function showButton(){
            hideHeadingButton();
            document.getElementById('save-btn').style.display = 'inline-block';
            document.getElementById('cancel-btn').style.display = 'inline-block';
        
            console.log('clicked');
        }

        function hideButton(){
            document.getElementById('save-btn').style.display = 'none';
            document.getElementById('cancel-btn').style.display = 'none';
        }
        </script>
    <br>
    <button id='save-btn' onchange='this.form.submit()' name='save-btn'>Save</button>
    <button id='cancel-btn' onclick='hideButton()'>Cancel</button>
    <br>"
    ;
    }
    else{
            echo "<textarea id='task-para' name='projectpara' readonly>$pdescription</textarea>
            <br>";
    }

    echo "</form>";

    if(isset($_POST["save-btn"])){


        $updatedDescription = $_POST["projectpara"];

        $projectContrObj->updateDescription($updatedDescription, $pid);

        header("Location: projectDetail.php?pid=$pid");
    
    }





// project lead selection 
    echo "<label><strong>Project Head</strong></label>
    <form action='' method='post'>";

    if($u_role === 'admin'){
        echo "<select name ='project-head' onchange='this.form.submit()'>";
    }
    else{
        echo "<select name ='project-head' disabled='disabled'>";
    }

    echo "<option>$lead_name</option>";

    foreach($team_leads as $val){

    $team_lead_name = $val['users_name'];
    $team_lead_id = $val['users_id'];

    if($team_lead_name !== $lead_name){
    echo "<option value='$team_lead_id'>$team_lead_name</option>";
    }
    }

    echo "</select></form>";

    if(isset($_POST["project-head"])){

    $team_lead_id = $_POST["project-head"];
    $projectContrObj->updateLead($team_lead_id, $pid);
    header("Location: projectDetail.php?pid=$pid");

    }
}


//task listing

$currentUserId = $u_id;

$currentUserRole = $u_role;

if($currentUserRole === 'admin' || $currentUserRole === 'team-lead') {
    echo "<button><a href='./create-task.php?projid=$pid'>Create task</a></button>";
}



$userContrObj = new UsersContr();





//needs to fetched on click

$projectID = $pid;

$taskViewObj = new TasksView();


$list = $taskViewObj->viewAllTasks($currentUserRole, $currentUserId, $projectID); //role is given to segregate. users_id 
//and project_id together determine the tasks for a developer.

$listOfTasks = array_reverse($list);

echo "<br>";



if ($currentUserRole === 'team-lead' || $currentUserRole === 'admin') {
    
    echo "<table>
    <tr>
      <th>Task</th>
      <th>Asignee</th>
      <th>Status</th>
      <th>Due date</th>
      <th>Priority</th>
    </tr> ";

    foreach ($listOfTasks as $val) {
        $devName = $userObj->getUserNamebyId($val['developer_id']);
        $tid = $val['task_id'];
        echo " <tr>
            <td><a href=./viewTask.php?taskid=$tid&projid=$pid>$val[task_name]</a></td>
            <td>$devName</td>
            <td>$val[task_status]</td>
            <td>$val[task_due_date]</td>
            <td>$val[task_priority]</td>
            <td><button><a href='./includes/deletetask.inc.php?taskid=$val[task_id]&projid=$pid' onClick=' return confirm(\"Are you sure you want to delete this task?\");' >Delete</a></button></td>
          </tr>";
    }
} else {
    echo "<table>
    <tr>
      <th>Task</th>
      <th>Status</th>
      <th>Due date</th>
      <th>Priority</th>
    </tr> ";

    foreach ($listOfTasks as $val) {
        echo " <tr>
        <td><a href='./viewTask.php?taskid=$val[task_id]&projid=$pid'>$val[task_name]</a></td>
        <td>$val[task_status]</td>
        <td>$val[task_due_date]</td>
        <td>$val[task_priority]</td>
          </tr>";
    }
}
