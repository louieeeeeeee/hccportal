<?php
include '../config.php';
session_start();
error_reporting(0);

if (!($_SESSION['role'] == 'Admin')) {
  header("Location: ../index.php");
}

$sql = "SELECT * FROM users WHERE role = 'Student'";
$result = mysqli_query($conn, $sql);

if (isset($_POST['delUser'])) {
  if(!empty($_SESSION['userID1'])){
    $sql = "DELETE FROM users WHERE id ='".$_SESSION['userID1']."' AND role = 'Student'";
    if ($conn->query($sql) === TRUE) {
      echo '<script type="text/javascript">setTimeout(function () {
        swal("User Succesfully Removed.","","success");}, 200);</script>';
        unset($_SESSION['userID1']);
        header("Refresh:1");
  } else {
    echo '<script type="text/javascript">setTimeout(function () {
      swal("Error Removing the user.","","error");}, 200);</script>';
  }
}else {
  echo '<script type="text/javascript">setTimeout(function () {
    swal("Select a User First.","","error");}, 200);</script>';
}
}
if (isset($_POST['findUser'])) {
  $searchRes = $_POST['searchRes'];
  $_SESSION['userID1'] = $searchRes;
  $sql = "SELECT * FROM users WHERE id ='".$_SESSION['userID1']."'  AND role = 'Student'";
  $result = mysqli_query($conn, $sql);
  if (!$result->num_rows > 0) {
    echo '<script type="text/javascript">setTimeout(function () {
      swal("No User Found in Database.","","error");}, 200);</script>';
      unset($_SESSION['userID1']);
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
    <form class="row" method="POST">
      <div class="col-xl" style="margin-top:4%;position:relative;">
        <center><label class="form-label" id="titlepos">Students</label></center>
        <div class="row">
          <div class="col-md-2">
            <input type="text" name="searchRes" class="form-control" placeholder="ID No. here" maxlength="8" value="" required/>
          </div>
          <div class="col-md-1">
            <button class="btn btn-primary float-start" type="submit" name="findUser">Search</button>
          </div>
        </div>
      <br />
      <div class="table-wrapper-scroll-y scrollbar">
        <table class="table table-striped table-dark" style="height: 5px !important;">
          <thead>
            <tr>
              <th scope="col" >ID #</th>
              <th scope="col" >Student Name</th>
              <th scope="col" >Year</th>
              <th scope="col" >Section</th>
              <th scope="col" >Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_array($result)) {
                  echo "<tr>";
                  echo "<td>".$row['id']."</td>";
                  echo "<td>".$row['lastname'].", ".$row['username']."</td>";
                  echo "<td>".$row['year']."</td>";
                  echo "<td>".$row['section']."</td>";
                  echo "<td> <a href='userdelete.php?id=" .$row['id']. "&user=student' class='del-btn btn btn-danger'>Delete</a> </td>";
                  echo "</tr>";
              }
              } else {
                  echo "<tr>";
                  echo "<td colspan='4'>";
                  echo "<center>No Data Found.</center>";
                  echo "</td>";
                  echo "</tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
      </div>
    </form>
  </div>
  <?php
    if(isset($_GET['m'])){ ?>
    <div class="flash-data" data-flashdata="<?php echo $_GET['m'];?>"></div>
<?php } ?>
  <script>

    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
  </script>
</body>
</html>
