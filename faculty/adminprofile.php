<?php
include '../config.php';
session_start();
error_reporting(0);

if (!isset($_SESSION['username'])) {
  header("Location: ../index.php");
}

$id = $_SESSION['theid'];
$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
  $row = mysqli_fetch_assoc($result);
  $_SESSION['username'] = $row['lastname']. ', ' .$row['username'];
  $showimage = "../assets/images/".$row['picture'];
} else {
  echo "<script>alert('Data not found!')</script>";
}

if(isset($_POST['submit'])) {
  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "../assets/images/".$filename;

  if(empty($filename)){
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
  birthdate = '$birthdate', tel = '$tel', address = '$address'
  WHERE id = '$id'";
  $result = mysqli_query($conn, $sql);
  move_uploaded_file($tempname, $folder);
  if ($result) {
    echo '<script type="text/javascript">setTimeout(function () {
      swal("Admin Profile Updated Succesfully!","","success");}, 200);</script>';
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
      <div class="container w-75">
        <div class="row" style="position:relative; top:10%;">
          <div class="col-xl-4" style="position:relative; top:17px;">
            <form method="POST" action="" enctype="multipart/form-data">
              <div class="text-center">
                <img class="img-account-profile rounded-circle mb-2" src="<?php echo $showimage ?>" width="250" height="250" alt="" onerror=this.src="../assets/images/altimg.png">
                <input type="hidden" name="imageValue" value="<?php echo $showimage ?>"/>
                <input class="form-control" type="file" name="uploadfile" value="" />
              </div>
            </div>
            <div class="col-xl-8">
              <div class="row gx-3 mb-3">
                <div class="col-md-6">
                  <label class="small mb-1 fw-bold">First name</label>
                  <input name="username" class="form-control" type="text" value="<?php echo $row['username']; ?>" required>
                </div>

                <div class="col-md-6">
                  <label class="small mb-1 fw-bold">Last name</label>
                  <input name="lastname" class="form-control" type="text" value="<?php echo $row['lastname']; ?>" required>
                </div>
              </div>

              <div class="mb-3">
                <label class="small mb-1 fw-bold" for="inputAddress">Address</label>
                <input name="address" class="form-control" type="address" value="<?php echo $row['address']; ?>" required>
              </div>

              <div class="row gx-3 mb-3">
                <div class="col-md-4">
                  <label class="small mb-1 fw-bold" for="inputPhone">Phone number</label>
                  <input name="tel" class="form-control" type="tel" value="<?php echo $row['tel']; ?>" maxlength="11">
                </div>
                <div class="col-md-4">
                  <label class="small mb-1 fw-bold" for="inputBirthday">Birthday</label>
                  <input class="form-control" type="date" name="birthdate" value="<?php echo $row['birthdate']; ?>">
                </div>
                <div class="col-md-4">
                  <label class="small mb-1 fw-bold" for="inputEmail">Email Address</label>
                  <input name="email" class="form-control" type="email" value="<?php echo $row['email']; ?>" required>
                </div>
              </div>
             
              <button name="submit" type="submit" class="btn btn-primary">Save changes</button>
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
