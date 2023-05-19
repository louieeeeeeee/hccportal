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
	echo '<br><button onclick="printSchedule()">Print Schedule</button>';
	include('../dist/includes/report_body.php');
	include('../dist/includes/report_footer.php');
?> 

 
  </body>
  </html>

	
  <script>
function printSchedule() {
  var monWedTable = document.getElementById("monWedTable").cloneNode(true);
  var thuSatTable = document.getElementById("thuSatTable").cloneNode(true);

  // Remove IDs from the cloned tables
  monWedTable.removeAttribute("id");
  thuSatTable.removeAttribute("id");

  // Remove the "txtedit" and "txtdelete" elements from the cloned tables
  var editElements = monWedTable.getElementsByClassName("txtedit");
  for (var i = 0; i < editElements.length; i++) {
    editElements[i].remove();
  }

  var deleteElements = monWedTable.getElementsByClassName("txtdelete");
  for (var i = 0; i < deleteElements.length; i++) {
    deleteElements[i].remove();
  }

  editElements = thuSatTable.getElementsByClassName("txtedit");
  for (var i = 0; i < editElements.length; i++) {
    editElements[i].remove();
  }

  deleteElements = thuSatTable.getElementsByClassName("txtdelete");
  for (var i = 0; i < deleteElements.length; i++) {
    deleteElements[i].remove();
  }

  // Create a new window for printing
  var newWin = window.open("", "Print-Window");
  newWin.document.open();
  newWin.document.write("<html><head></head><body>");
  newWin.document.write(monWedTable.outerHTML);
  newWin.document.write("<br>");
  newWin.document.write(thuSatTable.outerHTML);
  newWin.document.write("</body></html>");
  newWin.document.close();

  // Print the contents and close the new window
  newWin.onload = function() {
    newWin.print();
    newWin.close();
  };
}
</script>

