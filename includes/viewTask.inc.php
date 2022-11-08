<?php

// $taskObj = new TasksView();
// $task_details = $taskObj -> viewTaskDetail($taskId);


// foreach($task_details as $task_detail){

//     $tname = $task_detail['task_name'];
//     $tdescription = $task_detail['task_description'];
//     $tstatus = $task_detail['task_status'];
//     $tdev = $task_detail['developer_id'];
//     $tpriority = $task_detail['task_priority'];
//     $tdate = $task_detail['task_due_date'];
//     $task_id = $taskId;

//     //select user role
//     $user_role = "developer";

//     $userObj = new UsersView();
//     $developers = $userObj -> displayUsersByRole('developer');
//     $dev_name =  $userObj -> getUserNamebyId($tdev);

//     //priority selection

//     $priorities = array("High", "Low", "Medium");
//     $priority_pos = array_search($tpriority, $priorities);

//     $taskContrObj = new TasksContr();

    
// echo "<form class='priority' method='post' action=''>";
//     if($user_role !== 'developer'){
//         echo "<select name='priority' onchange='this.form.submit()' >";
//     }
//     else{

//        echo "<select name='priority' disabled>";
//     }

//        echo "<option value='$priorities[$priority_pos]'>$priorities[$priority_pos]</option>";

//     for($i=0 ; $i<=2; $i++){
//         if($i !== $priority_pos){
//             echo"<option value='$priorities[$i]'>$priorities[$i]</option>";
//         }    
//     }
// echo "</select>
//         </form>";

//     if(isset($_POST["priority"])){

//             $priority=$_POST["priority"];
//             $taskContrObj->updatePriority($priority, $task_id);
//             header('Location: viewTask.php');
        
//         }


//     //status selection 

//     if($user_role !== "developer"){

//     $statuses = array("Open", "In Progress", "Review", "Closed");
//     }

//     else{
//     $statuses = array("Open", "In Progress", "Review");
//     }
//     $status_pos = array_search($tstatus, $statuses);
    
//     echo "<form method='post' action=''>
//         <select name='status' onchange='this.form.submit()'>
//         <option value='$statuses[$status_pos]'>$statuses[$status_pos]</option>";

//     for($j=0 ; $j<=sizeof($statuses)-1; $j++){
//         if($j !== $status_pos){
//             echo"<option value='$statuses[$j]'>$statuses[$j]</option>";
//         }    
//     }
//     echo "</select>
//             </form>";



// if(isset($_POST["status"])){

//     $status=$_POST["status"];
//     $taskContrObj->updateStatus($status, $task_id);
//     header('Location: viewTask.php');

// }


// // task name edit


    
    
//     echo "<form method='post' action=''>";
//     if($user_role !== 'developer'){
    
//     echo "<input id='project-heading' onclick='showHeadingButton()' name='projectheading' class='inherit' value='$tname'>

//         <script>
//         function showHeadingButton(){
//             hideButton()
//             document.getElementById('save-heading-btn').style.display = 'inline-block';
//             document.getElementById('cancel-heading-btn').style.display = 'inline-block';
        
//             console.log('clicked');
//         }

//         function hideHeadingButton(){
//             document.getElementById('save-heading-btn').style.display = 'none';
//             document.getElementById('cancel-heading-btn').style.display = 'none';
//         }
//         </script>
//     <br>
//     <button id='save-heading-btn' onchange='this.form.submit()' name='save-heading-btn'>Save</button>
//     <button id='cancel-heading-btn' onclick='hideHeadingButton()'>Cancel</button>
//     <br>
//     <br>"
//     ;
//     }
//     else{
//             echo "<input id='project-heading' value='$tname' name='projectheading' class='inherit' readonly />
//             <br>";
//     }

//     echo "</form>";

//     if(isset($_POST["save-heading-btn"])){


//         $updatedHeading = $_POST["projectheading"];

//         $taskContrObj->updateHeading($updatedHeading, $task_id);

//         header("Location: viewTask.php");
    
//     }

// // task description edit


//        echo "<form method='post' action=''>";
//         if($user_role !== 'developer'){
        
//         echo "<textarea id='task-para' onclick='showButton()' name='taskpara'>$tdescription</textarea>

//             <script>
//             function showButton(){
//                 hideHeadingButton()
//                 document.getElementById('save-btn').style.display = 'inline-block';
//                 document.getElementById('cancel-btn').style.display = 'inline-block';
            
//                 console.log('clicked');
//             }

//             function hideButton(){
//                 document.getElementById('save-btn').style.display = 'none';
//                 document.getElementById('cancel-btn').style.display = 'none';
//             }
//             </script>
//         <br>
//         <button id='save-btn' onchange='this.form.submit()' name='save-btn'>Save</button>
//         <button id='cancel-btn' onclick='hideButton()'>Cancel</button>"
//         ;
//         }
//         else{
//                 echo "<textarea id='task-para' name='taskpara' readonly>$tdescription</textarea>
//                 <br>";
//         }
    
//         if(isset($_POST["save-btn"])){


//             $updatedDescription = $_POST["taskpara"];
    
//             $taskContrObj->updateDescription($updatedDescription, $task_id);
    
//             header('Location: viewTask.php');
        
