<?php
if(isset($_POST['submit'])){
  $file = $_FILES['file']['tmp_name'];
  include '../vendor/autoload.php';
  
  $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
  $worksheet = $spreadsheet->getActiveSheet();

  // Get starting row and column from textboxes
  $startRow = isset($_POST['startRow']) ? $_POST['startRow'] : 1;
  $startCol = isset($_POST['startCol']) ? $_POST['startCol'] : 'A';

  // Convert column letter to index (e.g. A -> 1, B -> 2, etc.)
  $startColIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($startCol);

  $rows = [];

  echo \PhpOffice\PhpSpreadsheet\Spreadsheet::VERSION;
  foreach($worksheet->getRowIterator($startRow) as $row){
    $rowData = $row->toArray(null, false, false);
    // Skip columns before the starting column
    $rowData = array_slice($rowData, $startColIndex - 1);
    $rows[] = $rowData;
  }

  include '../config.php';

  foreach($rows as $row){
    $studentid = $row[0];
    $section = $row[1];
    $sql = "SELECT 1 FROM students WHERE studentid='$studentid' LIMIT 1";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      $sql = "UPDATE students SET section='$section' WHERE studentid='$studentid' AND EXISTS (SELECT 1 FROM students WHERE studentid='$studentid' LIMIT 1)";
      $conn->query($sql);
    }
  }

  $conn->close();
}
?>
<form method="post" enctype="multipart/form-data">
  <input type="file" name="file" id="file"><br><br>
  Starting row: <input type="text" name="startRow" value="1"><br>
  Starting column: <input type="text" name="startCol" value="A"><br><br>
  <input type="submit" name="submit" value="Upload">
</form>
