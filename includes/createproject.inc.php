<?php
session_start();
$u_email = $_SESSION["email"];
$u_id = $_SESSION["users_id"];
$u_name = $_SESSION["users_name"];
$u_role = $_SESSION["users_role"];

if (isset($_POST['submit'])) {

    $project_name = $_POST["name"];

    $space_position = strpos($project_name, ' ');
    $first_letter = substr($project_name, 0, 1);
    $last_letter = substr($project_name, $space_position + 1, 1);

    if (strpos($project_name, ' ')) {

        $pcode_string = strtoupper($first_letter . $last_letter);
    } else {

        $pcode_string = strtoupper(substr($project_name, 0, 2));

    }


    $project_code = uniqid($pcode_string, false);

    $client_name = $_POST["client"];

    $description = $_POST["description"];

    $id = $_POST["id"];

    $created = $u_id;

    $updated = $u_id;



    include '../classes/Dbh.class.php';
    include '../classes/Projects.class.php';
    include '../classes/ProjectsContr.class.php';
    include '../classes/ProjectsView.class.php';


    $projectObj = new ProjectsContr();

    $projectObj->createProjects($project_name, $project_code, $description, $client_name, $id, $created, $updated);

    $projectId = new ProjectsView();

    $latestProjectId = $projectId->getLatestProjectId();

    foreach ($latestProjectId as $val) {

        $latestpid = $val['project_id'];
    }


    $project_code = $pcode_string . $latestpid;


    $projectObj->setProjectCode($project_code, $latestpid);


    header("location: ../project.php");

} else {
    echo "Error";
}