<?php
include '../../config.php';
session_start();
error_reporting(0);

if (!($_SESSION['role'] == 'Admin')) {
  header("Location: ../../index.php");
}

/** ADD ANNOUNCEMENT */
if(isset($_POST['addAnnouncement'])) {
  $txtduration = $_POST['txtduration'];
  $txttitle = $_POST['txttitle'];
  $txtcontent = $_POST['txtcontent'];

  $sql = "INSERT INTO activities (title,duration,caption) 
  VALUES ('$txttitle', '$txtduration', '$txtcontent')";
  $result = mysqli_query($conn, $sql);
      if ($result) {
        echo '<script type="text/javascript">setTimeout(function () {
          swal("Announcement Succesfully Registered!","","success");}, 200);</script>';
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
  <div class="container-fluid">
    <form method="POST" action="">
      <div class="row p-3 pt-4">
        <div class="col-5">
            <div class="col">
              <label class="fs-5 fw-bold">Title:</label>
              <div class="input-group input-group-lg">
              <input type="text" name="txttitle" class="form-control fw-bold" placeholder="Title" value="" required/>
            </div>            
            </div>
            <div class="col-5 pt-2">
              <label class="fs-5 fw-bold">Expiration Date:</label>
              <input type="date" name="txtduration" class="form-control" placeholder="Expiration Date" min="<?php echo date("Y-m-d"); ?>" value="<?php echo date('Y-m-d');?>" required/>
            </div>    
            <div class="col pt-2">
              <div class="form-floating">
                <textarea class="form-control" placeholder="Content" name="txtcontent" id="txtcontent" style="height: 220px"value="" required></textarea>
                <label for="txtcontent" class="fw-bold">Content</label>
              </div>
            </div>
          <div class="col pt-3">
          <div class="position-relative">
            <button type="submit" name="addAnnouncement" class="btn btn-primary btn-lg position-absolute top-0 start-50 translate-middle-x">Submit</button>
            </div>
          </div>
        </div>
        <div class="col pt-4">
        <form action="" method="POST">
        <table class="table table-striped table-primary table-hover p-2" id="table" style="table-layout:fixed;">
          <thead>
            <tr>
              <th style="width:50px;">Event ID</th>
              <th style="width:350px;">Title</th>
              <th scope="col">Duration</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM activities WHERE duration >= CURRENT_DATE()";
            $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0) {
              echo '<script type="text/javascript">setTimeout(function () {
                swal("Nothing found in Database.","","error");}, 200);</script>';
              }
            if ($result->num_rows > 0) {
              while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".$row['eventid']."</td>";
                echo "<td>".$row['title']."</td>";
                echo "<td>".$row['duration']."</td>";
                echo '<td>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#announcementUpdate'.$row['eventid'].'"> Update</button>
                </td>';
                echo "</tr>";
                
                include 'updateModal.php';
              }
            }
            ?>
          </tbody>
        </table>
    </form>
      </div>
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
