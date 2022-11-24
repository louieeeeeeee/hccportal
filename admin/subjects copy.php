<?php
include '../config.php';
session_start();
error_reporting(0);

if (!($_SESSION['role'] == 'Admin')) {
  header("Location: ../index.php");
}

if ($_SESSION['loggedin'] == '1') {
  echo '<script type="text/javascript">setTimeout(function () {
    swal("Welcome Admin","","success");}, 200);</script>';
  unset($_SESSION["loggedin"]);
}

$id = $_SESSION['theid'];
$username = $_SESSION['username'];
  $sql = "SELECT * FROM subjects";
  $result = mysqli_query($conn, $sql);

  if(isset($_POST['update'])) {
    $course = $_POST['course'];
    $code = $_POST['code'];
  	$subject = $_POST['subject'];
    $unit = $_POST['unit'];
    $year = $_POST['year'];

    $parts = $_POST['faculty'];
    $arr = explode(':', $parts);

    $facultytemp = $arr[0];
    $faculty = preg_replace('/(,)(?=[^\s])/', ', ', $facultytemp);
    $facultyid = $arr[1];

      $sql = "UPDATE subjects SET course = '$course', code = '$code', subject = '$subject',
      year = '$year', unit = '$unit', faculty = '$faculty', facultyid = '$facultyid' WHERE code = '$code'";
  		$result = mysqli_query($conn, $sql);
  		if ($result) {
        echo "<div class='alert alert-success'>
      <strong>Subject Succesfully Updated!</strong>
    </div>";
        header("Refresh:1");
  		} else {
  			echo "<script>alert('Something Wrong Went.')</script>";
  		}
    }

  if (isset($_POST['register'])) {
    echo '<script>console.log("Your stuff here")</script>';
    $subject = $_POST['subject'];
    $year = $_POST['year'];
    $sem = $_POST['sem'];
    $code = $_POST['code'];
    $unit = $_POST['unit'];
  	$course = $_POST['course'];

    $parts = $_POST['faculty'];
    $arr = explode(':', $parts);

    $facultytemp = $arr[0];
    $faculty = preg_replace('/(,)(?=[^\s])/', ', ', $facultytemp);
    $facultyid = $arr[1];

  			$sql = "INSERT INTO subjects (facultyid, course, code, subject, year, sem, unit)
  					VALUES ('$facultyid', '$course', '$code', '$subject', '$year', '$sem', '$unit')";
  			$result = mysqli_query($conn, $sql);
  			if ($result) {
          echo "<div class='alert alert-success'><strong>Subject Succesfully Added to the System!</strong></div>";
  				$username = "";
  				$email = "";
  				$_POST['password'] = "";
  				$_POST['cpassword'] = "";
          header("Refresh:1");
  			} else {
          echo "<div class='alert alert-danger'><strong>Something went wrong, Please try again.</strong></div>";
          header("Refresh:1");
  			}
  }
?>
<!DOCTYPE html>
<html lang="en">
<body>
  <?php
    include("header.php");
  ?>
  <div class="container w-100">
    <label class="form-label">Subjects Registration</label><br/>
    <button class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#registerModal"> Add Subject</button>
    <div class="row">
      <div class="col-md" id="tablelength">
        <table class="table table-striped table-dark" id="table" style="table-layout:fixed;">
          <thead>
            <tr>
              <th scope="col" style="width:100px;">Code</th>
              <th scope="col" style="width:250px;">Subject Name</th>
              <th scope="col" style="width:100px;">Year</th>
              <th scope="col" style="width:100px;">Semester</th>
              <th scope="col" style="width:300px;">Faculty</th>
              <th scope="col" >Course</th>
              <th scope="col" style="width:50px;">Unit</th>
              <th scope="col" style="width:100px;">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                  echo "<td>".$row['code']."</td>";
                  echo "<td>".$row['subject']."</td>";
                  echo "<td>".$row['year']."</td>";
                  echo "<td>".$row['sem']."</td>";
                  echo "<td>".$row['faculty']."</td>";
                  echo "<td>".$row['course']."</td>";
                  echo "<td>".$row['unit']."</td>";
                  echo '<td><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal"> Update</button></td>';
                  echo "</tr>";
                  include 'subjects_updateModal.php';
                  include 'subjects_registerModal.php';
              }
              } else {
                  echo "<tr>";
                  echo "<td colspan='6'>";
                  echo "<center>No Data Found.</center>";
                  echo "</td>";
                  echo "</tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script>
 

    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
  /**  function onLoad() {
    var register = document.getElementById("register");
    var update = document.getElementById("update");
    var cancel = document.getElementById("cancel");
    register.style.display = "block";
    update.style.display = "none";
    cancel.style.display = "none";
  }
    var table = document.getElementById('table');
    var selected = table.getElementsByClassName('selected');
    table.onclick = highlight;

    function highlight(e) {
        if (selected[0])selected[0].className = '';
        e.target.parentNode.className = 'selected';

        register.style.display = "none";
        update.style.display = "block";
        cancel.style.display = "block";

        var element = document.querySelectorAll('.selected');
        if(element[0]!== undefined){
          var facultyid = element[0].children[0].firstChild.data;
          document.cookie='fcookie='+facultyid;
          document.getElementById("code").value = element[0].children[0].firstChild.data;
          document.getElementById("subject").value = element[0].children[1].firstChild.data;
          document.getElementById("unit").value = element[0].children[5].firstChild.data;
        }
    }
    function Cancel() {
      register.style.display = "block";
      update.style.display = "none";
      cancel.style.display = "none";
    }*/ 

  </script>
</body>
</html>
