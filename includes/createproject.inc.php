<?php


if(isset($_POST['submit'])){

    $project_name = $_POST["name"];

    $pn = strtoupper(substr($project_name, 0, 2));

    $project_code = uniqid($pn, false);

    $client_name = $_POST["client"];

    $description = $_POST["description"];

    $id = $_POST["id"];

    $created = 1;

    $updated = 1;

    include '../classes/Dbh.class.php';
    include '../classes/Projects.class.php';
    include '../classes/ProjectsContr.class.php';
    include '../classes/ProjectsView.class.php';
    
    $projectObj = new ProjectsContr();

    $projectObj->createProjects($project_name, $project_code, $description, $client_name, $id, $created, $updated);

    $projectId = new ProjectsView();

    $latestProjectId = $projectId->getLatestProjectId();

    foreach($latestProjectId as $val){
        
        $latestpid =  $val['project_id'];
    }

    
    $project_code = $pn.$latestpid;


    $projectObj->setProjectCode($project_code, $latestpid);


    header("location: ../project.php");

}

else{
   echo "Error";
}