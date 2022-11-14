<?php
session_start();

$u_email = $_SESSION["email"];
$u_id = $_SESSION["users_id"];
$u_name = $_SESSION["users_name"];
$u_role = $_SESSION["users_role"];

$projectObj = new ProjectsView();
$taskObj = new TasksView();

//View of the Team Lead 

if ($u_role === "team-lead") {

    $project_ids = $taskObj->getAllLatestTasks();

    $unique_project_id = array_unique($project_ids, SORT_REGULAR);


    $array = array_column($unique_project_id, 'project_id');



    $array_size = sizeof($unique_project_id);

    //display projects according to latest task updates

    foreach ($unique_project_id as $val) {


        $project_id = $val['project_id'];


        $latestProjects = $projectObj->getLatestProjectsTaskOfLead($u_id, $project_id);

        foreach ($latestProjects as $project) {
            $project_name = $project['project_name'];
            $project_code = $project['project_code'];
            $project_client = $project['client_name'];
            $project_id = $project['project_id'];



            echo "<div class='home-card'><h4><a href='projectDetail.php?pid=$project_id'>$project_name</a></h4>
                <p>$project_code</p>
                <p>$project_client</p></div>";




        }
    }



    // display projects according to latest updates in project.

    if ($array_size < 7) {

        $limit = 7 - $array_size;

        $latestProject = $projectObj->getLatestProjectsOfLead($u_id, $limit);

        foreach ($latestProject as $project) {

            $project_name = $project['project_name'];
            $project_code = $project['project_code'];
            $project_client = $project['client_name'];
            $project_id = $project['project_id'];


            if (!in_array($project_id, $array)) {

                echo "<div class='home-card'><h4><a href='projectDetail.php?pid=$project_id'>$project_name</a></h4>
                <p>$project_code</p>
                <p>$project_client</p></div>";

            }



        }

    }



    //View of the Admin


} else if ($u_role === "admin") {

    $project_ids = $taskObj->getAllLatestTasks();

    $unique_project_id = array_unique($project_ids, SORT_REGULAR);

    $array = array_column($unique_project_id, 'project_id');

    $array_size = sizeof($unique_project_id);


    //display projects according to latest task updates


    foreach ($unique_project_id as $val) {

        $project_id = $val['project_id'];

        $latestProjects = $projectObj->getLatestProjectsOfAdmin($project_id);

        foreach ($latestProjects as $project) {
            $project_name = $project['project_name'];
            $project_code = $project['project_code'];
            $project_client = $project['client_name'];
            $project_id = $project['project_id'];
            echo "<div class='home-card'><h4><a href='projectDetail.php?pid=$project_id'>$project_name</a></h4>
                <p>$project_code</p>
                <p>$project_client</p></div>";
        }

    }

    // display projects according to latest updates in project.

    if ($array_size < 7) {

        $limit = 7 - $array_size;

        $latestProject = $projectObj->getAllLatestProjectsOfAdmin($limit);

        foreach ($latestProject as $project) {

            $project_name = $project['project_name'];
            $project_code = $project['project_code'];
            $project_client = $project['client_name'];
            $project_id = $project['project_id'];


            if (!in_array($project_id, $array)) {

                echo "<div class='home-card'><h4><a href='projectDetail.php?pid=$project_id'>$project_name</a></h4>
                <p>$project_code</p>
                <p>$project_client</p></div>";
            }

        }
    }




    // View of the developer


} else if ($u_role === "developer") {

    $latestTasks = $taskObj->getLatestTasksOfDev($u_id);


    foreach ($latestTasks as $task) {
        $task_name = $task['task_name'];
        $task_status = $task['task_status'];
        $task_priority = $task['task_priority'];
        $due_date = strrev($task['task_due_date']);
        $task_id = $task['task_id'];
        echo "<div class='home-card'><h4><a href='viewTask.php?taskid=$task_id'>$task_name</a></h4>
                                <p>$task_status</p>
                                <p>$task_priority</p>
                                <p>$due_date</p></div>";
    }


}