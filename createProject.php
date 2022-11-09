<?php
include 'header.php';

?>

<form class="create-project" action="includes/createproject.inc.php" method="post">
  <h2>Add Project Details</h2>
  <div>
    <label>Project Name</label>
    <br>
    <input type="text" name="name" placeholder="Enter project name" />
    <br>
    <label>Client</label>
    <br>
    <input type="text" name="client" placeholder="Enter client name" />
    <br>
    <label>Description</label>
    <br>
    <textarea type="text" name="description" placeholder="Enter project details"></textarea>
    <br>
    <label>Team Lead</label>
    <br>
    <select name="id">

      <?php
      include 'includes/users.inc.php';
      ?>

    </select>
    <br>
    <br>

    <button type="submit" name="submit">Create</button>
  </div>
</form>

<?php
if (isset($_GET['error'])) {
  $error = $_GET['error'];
  if ($error === "emptyinput") {
    echo "<p class='error'>Please fill all the fields</p>";
  }
}
?>