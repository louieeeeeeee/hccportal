<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;?>
<?php error_reporting(0);?>
<!DOCTYPE hmtl>
<html>
<head>
<link rel="stylesheet" href="../dist/css/print.css" media="print">
<script src="../dist/js/jquery.min.js"></script>

</head>
<style>
	@media print {
  table {
    border-collapse: collapse;
  }
  td, th {
    border: 1px solid black;
    padding: 5px;
    background-color: inherit !important;
  }
}
	</style>

<body>
<?php 
include('../dist/includes/dbcon.php');
 ?>
  <script type="text/javascript" charset="utf-8">
			jQuery(document).ready(function() {
			
		
			
			});

      $(function() {
$(".delete").on('click',function(){
  console.log('ssacs')
var element = $(this);
var del_id = element.attr("id");
var info = 'id=' + del_id;
if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({
   type: "POST",
   url: "class_sched_del.php",
   data: info,
   success: function(){
 }
});
  $(this).parents(".show").animate({ backgroundColor: "#003" }, "slow")
  .animate({ opacity: "hide" }, "slow");
 }
return false;
});
}); 
			</script>
 <script type="text/javascript" charset="utf-8">
			jQuery(document).ready(function() {
			
		window.print()
			
			)};
			</script>
 
 <div class="wrapper_print">
 <?php 
 if (isset($_POST['search']))

$class=$_POST['class'];
$sid=$_SESSION['settings'];

$settings=mysqli_query($con,"select * from settings where settings_id='$sid'")or die(mysqli_error($con));
	$rows=mysqli_fetch_array($settings);

	include('../dist/includes/report_header.php');
	include('../dist/includes/report_body.php');
	include('../dist/includes/report_footer.php');
?> 

 
  </body>
  </html>
  <button onclick="printSchedule()">Print Schedule</button>
	
	<script>
	function printSchedule() {
	  var monWedTable = document.getElementById("monWedTable").outerHTML;
	  var thuSatTable = document.getElementById("thuSatTable").outerHTML;

	  var newWin = window.open('', 'Print-Window');
	  newWin.document.open();
	  newWin.document.write('<html><head><style>table, td, th {border: 1px solid black; border-collapse: collapse;} td, th {padding: 5px;}</style></head><body>');
	  newWin.document.write('<h2>Monday to Wednesday Schedule</h2>');
	  newWin.document.write(monWedTable);
	  newWin.document.write('<br>');
	  newWin.document.write('<h2>Thursday to Saturday Schedule</h2>');
	  newWin.document.write(thuSatTable);
	  newWin.document.write('</body></html>');
	  newWin.document.close();

	  setTimeout(function() {
	    newWin.print();
	    newWin.close();
	  }, 100);
	}
	</script>
