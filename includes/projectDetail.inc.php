<?php

$pid = $_GET['pid'];

$projectObj = new ProjectsView();

$project_details = $projectObj->showProjectDetails($pid);

foreach ($project_details as $project_detail) {

    $pname = $project_detail['project_name'];

    $pdescription = $project_detail['project_description'];

    $plead = $project_detail['team_lead_id'];

    $userObj = new UsersView();

    $lead_name =  $userObj->getUserNamebyId($plead);


    echo "<h1>$pname</h1>
        <p>$pdescription</p>
        <div class=projectdetail-createtask>
        <div><label><strong>Project Head</strong>:</label>
        <span>$lead_name</span></div>
        <button><a href='./create-task.php?projid=$pid'>Create task</a></button>
        </div>
        
";
}


//code to view the task

//This script runs when the user clicks on a project. The user, on clicking gets redirected to the view-task page. 

$userContrObj = new UsersContr();

// $currentUserId = $userContrObj->getCurrentUserId();

// $currentUserRole = $userContrObj->getCurrentUserRole();

$currentUserId = 4;

$currentUserRole = 'team lead';

//needs to fetched on click

$projectID = $pid;

$taskViewObj = new TasksView();


$listOfTasks = $taskViewObj->viewAllTasks($currentUserRole, $currentUserId, $projectID); //role is given to segregate. users_id 
//and project_id together determine the tasks for a developer.


echo "<br>";



if ($currentUserRole === 'team lead' || $currentUserRole === 'admin') {
    echo "<table>
    <tr>
      <th>Task</th>
      <th>Asignee</th>
      <th>Status</th>
      <th>Due date</th>
      <th>Priority</th>
    </tr> ";

    foreach ($listOfTasks as $val) {
        echo " <tr>
            <td><a href='./viewTask.php?taskid=$val[task_id]'>$val[task_name]</a></td>
            <td>$val[developer_id]</td>
            <td>$val[task_status]</td>
            <td>$val[task_due_date]</td>
            <td>$val[task_priority]</td>
            <td><button><a href='./includes/deletetask.inc.php?taskid=$val[task_id]&projid=$pid'>Delete</a></button></td>
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
        <td><a href='./viewTask.php?taskid=$val[task_id]'>$val[task_name]</a></td>
        <td>$val[task_status]</td>
        <td>$val[task_due_date]</td>
        <td>$val[task_priority]</td>
        <td><button><a href='./includes/deletetask.inc.php?taskid=$val[task_id]&projid=$pid'>Delete</a></button></td>
          </tr>";
    }
}
