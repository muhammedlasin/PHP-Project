<?php

include './header.php';

?>

<h1>Create task</h1>

<form action="./includes/create-tasks.inc.php" class="create-task-class" method="POST">
    <input type="text" name="task-name" placeholder="Task name">
    <textarea name="task-description" cols="30" rows="10"></textarea>
    <input type="file" name="task-attachments" placeholder="Attach files">
    <label>Task priority:</label>
    <select name="task-priority">
        <option value="Low">Low</option>
        <option value="Medium">Medium</option>
        <option value="High">High</option>
    </select>
    <label>Task devs:</label>
    <?php 
        include_once './includes/selectDevsForTask.inc.php';
    ?>
    <input type="date" value="2022-11-02" min="2022-11-02" max="2050-11-02" name="task-due-date">
    <button type="submit" name="create-task-submit">Submit</button>
</form>

</body>

</html>