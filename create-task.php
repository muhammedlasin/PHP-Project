<?php

include './header.php';


$projectId = $_GET['projid'];

?>



<form action='./includes/create-tasks.inc.php' class="create-task-class" method="POST" enctype="multipart/form-data">
    <h1>Create task</h1>    
    <label>Task name:</label>
    <input type="text" name="task-name" placeholder="Enter task name">
    <label>Task description:</label>
    <textarea name="task-description" cols="30" rows="10" placeholder="Enter task details"></textarea>
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
    <input type="date" value="<?= date('Y-m-d'); ?>" min="<?= date('Y-m-d'); ?>" name="task-due-date">
    <?php
    if ($_GET['error'] === 'emptyinput') {
        echo "<p style=color:red>Task name and task description cannot be empty</p>";
    }
    ?>
    <div>
        <button type="submit" name="create-task-submit" class="task-button">Submit</button>
        <?php
        echo "<button class=cancel-button><a href='projectDetail.php?pid=$projectId'>Cancel</a></button>";
        ?>
    </div>
    <input type="hidden" name="projid" value="<?= $projectId ?>" />
</form>
</body>

</html>