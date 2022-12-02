<?php
include '../../config.php';
session_start();
error_reporting(0);

if (!($_SESSION['role'] == 'Admin')) {
  header("Location: ../../index.php");
}

$id = $_SESSION['theid'];
$username = $_SESSION['username'];

  if (isset($_POST['facultyReg'])) {
    $txtfacultyid = $_POST['txtfacultyid'];
    $txtfname = $_POST['txtfname'];
    $txtlname = $_POST['txtlname'];
    $txtemail = $_POST['txtemail'];
    $txtcontact = $_POST['txtcontact'];
    $txtdept = $_POST['txtdept'];
    $txtpassword = md5("pass");

    $result = mysqli_query($conn, "SELECT * FROM users WHERE userid='$txtfacultyid'");

    if (!$result->num_rows > 0) {
      $result = mysqli_query($conn, "INSERT INTO users (userid, password, role) 
        VALUES ('$txtfacultyid', '$txtpassword', 'Faculty')");
      $result = mysqli_query($conn, "INSERT INTO faculty (facultyid, firstname, lastname, department, email, contact) 
        VALUES ('$txtfacultyid', '$txtfname', '$txtlname', '$txtdept', '$txtemail', '$txtcontact')");
      if ($result) {
        echo '<script type="text/javascript">setTimeout(function () {
          swal("Faculty Member Succesfully Registered!","","success");}, 200);</script>';
      } else {
          echo '<script type="text/javascript">setTimeout(function () {
            swal("Something went wrong, Please try again.","","error");}, 200);</script>';
       }
    } else {
          echo '<script type="text/javascript">setTimeout(function () {
            swal("Faculty ID Already Exist. Please Try Again.","","error");}, 200);</script>';
   }
  }

  if (isset($_POST['studentReg'])) {
    $txtstudentid = $_POST['txtstudentid'];
    $txtstudentfname = $_POST['txtstudentfname'];
    $txtstudentlname = $_POST['txtstudentlname'];
    $txtaddress = $_POST['txtaddress'];
    $txtstudentcontact = $_POST['txtstudentcontact'];
    $txtbirthdate = $_POST['txtbirthdate'];
    $txtstudentemail = $_POST['txtstudentemail'];
    $txtcourse = $_POST['txtcourse'];
    $txtyear = $_POST['txtyear'];
    $txtsection = $_POST['txtsection'];
    $txtpassword = md5("pass");

    $result = mysqli_query($conn, "SELECT * FROM users WHERE userid='$txtstudentid'");

    if (!$result->num_rows > 0) {
      $result = mysqli_query($conn, "INSERT INTO users (userid, password, role) 
        VALUES ('$txtstudentid', '$txtpassword', 'Student')");
      $result = mysqli_query($conn, "INSERT INTO students (studentid, firstname, lastname, address, contact, birthday, email, course, year, section) 
        VALUES ('$txtstudentid', '$txtstudentfname', '$txtstudentlname', '$txtaddress', '$txtstudentcontact', '$txtbirthdate', '$txtstudentemail', '$txtcourse', '$txtyear', '$txtsection')");
      if ($result) {
        echo '<script type="text/javascript">setTimeout(function () {
          swal("Student Succesfully Registered!","","success");}, 200);</script>';
      } else {
          echo '<script type="text/javascript">setTimeout(function () {
            swal("Something went wrong, Please try again.","","error");}, 200);</script>';
       }
    } else {
          echo '<script type="text/javascript">setTimeout(function () {
            swal("Faculty ID Already Exist. Please Try Again.","","error");}, 200);</script>';
   }
  }
?>
<!DOCTYPE html>
<html lang="en">
<body>
<?php
  include '../header.php'
  ?>
