<?php

include './header.php';


$projectId = $_GET['projid'];

?>

<h1>Create task</h1>

<form action='./includes/create-tasks.inc.php' class="create-task-class" method="POST" enctype="multipart/form-data">
    <label>Enter task name:</label>
    <input type="text" name="task-name" placeholder="">
    <label>Enter task description:</label>
    <textarea name="task-description" cols="30" rows="10"></textarea>
    <label>Upload attachments:</label>
    <input type="file" name="file[]" multiple="multiple">
    <label>Task priority:</label>
    <select name="task-priority">
        <option value="Low">Low</option>
        <option value="Medium">Medium</option>
        <option value="High">High</option>
    </select>
    <label>Task developer:</label>
    <?php 
        include_once './includes/selectDevsForTask.inc.php';
    ?>
    <label>Task due date:</label>
    <input type="date" value="2022-11-02" min="2022-11-02" max="2050-11-02" name="task-due-date">
    <button type="submit" name="create-task-submit" class="task-button">Submit</button>
    <input type="hidden" name="projid" value="<?=$projectId?>"/>
</form>

</body>

</html>