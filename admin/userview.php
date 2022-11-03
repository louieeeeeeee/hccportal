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
  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link fw-bold" id="nav-faculty-tab" data-bs-toggle="tab" data-bs-target="#nav-faculty" type="button" role="tab" aria-controls="nav-faculty" aria-selected="false" style="color:black;">User Registration</button>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-view" role="tabpanel" aria-labelledby="nav-view-tab">
      <form class="row g-3" action="" method="POST" style="margin-top:4%;">
        <div class="col-md-3">
          <select name="searchBy" class="form-select" required>
            <option selected value="" >Search by</option>
            <option value="id">User ID</option>
            <option value="username">First Name</option>
            <option value="lastname">Last Name</option>
            <option value="tel">Phone Number</option>
            <option value="email">Email</option>
          </select>
        </div>
        <div class="col-md-4">
          <input type="text" name="searchRes" class="form-control" placeholder="" value="" required/>
        </div>
        <div class="col-md-2">
          <button class="btn btn-primary float-start" type="submit" name="findUser">Search</button>
        </div>
        <div class="col-md-3">
          <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="userSelect" id="btnradio2" value="Student" checked>
            <label class="btn btn-outline-primary" for="btnradio2">Student</label>

            <input type="radio" class="btn-check" name="userSelect" id="btnradio3" value="Faculty">
            <label class="btn btn-outline-primary" for="btnradio3">Faculty</label>
          </div>
        </div>
        <div class="col-md-12">
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">User ID</th>
                <th scope="col">Lastname</th>
                <th scope="col">Firstname</th>
                <th scope="col">Phone #</th>
                <th scope="col">Email Address</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                  echo "<td>".$row['id']."</td>";
                  echo "<td>".$row['lastname']."</td>";
                  echo "<td>".$row['username']."</td>";
                  echo "<td>".$row['tel']."</td>";
                  echo "<td>".$row['email']."</td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr>";
                echo "<td colspan='5'>";
                echo "<center>No Data Found.</center>";
                echo "</td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </form>
    </div>
    <!--USER REGISTRATION FORM-->
    <div class="tab-pane fade" id="nav-faculty" role="tabpanel" aria-labelledby="nav-faculty-tab">
      <form class="row g-3" action="" method="POST" style="margin-top:1%;">
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
</div>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>
