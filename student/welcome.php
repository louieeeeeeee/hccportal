<?php
include '../config.php';
session_start();
error_reporting(0);

if ($_SESSION['role'] == 'Student') {
}else{
  header("Location: ../index.php");
}
if ($_SESSION['loggedin'] == '1') {
  echo '<script type="text/javascript">setTimeout(function () {
    swal("Welcome Student","","success");}, 200);</script>';
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
  <div class="h-100 d-flex align-items-center justify-content-center">
    <div class="row" >
      <div class="col">
        <a href="studentprofile.php" class="btn btn-sq-lg btn-light mx-3 shadow mb-5" id="btn-sq-lg">
          <i class="fa-solid fa-user fa-6x"></i><br/>
          <b><h3>Student Profile</h5></b><br>
        </a>
        <a href="grades.php" class="btn btn-sq-lg btn-light mx-3 shadow mb-5" id="btn-sq-lg">
          <i class="fa-solid fa-chart-simple fa-6x"></i><br/>
          <b><h3>Grades</h5></b>
        </a>
        <a href="billing.php" class="btn btn-sq-lg btn-light mx-3 shadow mb-5" id="btn-sq-lg">
          <i class="fa-solid fa-file-invoice fa-6x"></i><br/>
          <b><h3>Billing</h5></b>
        </a>
      </div>
    </div>
  </div>
  <div class="d-flex align-items-end flex-column">
  <div class="row">
    <a href="logout.php" class="btn btn-primary btn-lg shadow mb-5">
      <i class="fa-solid fa-right-from-bracket"></i>
      <b>Logout</b>
    </a>
</div>
</div>
</div>
</body>
</html>
