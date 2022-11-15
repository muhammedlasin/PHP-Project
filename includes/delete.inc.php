<?php

session_start();

$u_email = $_SESSION["email"];
$u_id = $_SESSION["users_id"];
$u_name = $_SESSION["users_name"];
$u_role = $_SESSION["users_role"];

include_once '../classes/Dbh.class.php';
include_once '../classes/Users.class.php';
include_once '../classes/UsersContr.class.php';
include_once '../classes/Projects.class.php';
include_once '../classes/ProjectsView.class.php';
include_once '../classes/UsersView.class.php';
include_once '../classes/Tasks.class.php';
include_once '../classes/TasksView.class.php';


$id = $_GET['id'];


$projectObj = new ProjectsView();

$userViewObj = new UsersView();

$taskObj = new TasksView();

$user_role = $userViewObj->displayUsersRoleById($id);

foreach ($user_role as $val) {
    $role = $val['users_role'];
}


echo $role;


if ($role === 'team-lead') {


    $array = $projectObj->showProjects($id);

    $t = 1;

    $length = sizeof($array);



    if ($length !== 0) {
        echo "<script>alert('Please assign new team leads to the projects the user is part of.')</script>";
        $t = 0;

    } else {


        $userObj = new UsersContr();
        $userObj->deleteUsers($id);

    }

    if ($t === 0) {

        header("refresh:1;url=../Users.php");
    }

} else if ($role === 'developer') {


    $array = $taskObj->getTasksofDev($id);



    $length = sizeof($array);


    if ($length !== 0) {
        echo "<script>alert('Please assign new developer to the tasks that the user is part of.')</script>";
    } else {


        $userObj = new UsersContr();
        $userObj->deleteUsers($id);

    }

    header("refresh:1;url=../Users.php");

}