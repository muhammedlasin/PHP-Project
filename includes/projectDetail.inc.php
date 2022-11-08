<?php

$pid= $_GET['pid'];

$projectObj = new ProjectsView();

$projectContrObj = new ProjectsContr();

$project_details = $projectObj -> showProjectDetails($pid);



foreach($project_details as $project_detail){


$userObj = new UsersView();

$team_leads = $userObj -> displayUsersByRole('team-lead');

    $user_role = 'admin';

    $pname = $project_detail['project_name'];

    $pdescription = $project_detail['project_description'];

    $plead = $project_detail['team_lead_id'];

    $userObj = new UsersView();

    $lead_name =  $userObj -> getUserNamebyId($plead);



    // Title edit


    echo "<form method='post' action=''>";
    if($user_role === 'admin'){
    
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
            echo "<input id='project-heading' value=$pname name='projectheading' readonly />
            <br>";
    }

    echo "</form>";

    if(isset($_POST["save-heading-btn"])){


        $updatedHeading = $_POST["projectheading"];

        $projectContrObj->updateHeading($updatedHeading, $pid);

        header("Location: projectDetail.php?pid=$pid");
    
    }



    //description edit


    echo "<form method='post' action=''>";
    if($user_role === 'admin'){
    
    echo "<textarea id='task-para' onclick='showButton()' name='projectpara'>$pdescription</textarea>

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

    if($user_role === 'admin'){
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
?>