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
  <div class="container w-25">

    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Billing</button>
        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">User Accounts</button>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
        <span id="message"></span>
        <form method="post" id="import_excel_billing" enctype="multipart/form-data">
          <div class="mb-3">
            <br/>
            <label class="form-label">Select Excel File</label>
            <input class="form-control" type="file" name="import_excel"> <br/>
            <input type="submit" name="import" id="import" class="btn btn-primary" value="Import" />
          </div>
        </form>
      </div>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
        <span id="message"></span>
        <form method="post" id="import_excel_accounts" enctype="multipart/form-data">
          <div class="mb-3">
            <br/>
            <label class="form-label">Select Excel File</label>
            <input class="form-control" type="file" name="import_excel"> <br/>
            <input type="submit" name="import" id="import" class="btn btn-primary" value="Import" />
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
