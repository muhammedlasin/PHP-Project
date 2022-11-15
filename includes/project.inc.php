<?php
session_start();

$projectObj = new ProjectsView();

$u_email = $_SESSION["email"];
$u_id = $_SESSION["users_id"];
$u_name = $_SESSION["users_name"];
$u_role = $_SESSION["users_role"];

if ($u_role === 'admin') {
    $project_data = $projectObj->showAllProjects();
} else if ($u_role === 'team-lead') {
    $project_data = $projectObj->showProjects($u_id);
} else if ($u_role === 'developer') {

    $project_data = $projectObj->showDevProjects($u_id);

}


$project_details = array_reverse($project_data);


foreach ($project_details as $project_detail) {

    $pid = $project_detail['project_id'];

    $pname = $project_detail['project_name'];

    $pcode = $project_detail['project_code'];

    $pclient = $project_detail['client_name'];

    $plead = $project_detail['team_lead_id'];

    $userObj = new UsersView();

    $lead_name = $userObj->getUserNamebyId($plead);

    echo "<tr>
    <td><a href='projectDetail.php?pid=$pid&uid=$u_id'>$pname</a></td>
    <td>$pcode</td>
    <td>$pclient</td>";
    if ($u_role !== 'team-lead') {

        echo "<td>$lead_name</td>";
    }
    if ($u_role === 'admin') {

        echo "<td class='btn1'><a href='includes/deleteproject.inc.php?varname=$pid' onClick=' return confirm(\"Are you sure you want to delete this project?\");' ><i class='bi bi-trash color'></i></a></td>";

    }
    ;
}
?>