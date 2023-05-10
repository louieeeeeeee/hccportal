<!DOCTYPE hmtl>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <link rel="stylesheet" href="../dist/css/print.css" media="print">
</head>
<body>
  <?php session_start();
  if(empty($_SESSION['id'])):
    header('Location:../index.php');
  endif;
  ?>
  <script type="text/javascript">
    var $j = jQuery.noConflict();
    $(document).ready(function() {
            $("$j.delete").on('click', function(event) {
                event.preventDefault();
                var element = $(this);
                var del_id = element.attr("id");
                var info = 'id=' + del_id;
                if (confirm("Are you sure you want to delete this?" + del_id)) {
                    $.ajax({
                        type: "POST",
                        url: "class_sched_del.php",
                        data: info,
                        success: function() {
                            element.parents(".show").animate({
                                backgroundColor: "#003"
                            }, "slow")
                            .animate({
                                opacity: "hide"
                            }, "slow");
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(jqXHR);
                            console.log(textStatus);
                            console.log(errorThrown);
                        }
                    });
                }
            });
        });
  </script>
<style>
@media print {
    @page {
        size: 8in 13in;
        size: portrait;
    }
}
</style>
</head>
<body>
<?php 
include('../dist/includes/dbcon.php');
 ?>
 
 <div class="wrapper_print">
 <?php 
 if (isset($_POST['search']))

$member=$_POST['faculty'];
$sid=$_SESSION['settings'];

$search=mysqli_query($con,"select * from faculty where facultyid='$member'")or die(mysqli_error($con));
    $row=mysqli_fetch_array($search);

$settings=mysqli_query($con,"select * from settings where settings_id='$sid'")or die(mysqli_error($con));
    $rows=mysqli_fetch_array($settings);

    include('../dist/includes/report_header.php');
    include('../dist/includes/report_body.php');
    include('../dist/includes/report_footer.php');
?> 
  </div>

  </body>

  </html>
