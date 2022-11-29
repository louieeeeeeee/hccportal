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
    echo $loggedinuser['role'];
    if($loggedinuser['role'] == 'Admin'){
      $_SESSION['username'] = $loggedinuser['lastname'];
      $_SESSION['loggedin'] = "1";
      header("Location: admin/dashboard/dashboard.php");
    }elseif($loggedinuser['role'] == 'Faculty'){
      $_SESSION['username'] = $loggedinuser['lastname']. ', ' .$loggedinuser['username'];
      $_SESSION['loggedin'] = "1";
      header("Location: faculty/welcome.php");
    }elseif($loggedinuser['role'] == 'Cashier'){
      $_SESSION['username'] = $loggedinuser['lastname']. ', ' .$loggedinuser['username'];
      $_SESSION['loggedin'] = "1";
      header("Location: cashier/welcome.php");
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
      <link href="assets/css/style.css" rel="stylesheet">
    </head>
    <body class="text-center">
      <main class="form-signin position-absolute top-50 start-50 translate-middle">
        <form action="" method="POST">
          <img class="mb-4" src="assets/images/logo.png" alt="" width="100" height="100">
          <h1 class="h3 mb-3 fw-bold " style="color:blue;">Sign in</h1>
          <div class="form-floating">
            <input type="text" name="studentID" class="form-control" placeholder="Student ID" maxlength="8">
            <label id="textOP"  style="color:red;" >ID Number</label>
          </div>
          <br/>
          <button type="submit" name="login" class="w-100 btn btn-lg btn-primary">Sign in</button>
        </form>
      </main>

    </body>
    </html>

    <script type="text/javascript">
    $(document).ready(function(){

    });
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
  </script>
