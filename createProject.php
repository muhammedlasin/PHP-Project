<?php
include 'header.php'
?>

<form action="includes/createproject.inc.php" method="post">
<h2>Add Project Details</h2>
<label>Project Name</label>
<br>
<input type="text" name="name" placeholder="Enter project name"/>
<br>
<label>Client</label>
<br>
<input type="text" name="client" placeholder="Enter client name"/>
<br>
<label>Description</label>
<br>
<textarea type="text" name="description" placeholder="Enter project name"></textarea>
<br>
<label>Assignee</label>
<br>
<select name="id">

<?php 
include 'includes/users.inc.php';
?>

</select>
<br>
<br>

  <button type="submit" name="submit">Create</button>
</form>