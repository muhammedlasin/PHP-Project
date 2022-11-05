<?php
$projectObj = new ProjectsView();

// //developer
// $project_details = $projectObj->showDevProjects(100);

// //team lead

// $project_details = $projectObj->showProjects(1);

//Admin

$project_data = $projectObj->showAllProjects();

$project_details = array_reverse($project_data);


foreach($project_details as $project_detail){

    $pid = $project_detail['project_id'];

    $pname = $project_detail['project_name'];

    $pcode = $project_detail['project_code'];

    $pclient = $project_detail['client_name'];

    $plead = $project_detail['team_lead_id'];

    $userObj = new UsersView();

    $lead_name =  $userObj -> getUserNamebyId($plead);

    echo "<div>
    <span><a href='projectDetail.php?pid=$pid'>$pname</a></span>
    <span>$pcode</span>
    <span>$pclient</span>
    <span>$lead_name</span>
    <button><a href='includes/deleteproject.inc.php?varname=$pid'>Delete</a></button>
    </div>";
}
?>