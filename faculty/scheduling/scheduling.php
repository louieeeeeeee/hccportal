<?php
include '../../config.php';
session_start();
error_reporting(0);

if (!($_SESSION['role'] == 'Faculty' || $_SESSION['role'] == 'Scheduler')) {
  header("Location: ../../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="refresh" content="5000;url=../logout.php" />
<body>
<?php
    include("../header.php");
?>

<?php 
$query=mysqli_query($conn,"select * from faculty where facultyid = '".$_SESSION['theid']."'")or die(mysqli_error());
$row=mysqli_fetch_array($query);		




$member=$_SESSION['theid'];
$sid=$_SESSION['settings'];

$settings=mysqli_query($conn,"select * from settings where settings_id='$sid'")or die(mysqli_error($con));
	$rows=mysqli_fetch_array($settings);

	include('report_header.php');
	include('report_body.php');
	#include('../dist/includes/report_footer.php');
?> 

<?php
    include '../footer.php'
?>
</body>
</html>
<script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>