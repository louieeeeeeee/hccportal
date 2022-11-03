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
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>
