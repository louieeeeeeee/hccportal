<?php
include '../../config.php';
session_start();
error_reporting(0);

if (!($_SESSION['role'] == 'Student')) {
  header("Location: ../../index.php");
}

$id = $_SESSION['theid'];
$sql = "select * from billing where studentid = '$id' and datecreated = (SELECT MAX(datecreated) FROM billing)";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
  $row = mysqli_fetch_assoc($result);
} 
?>
    <!DOCTYPE html>
    <html lang="en">
    <body>
      <?php
      include("../header.php");
      ?>

      <div class="container" method="POST" action="" enctype="multipart/form-data">
        <div class="h-100">
        <div class="row">
          <label class="small mb-1 fw-bold">Student ID: <?php echo $row['studentid']; ?></label>
                <div class="col-md-6">
                  <br />
                  <table class="table table-sm">
                    <tbody>
                      <tr><th scope="row">TUITION FEE</th>                 <td><?php echo $row['tuitionfee']; ?></td></tr>
                      <tr><th scope="row">LEARNING AND INSTRUCTIONAL</th>  <td><?php echo $row['learnandins']; ?></td></tr>
                      <tr><th scope="row">REGISTRATION FEE</th>            <td><?php echo $row['regfee']; ?></td></tr>
                      <tr><th scope="row">COMPUTER PROCESSING FEE</th>     <td><?php echo $row['compprossfee']; ?></td></tr>
                      <tr><th scope="row">GUIDANCE AND COUNSELING</th>     <td><?php echo $row['guidandcouns']; ?></td></tr>
                      <tr><th scope="row">SCHOOLD ID FEE</th>              <td><?php echo $row['schoolidfee']; ?></td></tr>
                      <tr><th scope="row">STUDENT HANDBOOK</th>            <td><?php echo $row['studenthand']; ?></td></tr>
                      <tr><th scope="row">SCHOOL PUBLICATION</th>          <td><?php echo $row['schoolfab']; ?></td></tr>
                      <tr><th scope="row">INSURANCE</th>                   <td><?php echo $row['insurance']; ?></td></tr>

                    </tbody>
                  </table>
                </div>
                <div class="col-md-6">
                  <br />
                  <table class="table table-sm">
                    <tbody>
                      <tr><th scope="row">TOTAL ASSESSMENT</th>                    <td><?php echo $row['totalass']; ?></td></tr>
                      <tr><th scope="row">(Less) Discount/Scholar</th>                    <td><?php echo $row['discount']; ?></td></tr>
                      <tr><th scope="row">NET ASSESSED</th>                      <td><?php echo $row['netass']; ?></td></tr>
                      <tr><th scope="row">(Less) Cash/Cheque Payment</th>                <td><?php echo $row['cashcheckpay']; ?></td></tr>
                      <tr><th scope="row">OUTSTANDING BALANCE</th>                     <td><?php echo $row['balance']; ?></td></tr>
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>

<?php
include '../footer.php';
?>
      <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
      </script>
    </body>
    </html>