//         }

//         // Developer selection

//         echo "</form>
//         <label><strong>Assignee</strong>:</label>
//         <form action='' method='post'>";

//         if($user_role !== 'developer'){
//             echo "<select name ='Assignee' onchange='this.form.submit()'>";
//         }
//         else{
//             echo "<select name ='Assignee' disabled='disabled'>";
//         }
      
//         echo "<option>$dev_name</option>";

//     foreach($developers as $val){

//         $developer_name = $val['users_name'];
//         $developer_id = $val['users_id'];

//         if($developer_name !== $dev_name){
//         echo "<option value='$developer_id'>$developer_name</option>";
//         }

//     }

//     echo "</select></form>";


//     if(isset($_POST["Assignee"])){


//         $developer_id = $_POST["Assignee"];
        
//         $taskContrObj->updateDeveloper($developer_id, $task_id);

//         header('Location: viewTask.php');
    
//     }
    

//     //date
        
//         echo "
//         <label>Due Date: </label>
//         <form action='' method='post'>";

//         if($user_role !== 'developer'){
        
//         echo "<input type='date'name='date' onchange='this.form.submit()' value='$tdate'></input>";
        
//         }

//         else {
//             echo "<p>$tdate</p>";
//         }

//         echo "</form>";
    


//         if(isset($_POST["date"])){


//             $due_date = $_POST["date"];
            
//             $taskContrObj->updateDate($due_date, $task_id);
    
//             header('Location: viewTask.php');
        
//         }

  

// }

// 



$taskObj = new TasksView();
$task_details = $taskObj->viewTaskDetail($taskId);

foreach ($task_details as $task_detail) {

    $tname = $task_detail['task_name'];
    $tdescription = $task_detail['task_description'];
    $tstatus = $task_detail['task_status'];
    $tdev = $task_detail['developer_id'];
    $tpriority = $task_detail['task_priority'];
    $tdate = $task_detail['task_due_date'];
    $task_id = 8;

    //select user role
    $user_role = "admin";

    $userObj = new UsersView();
    $developers = $userObj->displayUsersByRole('developer');
    $dev_name = $userObj->getUserNamebyId($tdev);

    //priority selection

    $priorities = array("High", "Low", "Medium");
    $priority_pos = array_search($tpriority, $priorities);

    $taskContrObj = new TasksContr();


    echo "<form class='priority' method='post' action=''>
    <label><strong>Priority</strong></label>";
    if ($user_role !== 'developer') {
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
        header('Location: viewTask.php');

    }


    //status selection 

    if ($user_role !== "developer") {

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
        header('Location: viewTask.php');

    }


    // task name edit




    echo "<form method='post' class='task-heading' action=''>";
    if ($user_role !== 'developer') {

        echo "<input id='project-heading' onclick='showHeadingButton()' name='projectheading' class='inherit' value='$tname'>

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
    } else {
        echo "<input id='project-heading' value='$tname' name='projectheading' class='inherit' readonly />
            <br>";
    }

    echo "</form>";

    if (isset($_POST["save-heading-btn"])) {


        $updatedHeading = $_POST["projectheading"];

        $taskContrObj->updateHeading($updatedHeading, $task_id);

        header("Location: viewTask.php");

    }

    // task description edit


    echo "<form method='post' action=''>";
    if ($user_role !== 'developer') {

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

            function showButton(){
                hideHeadingButton()
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
        <button id='cancel-btn' onclick='hideButton()'>Cancel</button>"
            ;
    } else {
        echo "<textarea id='task-para' name='taskpara' readonly>$tdescription</textarea>
                <br>";
    }

    if (isset($_POST["save-btn"])) {


        $updatedDescription = $_POST["taskpara"];

        $taskContrObj->updateDescription($updatedDescription, $task_id);

        header('Location: viewTask.php');

    }

    // Developer selection

    echo "</form>
        <label><strong>Assignee</strong>:</label>
        <form class='developer-choose' action='' method='post'>";

    if ($user_role !== 'developer') {
        echo "<select name ='Assignee' onchange='this.form.submit()'>";
    } else {
        echo "<select name ='Assignee' disabled='disabled'>";
    }

    echo "<option>$dev_name</option>";

    foreach ($developers as $val) {

        $developer_name = $val['users_name'];
        $developer_id = $val['users_id'];

        if ($developer_name !== $dev_name) {
            echo "<option value='$developer_id'>$developer_name</option>";
        }

    }

    echo "</select></form>";


    if (isset($_POST["Assignee"])) {


        $developer_id = $_POST["Assignee"];

        $taskContrObj->updateDeveloper($developer_id, $task_id);

        header('Location: viewTask.php');

    }


    //date

    echo "
    <br>
        <label><strong>Due Date: </strong></label>
        <form class='task-date' action='' method='post'>";

    if ($user_role !== 'developer') {

        echo "<input type='date'name='date' onchange='this.form.submit()' value='$tdate'></input>";

    } else {
        echo "<p>$tdate</p>";
    }

    echo "</form>";



    if (isset($_POST["date"])) {


        $due_date = $_POST["date"];

        $taskContrObj->updateDate($due_date, $task_id);

        header('Location: viewTask.php');

    }



}


