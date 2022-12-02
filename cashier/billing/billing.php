<?php
session_start();
error_reporting(0);
if (!($_SESSION['role'] == 'Cashier')) {
  header("Location: ../../index.php");
}
?>
<!DOCTYPE html>
<html>
<body>
  <?php
  include("../header.php");
  ?>
  <div class="container">
    <div class="h-100 d-flex align-items-center justify-content-center">
      <span id="message"></span>
      <form method="post" id="import_excel_billing" enctype="multipart/form-data" class="row g-3">
        <div class="col-12 text-center">
          <h2><label class="form-label">Upload Billing</label></h2>
          <input class="form-control" type="file" name="import_excel">
        </div>
        <div class="d-grid gap-2">
          <input type="submit" name="import" id="import" class="btn btn-primary" value="Import" />   
        </div>
      </form>
    </div>
    <?php
    include '../footer.php';
    ?>
  </div>
</body>
</html>
