<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;?>
<?php error_reporting(0);?>
<!DOCTYPE hmtl>
<html>
<head>
<link rel="stylesheet" href="../dist/css/print.css" media="print">
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Bootstrap 3 CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Bootstrap 3 JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<?php 
include('../dist/includes/dbcon.php');
 ?>
 <script type="text/javascript" charset="utf-8">
	jQuery(document).ready(function() {
		window.print();
	});
</script>
 
 <div class="wrapper_print">
 <?php 
 

$member=$_REQUEST['id'];
$sid=$_SESSION['settings'];

$search=mysqli_query($con,"select * from faculty where facultyid='$member'")or die(mysqli_error($con));
	$row=mysqli_fetch_array($search);

$settings=mysqli_query($con,"select * from settings where settings_id='$sid'")or die(mysqli_error($con));
	$rows=mysqli_fetch_array($settings);

	include('../dist/includes/report_header.php');
	include('../dist/includes/report_body.php');
	if ($_SESSION['type']=='admin')
	include('../dist/includes/report_footer.php');
	
?> 

 
  </body>
    <script src="jquery.js"></script>

  </html>
