<?php
include '../config.php';
session_start();
error_reporting(0);

if ($_SESSION['role'] == 'Admin') {
}else{
  header("Location: ../index.php");
}
if ($_SESSION['loggedin'] == '1') {
  echo '<script type="text/javascript">setTimeout(function () {
    swal("Welcome Super Admin","","success");}, 200);</script>';
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
  <script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
  </script>
</body>
</html>
