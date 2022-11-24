<?php
include '../config.php';
session_start();
error_reporting(0);

if (!($_SESSION['role'] == 'Cashier')) {
  header("Location: ../index.php");
}

if ($_SESSION['loggedin'] == '1') {
  echo '<script type="text/javascript">setTimeout(function () {
    swal("Welcome Cashier","","success");}, 200);</script>';
  unset($_SESSION["loggedin"]);
}

$id = $_SESSION['theid'];
$username = $_SESSION['username'];
  $sql = "SELECT * FROM users";
  $result = mysqli_query($conn, $sql);
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
        <a href="upload.php" class="btn btn-sq-lg btn-light mx-3 shadow mb-5" id="btn-sq-lg">
          <i class="fa-solid fa-upload fa-6x"></i><br/>
          <b><h5>Upload</h5></b>
        </a>
      </div>
    </div>
  </div>
    <div class="row">
      <div class="d-flex align-items-end flex-column">
        <a href="logout.php" class="btn btn-primary btn-lg shadow mb-5"><i class="fa-solid fa-right-from-bracket"></i><b>Logout</b></a>
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
