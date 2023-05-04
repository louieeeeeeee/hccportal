<?php
include '../../config.php';
session_start();
error_reporting(0);

if (!($_SESSION['role'] == 'Admin')) {
  header("Location: ../../index.php");
}
if (isset($_GET['studentid'])) {
  $sql = "SELECT * FROM students where studentid = ".$_GET['studentid'];
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);

  }
}

?>
<!DOCTYPE html>
<html lang="en">
<body>
  <?php
    include("../header.php");
  ?>
  <div class="container p-5">
<form action="" method="POST">
<div class="row pb-3 pt-3">
  <div class="col-md">
    <label class="fw-bold">Student ID: </label>
    <input type="number" name="txtstudentid" class="form-control" placeholder="User ID" value="<?php echo $row["studentid"] ?>" onkeydown="return event.keyCode !== 69" readOnly/>
  </div>
  <div class="col-md">
    <label class="fw-bold">First Name: </label>
    <input onkeydown="return /[a-z, ]/i.test(event.key)" type="text" name="txtstudentfname" class="form-control" placeholder="First Name" value="<?php echo $row["firstname"] ?>" required/>
  </div>
  <div class="col-md">
    <label class="fw-bold">Last Name:</label>
    <input onkeydown="return /[a-z, ]/i.test(event.key)" type="text" name="txtstudentlname" class="form-control" placeholder="Last Name" value="<?php echo $row["lastname"] ?>" required/>
  </div>
</div>
<div class="col-md pb-3">
  <label class="fw-bold">Address: </label>
  <input type="text" name="txtaddress" class="form-control" placeholder="Address" value="<?php echo $row["address"] ?>" onkeydown="return event.keyCode !== 69" required/>
</div>
<div class="row pb-3">
  <div class="col-md">
      <label class="fw-bold">Email: </label>
      <input type="email" name="txtstudentemail" class="form-control" placeholder="Email" value="<?php echo $row["email"] ?>" required/>
  </div>
  <div class="col-md">
      <label class="fw-bold">Contact Number: </label>
      <input type="number" name="txtstudentcontact" class="form-control" placeholder="Contact Number" value="<?php echo $row["contact"] ?>" onkeydown="return event.keyCode !== 69" required/>
  </div>
  <div class="col-md">
      <label class="fw-bold">Birthdate: </label>
      <input type="date" name="txtbirthdate" class="form-control" placeholder="Birthdate" value="<?php echo $row["birthday"] ?>" onkeydown="return event.keyCode !== 69" required/>
  </div>
</div>
<div class="row pb-3">
  <div class="col-md">
    <label class="fw-bold">Section: </label>
      <select id="addDept" name="txtcourse" class="form-control" required>
      <option selected value="<?php echo $row["course"] ?>"><?php echo $row["course"] ?></option>
        <option value="BSCS">BSCS</option>
        <option value="BSED">BSED</option>
        <option value="BSCRIM">BSCRIM</option>
      </select>
  </div>
</div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" onclick="window.location.href='students.php'">Cancel</button>
      <button type="submit" name="studentUpdate" class="btn btn-primary">Update</button>
    </div>
</form>
</form>
</div>