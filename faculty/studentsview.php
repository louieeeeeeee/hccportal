<?php
include '../config.php';
session_start();
error_reporting(0);

if ($_SESSION['role'] == 'Faculty') {
}else{
  header("Location: ../index.php");
}

if(isset($_POST['submit'])) {
  $subject = $_POST['subject'];
  $year = $_POST['year'];
  $semester = $_POST['semester'];
  $sql = "SELECT * FROM grades WHERE subject='$subject' AND schoolyear='$year' AND semester='$semester'";
  $result = mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<body>
  <?php
    include("header.php");
  ?>
  <div class="container w-100">
    <div class="row" style="position:relative; top:10%;">
        <form method="POST">
          <div class="row gx-3 mb-3">
            <div class="col-md-5">
              <select name="subject" class="form-select" required>
                <option value="">Select a Subject</option>
                <?php
                $facultyID = $_SESSION['theid'];
                $sql = mysqli_query($conn, "SELECT * FROM subjects WHERE facultyid='$facultyID'");
                while ($row = $sql->fetch_assoc()){
                  echo "<option value='".$row['subject']."'>".$row['subject']."</option>";
                }
                ?>
              </select>
            </div>
            <div class="col-md-3">
              <select name="year" class="form-select" required>
                <option value="">Schoolyear</option>
                <option value="2019/2020">2019/2020</option>
                <option value="2020/2021">2020/2021</option>
                <option value="2021/2022">2021/2022</option>
                <option value="2022/2023">2022/2023</option>
              </select>
            </div>
            <div class="col-md-3">
              <select name="semester" class="form-select" required>
                <option value="">Semester</option>
                <option value="First">First</option>
                <option value="Second">Second</option>
              </select>
            </div>
            <div class="col-md">
              <button name="submit" type="submit" class="btn btn-primary">View</button>
            </div>
          </div>
          <div class="row gx-3 mb-3">
            <table class="table table-striped table-dark">
              <thead>
                <tr>
                  <th scope="col">Student ID</th>
                  <th scope="col">Student Name</th>
                  <th scope="col">Subject</th>
                  <th scope="col">Units</th>
                  <th scope="col">Prelim</th>
                  <th scope="col">Midterm</th>
                  <th scope="col">Finals</th>
                  <th scope="col">Final Grade</th>
                  <th scope="col">Average</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if ($result->num_rows > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                      echo "<tr>";
                      echo "<td>".$row['studentid']."</td>";
                      echo "<td>".$row['studentname']."</td>";
                      echo "<td>".$row['subject']."</td>";
                      echo "<td>".$row['units']."</td>";
                      echo "<td>".$row['prelim']."</td>";
                      echo "<td>".$row['midterm']."</td>";
                      echo "<td>".$row['finals']."</td>";
                      echo "<td>".$row['finalgrades']."</td>";
                      echo "<td>".$row['average']."</td>";
                      echo "<td>".$row['status']."</td>";
                      echo "</tr>";
                  }
                  } else {
                      echo "<tr>";
                      echo "<td colspan='10'>";
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
  </div>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>
