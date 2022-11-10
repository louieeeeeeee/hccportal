<?php
include '../config.php';
session_start();
error_reporting(0);

if (!isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
if ($_SESSION['loggedin'] == '1') {
  echo '<script type="text/javascript">setTimeout(function () {
    swal("Welcome Admin","","success");}, 200);</script>';
  unset($_SESSION["loggedin"]);
}

//setcookie("hello", "", time()-3600);


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

  			$sql = "INSERT INTO subjects (facultyid, faculty, course, code, subject, year, unit)
  					VALUES ('$facultyid', '$faculty', '$course', '$code', '$subject', '$year', '$unit')";
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
    <label class="form-label">Subjects Registration</label>
    <div class="row">
      <div class="col-xl-9" id="tablelength">
        <table class="table table-striped table-dark" id="table">
          <thead>
            <tr>
              <th scope="col" >Code</th>
              <th scope="col" >Subject Name</th>
              <th scope="col" >Year</th>
              <th scope="col" >Faculty</th>
              <th scope="col" >Course</th>
              <th scope="col" >Unit</th>
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
                  echo "<td>".$row['faculty']."</td>";
                  echo "<td>".$row['course']."</td>";
                  echo "<td>".$row['unit']."</td>";
                  echo "</tr>";
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
      <div class="col-xl-3">
          <form action="" method="POST" >
            <div class="row">
              <div class="col-md-8">
            <div class="form-outline mb-4">
              <input type="subject" name="subject" id="subject" class="form-control" placeholder="Subject Name" value="" required/>
            </div>
          </div>
          <div class="col-md-4">
            <select name="year" class="form-select" id="year" required>
              <option value="">Yr</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>

            </select>
          </div>
          </div>
            <div class="row" >
              <div class="col-md-8">
                <div class="form-outline mb-3">
                  <input type="text" name="code" id="code" class="form-control" placeholder="Subject Code" value="" required/>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-outline mb-3">
                  <input type="text" name="unit" id="unit" class="form-control" placeholder="Units" value="" required/>
                </div>
              </div>
            </div>
            <div class="form-outline mb-4">
              <select name="course" class="form-select" id="course" required>
                <option value="">Course</option>
                <option value="BSCS">BS in Computer Science</option>
                <option value="BSED">BS in Education</option>
                <option value="BSCRIM">BS in Criminology</option>
                 <option value="BSBA">BS in Business Administration</option>
                  <option value="BSHM">BS in Hotel Management</option>
              </select>
            </div>
            <div class="form-outline mb-4">
              <select name="faculty" class="form-select" id="faculty" required>
                <option value="">Faculty</option>
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE role='Faculty'");
                while ($row = $sql->fetch_assoc()){
                  echo "<option value=".$row['lastname'].','.$row['username'].':'.$row['id'].">" .$row['lastname'].", ".$row['username']. "</option>";
                }
                ?>
              </select>
            </div>
            <hr />
            <div class="d-grid gap-2 d-md-block">
              <button class="btn btn-primary float-start" type="submit" name="update" id="update">Update</button>
              <button class="btn btn-primary float-start" id="cancel" onclick="Cancel()">Cancel</button>
              <button class="btn btn-primary float-start" type="submit" name="register" id="register">Register</button>
            </div>
          </form>
      </div>
    </div>
  </div>
  <script>
  function onLoad() {
    var register = document.getElementById("register");
    var update = document.getElementById("update");
    var cancel = document.getElementById("cancel");
    register.style.display = "block";
    update.style.display = "none";
    cancel.style.display = "none";
  }

    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
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
    }

  </script>
</body>
</html>
