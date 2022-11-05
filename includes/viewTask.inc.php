<?php



$taskObj = new TasksView();

$task_details = $taskObj -> viewTaskDetail(6);



foreach($task_details as $task_detail){
    

    $tname = $task_detail['task_name'];

    $tdescription = $task_detail['task_description'];

    $tstatus = $task_detail['task_status'];

    $tdev = $task_detail['developer_id'];

    $tpriority = $task_detail['task_priority'];

    $tdate = $task_detail['task_due_date'];

    $userObj = new UsersView();

    $dev_name =  $userObj -> getUserNamebyId($tdev);


    echo "<h1>$tname</h1>
        <p>$tdescription</p>

        

        <select>
        <option>$tstatus</option>
        <option>In Progress</option>
        <option>Review</option>
        <option>Done</option>
        </select>

        <select>
        <option>$tpriority</option>
        <option>Low</option>
        <option>Medium</option>
        </select>

        <label><strong>Assignee</strong>:</label>
        <span>$dev_name</span>
        <p>$tdate</p>
";
}


?>