<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['username'])) {
  header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html>
  	<body>
      <?php
      include("header.php");
      ?>
    	<div class="container w-50">
        			<span id="message"></span>
              <form method="post" id="import_excel_form" enctype="multipart/form-data">
                <table class="table">
                  <tr>
                    <td width="25%" align="right">Select Excel File</td>
                    <td width="25%"><input type="file" name="import_excel" /></td>
                    <td width="25%"><input type="submit" name="import" id="import" class="btn btn-primary" value="Import" /></td>
                  </tr>
                </table>
              </form>
    	</div>
  </body>
</html>
