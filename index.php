<?php
include 'config.php';
session_start();
error_reporting(0);

if ($_SESSION['role'] == 'Admin') {
  header("Location: admin/welcome.php");
}else if ($_SESSION['role'] == 'Faculty') {
  header("Location: faculty/welcome.php");
}else if ($_SESSION['role'] == 'Student') {
  header("Location: student/welcome.php");
}

if ($_SESSION['passwordchange'] == '1') {
  echo '<script type="text/javascript">setTimeout(function () {
    swal("Password Changed! Please Log in Again.","","success");}, 200);</script>';
  unset($_SESSION["passwordchange"]);
}

if (isset($_POST['login'])) {
  $userselect = "Student";
  $studentID = $_POST['studentID'];
  $password = md5($_POST['password']);
    $sql = "SELECT * FROM users WHERE id='$studentID' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if($result->num_rows > 0 && $row['role'] == "Student"){
      if($password == "e5779259be66cf8164422a66a9010ac5"){
        $_SESSION['theid'] = $row['id'];
        $_SESSION['passwordchange'] = "1";
        header("Location: assets/resetpassword.php");
      }else{
        $_SESSION['username'] = $row['lastname']. ', ' .$row['username'];
        $_SESSION['theid'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['loggedin'] = "1";
        header("Location: student/welcome.php");
    }
    }elseif($result->num_rows > 0 && $row['role'] == "Faculty"){
      if($password == "e5779259be66cf8164422a66a9010ac5"){
        $_SESSION['theid'] = $row['id'];
        $_SESSION['passwordchange'] = "1";
        header("Location: assets/resetpassword.php");
      }else{
        $_SESSION['username'] = $row['lastname']. ', ' .$row['username'];
        $_SESSION['theid'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['loggedin'] = "1";
        header("Location: faculty/welcome.php");
      }
    }elseif($result->num_rows > 0 && $row['role'] == "Admin"){
      $_SESSION['username'] = $row['lastname'];
      $_SESSION['theid'] = $row['id'];
      $_SESSION['role'] = $row['role'];
      $_SESSION['loggedin'] = "1";
      header("Location: admin/welcome.php");
    }else{
      echo '<script type="text/javascript">setTimeout(function () {
        swal("Invalid Email or Password","","error");}, 200);</script>';
        header("Refresh:2");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>HCC Portal</title>
  <link href="assets/plugins/bootstrap.min.css" rel="stylesheet">
  <script src="assets/plugins/sweetalert.min.js"></script>
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="text-center">
  <main class="form-signin position-absolute top-50 start-50 translate-middle">
    <form action="" method="POST">
      <img class="mb-4" src="assets/images/logo.png" alt="" width="100" height="100">
      <h1 class="h3 mb-3 fw-bold " style="color:blue;">Sign in</h1>
      <div class="form-floating">
        <input type="text" name="studentID" class="form-control" placeholder="Student ID" maxlength="8">
        <label id="textOP "  style="color:red;" >Student ID</label>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <label id="textOP"  style="color:green;">Password</label>
      </div>

      <button type="submit" name="login" class="w-100 btn btn-lg btn-primary" >Sign in</button>
    </form>
  </main>
</body>
</html>
