<?php
include '../../config.php';
session_start();
error_reporting(0);

if (!($_SESSION['role'] == 'Admin')) {
  header("Location: ../../index.php");
}
 /** STUDENT DELETE  */
if(isset($_POST['studentDelete'])) {

  $result = mysqli_query($conn, "DELETE FROM students WHERE studentid='".$_POST['studentid']."'");
  $result = mysqli_query($conn, "DELETE FROM users WHERE userid='".$_POST['studentid']."'");

  if ($result) {
    echo '<script type="text/javascript">setTimeout(function () {
      swal("Student Succesfully Removed!","","success");}, 200);
      </script>';
    header("Refresh:1");
  } else {
    echo '<script type="text/javascript">setTimeout(function () {
      swal("Something went wrong, Please try again.","","error");}, 200);</script>';
      header("Refresh:1");
  }
}

/** STUDENT UPDATE */
if(isset($_POST['studentUpdate'])) {
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

    $sql = "UPDATE students SET 
    firstname = '$txtstudentfname', 
    lastname  = '$txtstudentlname',
    address   = '$txtaddress', 
    contact   = '$txtstudentcontact', 
    birthday  = '$txtbirthdate',
    email     = '$txtstudentemail',
    course    = '$txtcourse',
    year      = '$txtyear',
    section   = '$txtsection' WHERE studentid = '$txtstudentid'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo '<script type="text/javascript">setTimeout(function () {
        swal("Student Information Succesfully Updated","","success");}, 200);
        </script>';
      header("Refresh:1");
    } else {
      echo '<script type="text/javascript">setTimeout(function () {
        swal("Something went wrong, Please try again.","","error");}, 200);</script>';
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
      <div class="col-md pt-2">
        <table class="table table-striped table-primary table-hover p-2" id="table">
          <thead>
            <tr>
              <th scope="col">Student ID</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Course</th>
              <th scope="col">Year</th>
              <th scope="col">Section</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM students";
            $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0) {
              echo '<script type="text/javascript">setTimeout(function () {
                swal("Nothing found in Database.","","error");}, 200);</script>';
              }
            if ($result->num_rows > 0) {
              while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".$row['studentid']."</td>";
                echo "<td>".$row['firstname']."</td>";
                echo "<td>".$row['lastname']."</td>";
                echo "<td>".$row['course']."</td>";
                echo "<td>".$row['year']."</td>";
                echo "<td>".$row['section']."</td>";
                echo '<td>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#studentUpdate'.$row['studentid'].'"> Update</button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#studentDelete'.$row['studentid'].'"> Delete</button>
                </td>';
                echo "</tr>";
                
                include 'deleteModal.php';
                include 'updateModal.php';
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </form>
  </div>
  <?php
    include '../footer.php';
  ?>
  <script>
$(document).ready(function () {
    $('#table').DataTable({
        lengthMenu: [
            [5, 10, 20, -1],
            [5, 10, 20, 'All'],
        ],
    });
});
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
  </script>
</body>
</html>
