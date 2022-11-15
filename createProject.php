<?php
include 'header.php';

?>
<div class="background">
  <form class="create-project" action="includes/createproject.inc.php" method="post">
    <h2>Add Project Details</h2>
    <div class="form">
      <label>Project Name</label>
      <br>
      <input type="text" name="name" placeholder="Enter project name" />
      <br><br>
      <label>Client</label>
      <br>
      <input type="text" name="client" placeholder="Enter client name" />
      <br><br>
      <label>Description</label>
      <br>
      <textarea type="text" name="description" placeholder="Enter project details"></textarea>
      <br><br>
      <label>Team Lead</label>
      <br>
      <select name="id">

        <?php
        include 'includes/users.inc.php';
        ?>

      </select>
      <br>
      <br>
      <button class="btn" type="submit" name="submit" data-inline="true">Create</button>
      <a style="text-decoration:none" class="create-cancel-btn" href="project.php">Cancel</a>
  </form>
</div>






<?php
if (isset($_GET['error'])) {
  $error = $_GET['error'];
  if ($error === "emptyinput") {
    echo "<p class='error'>Please fill all the fields.</p>";
  }
  if ($error === "projectNameTaken") {
    echo "<p class='error'>Please choose another project name.</p>";
  }
}
?>

</div>