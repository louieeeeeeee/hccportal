<?php
include '../config.php';
session_start();
error_reporting(0);

if (!($_SESSION['role'] == 'Faculty')) {
  header("Location: ../index.php");
}

if ($_SESSION['loggedin'] == '1') {
  echo '<script type="text/javascript">setTimeout(function () {
    swal("Welcome Admin","","success");}, 200);</script>';
    unset($_SESSION["loggedin"]);
  }
  $facultyID = $_SESSION['theid'];
  $sql = "SELECT * FROM subjects WHERE facultyid = '$facultyID'";
  $result = mysqli_query($conn, $sql);
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <body>

  <?php
  include("header.php");
  ?>
  <div class="wrapper">
    <ul class="fullclick">
      <?php
      if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_array($result)) {
          echo "<li>";
          echo "<h2>".$row['subject']."</h2>";
          echo "<a href='studentsview.php' class='main'></a>";
          echo "</li>";
        }
      }
      ?>
    </ul>
  </div>
  <script>
  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
  }
</script>
</body>
</html>
