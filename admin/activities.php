<?php
include '../config.php';
session_start();
error_reporting(0);

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}

if(isset($_POST['upload'])) {
  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "../image/".$filename;

  $title = $_POST['title'];
  $caption = $_POST['caption'];

  $sql = "INSERT INTO activities (title, caption, image)
      VALUES ('$title', '$caption', '$filename')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
      if (move_uploaded_file($tempname, $folder))  {
          echo "<div class='alert alert-success'><strong>Event Succesfully Added!</strong></div>";
      header("Refresh:1");
      }else{
          echo "<script>alert('Something Wrong Went.')</script>";
    }
  }else{
    echo "<script>alert('Something Wrong Went.')</script>";
  }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>HCC PORTAL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/style.css">
  <link rel="stylesheet" href="../assets/css/
  bootstrap.min.css" type="text/css"/>
  <script src="../assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
</head>
<body onload="onLoad()">
  <?php
    include("header.php");
  ?>
  <div class="container w-75">
    <div class="row">
      <div class="col-xl-4">
        <form method="POST" action="" enctype="multipart/form-data">
              <div class="text-center">
                  <img class="img-account-profile rounded-circle mb-2" src="" width="250" height="250" alt="" onerror=this.src="../image/altimg.png">
                  <input class="form-control" type="file" name="uploadfile" value="" />
                <hr />
                  <button name="upload" type="submit" class="btn btn-primary">Upload</button>
              </div>

      </div>
      <div class="col-xl-8">
        <div class="col-md">
          <div class="form-outline">
            <input type="text" name="title" class="form-control" placeholder="Insert Title Here" value="" required/>
          </div>
        </div>
        <hr />
        <div class="col-md">
          <div class="form-outline">
            <textarea class="form-control" name="caption" rows="5" required></textarea>
          </div>
        </div>
      </div>
      </form>
  </div>
  <script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
  </script>
</body>
</html>