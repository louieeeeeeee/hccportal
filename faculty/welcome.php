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
?>
<!DOCTYPE html>
<html lang="en">
<body>
  <?php
  include("header.php");
  ?>
  <div class="container">

    <!--<div class="row">
    <div class="scroll-left">
    <p>Scroll left... </p>
  </div>
</div>-->
<div class="h-100 d-flex align-items-center justify-content-center">
  <div class="row" >
    <div class="col">
      <a href="studentsview.php" class="btn btn-sq-lg btn-light mx-3 shadow mb-5" id="btn-sq-lg">
        <i class="fa-solid fa-user fa-6x"></i><br/>
        <b><h5>Students View</h5></b><br>
      </a>
      <a href="adminprofile.php" class="btn btn-sq-lg btn-light mx-3 shadow mb-5" id="btn-sq-lg">
        <i class="fa-solid fa-chart-simple fa-6x"></i><br/>
        <b><h5>Faculty Info</h5></b>
      </a>
      <a href="studentgrades.php" class="btn btn-sq-lg btn-light mx-3 shadow mb-5" id="btn-sq-lg">
        <i class="fa-solid fa-file-invoice fa-6x"></i><br/>
        <b><h5>Grades</h5></b>
      </a>
      <a href="subjects.php" class="btn btn-sq-lg btn-light mx-3 shadow mb-5" id="btn-sq-lg">
        <i class="fa-solid fa-file-invoice fa-6x"></i><br/>
        <b><h5>Subjects</h5></b>
      </a>
    </div>
  </div>
</div>
<div class="row">
<div class="d-flex align-items-end flex-column">
  <a href="logout.php" class="btn btn-light btn-lg shadow mb-5">
    <i class="fa-solid fa-right-from-bracket"></i>
    <b>Logout</b>
  </a>
</div>
</div>
</div>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>
