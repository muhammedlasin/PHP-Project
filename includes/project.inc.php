<?php

$projectObj = new ProjectsView();

// $user_id = $_SESSION['users_id'];
// $user_role = $_SESSION['users_role'];


// if($user_role === 'admin'){
//     $project_data = $projectObj->showAllProjects();
// }

// else if($user_role === 'team-lead'){
//     // $project_details = $projectObj->showProjects($user_id);
// }

// else if($user_role === 'developer'){

//     // $project_details = $projectObj->showDevProjects($user_id);

// }



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

    echo "<tr>
    <td><a href='projectDetail.php?pid=$pid'>$pname</a></td>
    <td>$pcode</td>
    <td>$pclient</td>
    <td>$lead_name</td>
    <td><button class='btn btn2'><a href='includes/deleteproject.inc.php?varname=$pid'>Delete</a></button></td>
    ";
}
?>