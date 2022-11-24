<?php
include '../config.php';
session_start();
error_reporting(0);

if (!($_SESSION['role'] == 'Student')) {
  header("Location: ../index.php");
}

$id = $_SESSION['theid'];
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
  $row = mysqli_fetch_assoc($result);
  $_SESSION['username'] = $row['lastname'] . ', ' . $row['username'];
  $showimage = "../assets/images/" . $row['picture'];
} else {
  echo "<script>alert('Data not found!')</script>";
}

if (isset($_POST['imageValue'])) {
  echo '<script>console.log("Your stuff here")</script>';
  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "../assets/images/" . $filename;

  if (empty($filename)) {
    $tempname = $_POST["imageValue"];
    $filename = str_replace('../assets/images/', '', $tempname);
  }

  $username = $_POST['username'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $birthdate = $_POST['birthdate'];
  $tel = $_POST['tel'];
  $address = $_POST['address'];
  $course = $_POST['course'];
  $year = $_POST['year'];
  $section = $_POST['section'];


  $sql = "UPDATE users SET picture = '$filename', username = '$username', lastname = '$lastname', email = '$email',
  birthdate = '$birthdate', tel = '$tel', address = '$address', course = '$course', year = '$year', section = '$section'
  WHERE id = '$id'";
  $result = mysqli_query($conn, $sql);
  move_uploaded_file($tempname, $folder);
  if ($result) {
    echo '<script type="text/javascript">setTimeout(function () {
      swal("Profile Picture Updated Succesfully!","","success");}, 200);</script>';
    header("Refresh:1");
  } else {
    echo '<script type="text/javascript">setTimeout(function () {
        swal("Something went wrong!","","error");}, 200);</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<body>
  <?php
  include("header.php");
  ?>
  <div class="container">
    <div class="h-100 d-flex align-items-center justify-content-center">
      <div class="col-md-12" style="padding-bottom:50px;">
        <form method="POST" action="" enctype="multipart/form-data">
          <div class="form-group col-md-12">
            <div class="text-center">
              <label>
                <img class="img-account-profile rounded-circle mb-2" src="<?php echo $showimage ?>" width="200" height="200" alt="" onerror=this.src="../assets/images/altimg.png">
                <input type="hidden" name="imageValue" onchange="this.form.submit()" value="<?php echo $showimage ?>" />
                <input class="form-control" type="file" name="uploadfile" onchange="this.form.submit()" style="display:none" value="" />
              </label>
            </div>
          </div>
          <div class="form-group col-md-12">
            <div class="form-control-lg row">
              <div class="col-md-6">
                <label class="small mb-1 fw-bold">First name</label>
                <input name="username" class="form-control" type="text" value="<?php echo $row['username']; ?>" readOnly>
              </div>

              <div class="col-md-6">
                <label class="small mb-1 fw-bold">Last name</label>
                <input name="lastname" class="form-control" type="text" value="<?php echo $row['lastname']; ?>" readOnly>
              </div>
            </div>

            <div class="form-control-lg">
              <label class="small mb-1 fw-bold" for="inputAddress">Address</label>
              <input name="address" class="form-control" type="address" value="<?php echo $row['address']; ?>" readOnly>
            </div>

            <div class="form-control-lg row">
              <div class="col-md-4">
                <label class="small mb-1 fw-bold" for="inputPhone">Phone number</label>
                <input name="tel" class="form-control" type="tel" value="<?php echo $row['tel']; ?>" readOnly>
              </div>
              <div class="col-md-4">
                <label class="small mb-1 fw-bold" for="inputBirthday">Birthday</label>
                <input class="form-control" type="text" name="birthdate" value="<?php echo $row['birthdate']; ?>" readOnly>
              </div>
              <div class="col-md-4">
                <label class="small mb-1 fw-bold" for="inputEmail">Email Address</label>
                <input name="email" class="form-control" type="email" value="<?php echo $row['email']; ?>" readOnly>
              </div>
            </div>
            <div class="form-control-lg row">
              <div class="col-md-4">
                <label class="form-label fw-bold">Course</label>
                <input name="course" type="text" class="form-control" value="<?php echo $row['course']; ?>" readOnly>
              </div>
              <div class="col-md-4">
                <label class="form-label fw-bold">Year</label>
                <input name="year" type="text" class="form-control" value="<?php echo $row['year']; ?>" readOnly>
              </div>
              <div class="col-md-4">
                <label class="form-label fw-bold">Section</label>
                <input name="section" type="text" class="form-control" value="<?php echo $row['section']; ?>" readOnly>
              </div>
            </div>
        </form>
      </div>  
    </div>
  </div>
  <div class="d-flex align-items-end flex-column">
    <div class="row">
      <a href="welcome.php" class="btn btn-primary btn-lg shadow mb-5">
        <i class="fa-solid fa-angles-left"></i>
        <b>Back</b>
      </a>
    </div>
  </div>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>