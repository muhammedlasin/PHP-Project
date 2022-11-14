<?php


session_start();

$u_email = $_SESSION["email"];
$u_id = $_SESSION["users_id"];
$u_name = $_SESSION["users_name"];
$u_role = $_SESSION["users_role"];


$taskObj = new TasksView();
$task_details = $taskObj->viewTaskDetail($taskId);
foreach ($task_details as $task_detail) {

    $tname = $task_detail['task_name'];
    $tdescription = $task_detail['task_description'];
    $tstatus = $task_detail['task_status'];
    $tdev = $task_detail['developer_id'];
    $tpriority = $task_detail['task_priority'];
    $tdate = $task_detail['task_due_date'];
    $project_id = $task_detail['project_id'];
    $task_id = $task_detail['task_id'];

    $project_id = $task_detail['project_id'];


    // initialized new email object
    $emailObj = new Email();
    //initialized project controller object
    $projectViewObj = new ProjectsView();
    $project_details = $projectViewObj->showProjectDetails($project_id);
    $team_lead_id = '';
    foreach ($project_details as $project) {
        $team_lead_id = $project['team_lead_id'];
    }

    // initialized new email object
    $emailObj = new Email();
    //initialized project controller object
    $projectViewObj = new ProjectsView();
    $project_details = $projectViewObj->showProjectDetails($project_id);
    $team_lead_id = '';
    foreach ($project_details as $project) {
        $team_lead_id = $project['team_lead_id'];
    }


    $userObj = new UsersView();
    $developers = $userObj->displayUsersByRole('developer');
    $dev_name = $userObj->getUserNamebyId($tdev);
    $devEmail = $userObj->getEmailFromUsersId($tdev);
    $leadEmail = $userObj->getEmailFromUsersId($team_lead_id);

    //priority selection

    $priorities = array("High", "Low", "Medium");
    $priority_pos = array_search($tpriority, $priorities);

    $taskContrObj = new TasksContr();


    echo "<form class='priority' method='post' action=''>
    <label><strong>Priority</strong></label>";
    if ($u_role !== 'developer') {
        echo "<select name='priority' onchange='this.form.submit()' >";
    } else {

        echo "<select name='priority' disabled>";
    }

    echo "<option value='$priorities[$priority_pos]'>$priorities[$priority_pos]</option>";

    for ($i = 0; $i <= 2; $i++) {
        if ($i !== $priority_pos) {
            echo "<option value='$priorities[$i]'>$priorities[$i]</option>";
        }
    }
    echo "</select>
        </form>";

    if (isset($_POST["priority"])) {

        $priority = $_POST["priority"];
        $taskContrObj->updatePriority($priority, $task_id);
        header("Location: viewTask.php?taskid=$task_id&projid=$project_id");

        $message = "The priority of the Task : $tname has been changed to $priority";

        $emailObj->sendEmailToUser($devEmail, $message);
        $emailObj->sendEmailToUser($leadEmail, $message);

    }


    //status selection 

    if ($u_role !== "developer") {

        $statuses = array("Open", "In Progress", "Review", "Closed");
    } else {
        $statuses = array("Open", "In Progress", "Review");
    }
    $status_pos = array_search($tstatus, $statuses);

    echo "<form class='status' method='post' action=''>
        <label><strong>Status</strong></label>
        <select name='status' onchange='this.form.submit()'>
        <option value='$statuses[$status_pos]'>$statuses[$status_pos]</option>";

    for ($j = 0; $j <= sizeof($statuses) - 1; $j++) {
        if ($j !== $status_pos) {
            echo "<option value='$statuses[$j]'>$statuses[$j]</option>";
        }
    }
    echo "</select>
            </form>";



    if (isset($_POST["status"])) {

        $status = $_POST["status"];
        $taskContrObj->updateStatus($status, $task_id);

        $message = "The status of the Task:\"$tname\" has been changed to $status";

        $emailObj->sendEmailToUser($devEmail, $message);
        $emailObj->sendEmailToUser($leadEmail, $message);

        header("Location: viewTask.php?taskid=$task_id&projid=$project_id");




    }




    // task name edit




    echo "<form method='post' class='task-heading' action=''>";
    if ($u_role !== 'developer') {

        echo "<input id='project-heading' onclick='showHeadingButton()' name='projectheading' class='inherit' value='$tname'>

        <script>
            function showHeadingButton() {
                hideButton()
                document.getElementById('save-heading-btn').style.display = 'inline-block';
                document.getElementById('cancel-heading-btn').style.display = 'inline-block';

                console.log('clicked');
            }

            function hideHeadingButton() {
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
    } else {
        echo "<input id='project-heading' value='$tname' name='projectheading' class='inherit' readonly />
            <br>";
    }

    echo "</form>";

    if (isset($_POST["save-heading-btn"])) {


        $updatedHeading = $_POST["projectheading"];

        $taskContrObj->updateHeading($updatedHeading, $task_id);

        header("Location: viewTask.php?taskid=$task_id&projid=$project_id");

        $message = "The name of Task has been changed to $updatedHeading";

        $emailObj->sendEmailToUser($devEmail, $message);
        $emailObj->sendEmailToUser($leadEmail, $message);

    }

    // task description edit


    if (isset($_POST["save-btn"])) {


        $updatedDescription = $_POST["taskpara"];

        $taskContrObj->updateDescription($updatedDescription, $task_id);

        header("Location: viewTask.php?taskid=$task_id&projid=$project_id");

        $message = "The Description of the task $tname has bee updated to $updatedDescription";

        $emailObj->sendEmailToUser($devEmail, $message);
        $emailObj->sendEmailToUser($leadEmail, $message);


    }


    echo "<form method='post' action=''>";
    if ($u_role !== 'developer') {

        echo "<textarea id='task-para' onclick='showButton()' name='taskpara'>$tdescription</textarea>

            <script>
                var input = document.getElementById('task-para'); // get the input element
                input.addEventListener('input', resizeInput);
                resizeInput.call(input); // immediately call the function

                function resizeInput() {
                    this.style.width = '80%';
                    this.style.height = 'auto';
                    this.style.height = this.scrollHeight + 'px';
                }

                function showButton() {
                    hideHeadingButton()
                    document.getElementById('save-btn').style.display = 'inline-block';
                    document.getElementById('cancel-btn').style.display = 'inline-block';

                    console.log('clicked');
                }

                function hideButton() {
                    document.getElementById('save-btn').style.display = 'none';
                    document.getElementById('cancel-btn').style.display = 'none';
                }
            </script>
        <br>
        <button id='save-btn' onchange='this.form.submit()' name='save-btn'>Save</button>
        <button id='cancel-btn' onclick='hideButton()'>Cancel</button>"
            ;
    } else {
        echo "<textarea id='task-para' name='taskpara' readonly>$tdescription</textarea>
                <br>";
    }
    echo "</form>";


    // Developer selection


    echo "
        <label><strong>Assignee</strong>:</label>
        <form class='developer-choose' action='includes/changedeveloper.inc.php?taskid=$task_id&devid=$tdev&taskname=$tname&tlead=$team_lead_id&pid=$project_id' method='post'>";

    if ($u_role !== 'developer') {
        echo "<select name ='assignee' onchange='this.form.submit()'>";
    } else {
        echo "<select disabled='disabled'>";
    }

    echo "<option>$dev_name</option>";

    foreach ($developers as $val) {


        $developer_id = $val['users_id'];
        $developer_name = $val['users_name'];

        if ($developer_name !== $dev_name) {
            echo "<option value='$developer_id'>$developer_name</option>";
        }

    }

    echo "</select>
            </form>";


    //date

    echo "<br>
          <label><strong>Due Date: </strong></label>";

    echo "<form class='task-date' action='includes/changedate.inc.php?taskid=$task_id&devid=$tdev&tlead=$team_lead_id&pid=$project_id&taskname=$tname' method='post'>";

    if ($u_role !== 'developer') {

        $todaysDate = date('Y-m-d');
        echo "<input type='date' name='dueDate' min='$todaysDate' onchange='this.form.submit()' value='$tdate'></input>";

    } else {
        echo "<p>$tdate</p>";
    }

    echo "</form>";


}