<div class="container w-50 p-5">
  <nav>
    <div class="nav nav-tabs fs-4" id="nav-tab" role="tablist" style="justify-content: center;">
      <button class="nav-link active" id="nav-student-tab" data-bs-toggle="tab" data-bs-target="#nav-student" type="button" role="tab" aria-controls="nav-student" aria-selected="false">Students</button>
      <button class="nav-link" id="nav-faculty-tab" data-bs-toggle="tab" data-bs-target="#nav-faculty" type="button" role="tab" aria-controls="nav-faculty" aria-selected="true">Faculty</button>
      <button class="nav-link" id="nav-cashier-tab" data-bs-toggle="tab" data-bs-target="#nav-cashier" type="button" role="tab" aria-controls="nav-cashier" aria-selected="false">Cashier</button>
      <button class="nav-link" id="nav-registrar-tab" data-bs-toggle="tab" data-bs-target="#nav-registrar" type="button" role="tab" aria-controls="nav-registrar" aria-selected="false">Registrar</button>
    </div>
  </nav>
  <div class="tab-content">
    <div class="tab-pane fade show active" id="nav-faculty" role="tabpanel" aria-labelledby="nav-faculty-tab" tabindex="0">
      <form action="" method="POST">
        <div class="col-md pb-3 pt-3">
          <label class="fw-bold">Faculty ID: </label>
          <input type="number" name="txtfacultyid" class="form-control" placeholder="User ID" value="" onkeydown="return event.keyCode !== 69" required/>
        </div>
        <div class="row pb-3">
          <div class="col-md">
            <label class="fw-bold">First Name: </label>
            <input type="text" name="txtfname" class="form-control" placeholder="First Name" value="" required/>
          </div>
          <div class="col-md">
            <label class="fw-bold">Last Name:</label>
            <input type="text" name="txtlname" class="form-control" placeholder="Last Name" value="" required/>
          </div>
        </div>
        <div class="row pb-3">
          <div class="col-md">
              <label class="fw-bold">Email: </label>
              <input type="email" name="txtemail" class="form-control" placeholder="Email" value="" required/>
          </div>
          <div class="col-md">
              <label class="fw-bold">Contact Number: </label>
              <input type="number" name="txtcontact" class="form-control" placeholder="Contact Number" value="" onkeydown="return event.keyCode !== 69" required/>
          </div>
        </div>
        <div class="col-md pb-3">
          <label class="fw-bold">Department: </label>
            <select id="addDept" name="txtdept" class="form-control" required>
              <option value="">-- Select a Department -- </option>
              <option value="BSCS">BSCS</option>
              <option value="BSED">BSED</option>
              <option value="BSCRIM">BSCRIM</option>
            </select>
        </div>
        <div class="col-md text-center pt-3"> 
            <button class="btn btn-primary btn-lg" type="submit" name="facultyReg" id="register">Register</button>
        </div>
      </form>
      </div>
      <div class="tab-pane fade" id="nav-student" role="tabpanel" aria-labelledby="nav-student-tab" tabindex="0">
      <form action="" method="POST">
        <div class="row pb-3 pt-3">
          <div class="col-md">
            <label class="fw-bold">Student ID: </label>
            <input type="number" name="txtstudentid" class="form-control" placeholder="User ID" value="" onkeydown="return event.keyCode !== 69" required/>
          </div>
          <div class="col-md">
            <label class="fw-bold">First Name: </label>
            <input type="text" name="txtstudentfname" class="form-control" placeholder="First Name" value="" required/>
          </div>
          <div class="col-md">
            <label class="fw-bold">Last Name:</label>
            <input type="text" name="txtstudentlname" class="form-control" placeholder="Last Name" value="" required/>
          </div>
        </div>
        <div class="col-md pb-3">
          <label class="fw-bold">Address: </label>
          <input type="text" name="txtaddress" class="form-control" placeholder="Address" value="" onkeydown="return event.keyCode !== 69" required/>
        </div>
        <div class="row pb-3">
          <div class="col-md">
              <label class="fw-bold">Email: </label>
              <input type="email" name="txtstudentemail" class="form-control" placeholder="Email" value="" required/>
          </div>
          <div class="col-md">
              <label class="fw-bold">Contact Number: </label>
              <input type="number" name="txtstudentcontact" class="form-control" placeholder="Contact Number" value="" onkeydown="return event.keyCode !== 69" required/>
          </div>
          <div class="col-md">
              <label class="fw-bold">Birthdate: </label>
              <input type="date" name="txtbirthdate" class="form-control" placeholder="Birthdate" value="" onkeydown="return event.keyCode !== 69" required/>
          </div>
        </div>
        <div class="row pb-3">
          <div class="col-md">
            <label class="fw-bold">Course: </label>
              <select id="addDept" name="txtcourse" class="form-control" required>
                <option value="">-- Select a Course -- </option>
                <option value="BSCS">BSCS</option>
                <option value="BSED">BSED</option>
                <option value="BSCRIM">BSCRIM</option>
              </select>
          </div>
          <div class="col-md">
              <label class="fw-bold">Year: </label>
              <input type="text" name="txtyear" class="form-control" placeholder="Year" value="" required/>
            </div>
            <div class="col-md">
              <label class="fw-bold">Section:</label>
              <input type="text" name="txtsection" class="form-control" placeholder="Section" value="" required/>
            </div>
        </div>
        <div class="col-md text-center pt-3"> 
            <button class="btn btn-primary btn-lg" type="submit" name="studentReg" id="register">Register</button>
        </div>
  </form>
      </div>
    </div>
</div>
<?php
  include("../footer.php");
  ?>
</body>
</html>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
