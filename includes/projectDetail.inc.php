<?php

//code to view the task

//This script runs when the user clicks on a project. The user, on clicking gets redirected to the view-task page. 

$userContrObj = new UsersContr();

$currentUserId = $userContrObj->getCurrentUserId();

$currentUserRole = $usersContrObj->getUserRole($currentUserId);

//needs to fetched on click

$projectID = 

$taskViewObj = new TasksView();

$listOfTasks = $taskViewObj->viewAllTasks($currentUserRole, $currentUserId, $projectID);



$pid= $_GET['pid'];

$projectObj = new ProjectsView();

$project_details = $projectObj -> showProjectDetails($pid);

foreach($project_details as $project_detail){

    $pname = $project_detail['project_name'];

    $pdescription = $project_detail['project_description'];

    $plead = $project_detail['team_lead_id'];

    $userObj = new UsersView();

    $lead_name =  $userObj->getUserNamebyId($plead);


    echo "<h1>$pname</h1>
        <p>$pdescription</p>
        <label><strong>Project Head</strong>:</label>
        <span>$lead_name</span>
";
}

