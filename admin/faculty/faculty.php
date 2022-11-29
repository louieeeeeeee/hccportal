<?php
include '../../config.php';
session_start();
error_reporting(0);

if (!($_SESSION['role'] == 'Admin')) {
  header("Location: ../../index.php");
}

/** DELETE CONDITION */
if(isset($_POST['facultyDelete'])) {

  $result = mysqli_query($conn, "DELETE FROM faculty WHERE facultyid='".$_POST['facultyid']."'");
  $result = mysqli_query($conn, "DELETE FROM users WHERE userid='".$_POST['facultyid']."'");

  if ($result) {
    echo '<script type="text/javascript">setTimeout(function () {
      swal("Subject Succesfully Deleted!","","success");}, 200);
      </script>';
      echo '<script>console.log("asdasdsad")</script>';
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
              <th scope="col">Faculty ID</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Department</th>
              <th scope="col">Email</th>
              <th scope="col">Contact</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM faculty";
            $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0) {
              echo '<script type="text/javascript">setTimeout(function () {
                swal("Nothing found in Database.","","error");}, 200);</script>';
              }
            if ($result->num_rows > 0) {
              while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".$row['facultyid']."</td>";
                echo "<td>".$row['firstname']."</td>";
                echo "<td>".$row['lastname']."</td>";
                echo "<td>".$row['department']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['contact']."</td>";
                echo '<td>
                  <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#facultyUpdate'.$row['facultyid'].'"> Update</button>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#facultyDelete'.$row['facultyid'].'"> Delete</button>
                  </td>';
                  echo "</tr>";

                  include 'updateModal.php';
                  include 'deleteModal.php';
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </form>
  </div>
  <?php
  include("../footer.php");
  ?>
</body>
</html>
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
