<?php
include '../config.php';
session_start();
error_reporting(0);

if (!isset($_SESSION['username'])) {
  header("Location: ../index.php");
}

//setcookie("hello", "", time()-3600);

$id = $_SESSION['theid'];
$username = $_SESSION['username'];
if (isset($_POST['findUser'])) {
  $userSelect = $_POST['userSelect'];
  $searchBy = $_POST['searchBy'];
  $searchRes = $_POST['searchRes'];

  $sql = "SELECT * FROM users WHERE $searchBy ='$searchRes' AND role='$userSelect'";
  $result = mysqli_query($conn, $sql);
  if (!$result->num_rows > 0) {
    echo '<script type="text/javascript">setTimeout(function () {
      swal("No User Found in Database.","","error");}, 200);</script>';
    }
  }
  if (isset($_POST['userRegistration'])) {
    $facultyID = $_POST['facultyID'];
    $username = $_POST['username'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = md5("mcmY2022");
    $userSelect = $_POST['userSelect2'];

    $sql = "SELECT * FROM users WHERE id='$facultyID'";
    $result = mysqli_query($conn, $sql);
    if (!$result->num_rows > 0) {
      $sql = "INSERT INTO users (id, username, lastname, email, password, role)
      VALUES ('$facultyID' ,'$username', '$lastname', '$email', '$password', '$userSelect')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        if($userSelect == "Faculty"){
          echo '<script type="text/javascript">setTimeout(function () {
            swal("Faculty Member Succesfully Registered!","","success");}, 200);</script>';
        }else{
          echo '<script type="text/javascript">setTimeout(function () {
            swal("Student Succesfully Registered!","","success");}, 200);</script>';
        }
          $facultyID = "";
          $username = "";
          $lastname = "";
          $email = "";
          $password = "";
          $userSelect = "";
        } else {
          echo '<script type="text/javascript">setTimeout(function () {
            swal("Something went wrong, Please try again.","","error");}, 200);</script>';
          }
        } else {
          echo '<script type="text/javascript">setTimeout(function () {
            swal("Student ID Already Exist!","","error");}, 200);</script>';
          }
        }
?>
<!DOCTYPE html>
<html lang="en">
<body>
<?php
include("header.php");
?>
<div class="container w-50">
    <!--USER REGISTRATION FORM-->
      <form class="row g-3" action="" method="POST" style="margin-top:1%; position:relative;">

        <div class="col-md text-center">
          <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="userSelect2" id="btnradio22" value="Student" checked>
            <label class="btn btn-outline-primary" for="btnradio22">Student</label>

            <input type="radio" class="btn-check" name="userSelect2" id="btnradio33" value="Faculty">
            <label class="btn btn-outline-primary" for="btnradio33">Faculty</label>
          </div>
        </div>
        <div class="col-md-12">
          <label class="small mb-1 fw-bold">User ID</label>
          <input type="text" name="facultyID" class="form-control" placeholder="User ID" value="" maxlength="8" required/>
        </div>
        <div class="col-md-6">
          <label class="small mb-1 fw-bold">First Name</label>
          <input type="text" name="username" class="form-control" placeholder="First Name" value="" required/>
        </div>
        <div class="col-md-6">
          <label class="small mb-1 fw-bold">Last Name</label>
          <input type="text" name="lastname" class="form-control" placeholder="Last Name" value="" required/>
        </div>
        <div class="col-md-12">
          <label class="small mb-1 fw-bold">Email</label>
          <input type="email" name="email" class="form-control" placeholder="Email" value="" required/>
        </div>
        <button class="btn btn-primary float-start" type="submit" name="userRegistration" id="register">Register</button>
      </form>
  </div>
</div>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>
