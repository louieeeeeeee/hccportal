<?php
include 'config.php';

session_start();


error_reporting(0);
if (isset($_POST['btnlogin'])) {
  $userPass = md5($_POST['userPass']);
  $userID = $_SESSION['theid'];
  $sql = "SELECT * FROM users WHERE userid='$userID' and password='$userPass'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) == 1){
    $loggedinuser = mysqli_fetch_assoc($result);
    if($loggedinuser['role'] == 'Admin'){
      $_SESSION['username'] = "Administrator";
      $_SESSION['loggedin'] = "1";
      header("Location: admin/dashboard/dashboard.php");
    }elseif($loggedinuser['role'] == 'Faculty'){
      $result = mysqli_query($conn, "SELECT * FROM faculty WHERE facultyid='$userID'");
      $getFacultyName = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $getFacultyName['lastname']. ', ' .$getFacultyName['firstname'];
      $_SESSION['loggedin'] = "1";
      header("Location: faculty/dashboard/dashboard.php");
    }elseif($loggedinuser['role'] == 'Cashier'){
      $_SESSION['username'] = "Cashier";
      $_SESSION['loggedin'] = "1";
      header("Location: cashier/dashboard/dashboard.php");
    }   
  }else{
    echo '<script type="text/javascript">setTimeout(function () {
      swal("Invalid Password, Please Try Again!","","error");}, 200);</script>';

    }

  $sql = "SELECT * FROM users WHERE userid='$userID'";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) == 1){
    $loggedinuser = mysqli_fetch_assoc($result);
    if($loggedinuser['role'] == 'Student'){
      $_SESSION['loggedin'] = "1";
      header("Location: student/welcome.php");
    }
  }
}
if (isset($_POST['login'])) {
  $studentID = $_POST['studentID'];
  $sql = "SELECT * FROM users WHERE userid='$studentID'";
  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) == 1){
    $loggedinuser = mysqli_fetch_assoc($result);
    if($loggedinuser['role'] == 'Admin'){
      $_SESSION['theid'] = $loggedinuser['userid'];
      $_SESSION['role'] = $loggedinuser['role'];
      include 'verificationModal.php';
    }elseif($loggedinuser['role'] == 'Faculty'){
      $_SESSION['theid'] = $loggedinuser['userid'];
      $_SESSION['role'] = $loggedinuser['role'];
      include 'verificationModal.php';
    }elseif($loggedinuser['role'] == 'Cashier'){
      $_SESSION['theid'] = $loggedinuser['userid'];
      $_SESSION['role'] = $loggedinuser['role'];
      include 'verificationModal.php';
    }elseif($loggedinuser['role'] == 'Student'){
      $_SESSION['username'] = $loggedinuser['lastname']. ', ' .$loggedinuser['username'];
      $_SESSION['theid'] = $loggedinuser['userid'];
      $_SESSION['role'] = $loggedinuser['role'];
      include 'verificationModal.php';
    }
  }else{
    echo '<script type="text/javascript">setTimeout(function () {
      swal("User Does not Exist!","","error");}, 200);</script>';

    }
  }
    ?>
<!DOCTYPE html>
<html lang="en">
<title>HCC Portal</title>
<head> 
  <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
  <link href="assets/plugins/bootstrap.min.css" rel="stylesheet">
  <script src="assets/plugins/bootstrap.bundle.min.js"></script>
  <script src="assets/plugins/sweetalert.min.js"></script>
  <link href="assets/plugins/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body onLoad="initClock()">
  <div class="container-fluid pt-5" >
    <div class="col text-center pt-5 font-monospace" style="letter-spacing: 0px;">
      <h1>STUDENT INFORMATION SYSTEM</h1>
    </div><br/><br/>
    <div class="row d-flex justify-content-center pt-5">
      <div class="col-6 pe-5">
        <div id="timedate">
          <div class="col" style="font-size:100px;">
            <a id="h">12</a> :
            <a id="m">00</a>:
            <a id="s">00</a>
          </div>
          <div class="col fs-1">
            <a id="mon">January</a>
            <a id="d">1</a>,
            <a id="y">0</a><br />
          </div> 
        </div>
      </div>
      <div class="col-4 text-center">
        <form action="" method="POST">
          <img class="mb-4" src="assets/images/logo.png" alt="" width="150" height="150">
          <div class="form-floating fw-bold">
            <input type="text" name="studentID" class="form-control rounded-pill" placeholder="Student ID" style="text-align:center;">
            <label id="textOP">ID Number</label>
          </div>
          <br/>
          <button type="submit" name="login" class="w-100 btn btn-lg btn-primary rounded-pill">Sign in</button>
        </form>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
  <script src="assets/js/indexScript.js"></script>
</body>
</html>

    <script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
  </script>
