<?php

//import.php

include '../vendor/autoload.php';

$connect = new PDO("mysql:host=localhost;dbname=students", "root", "");

if($_FILES["import_excel"]["name"] != '')
{
	$allowed_extension = array('xls', 'csv', 'xlsx');
	$file_array = explode(".", $_FILES["import_excel"]["name"]);
	$file_extension = end($file_array);

	if(in_array($file_extension, $allowed_extension))
	{
		$file_name = time() . '.' . $file_extension;
		move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
		$file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
		$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

		$spreadsheet = $reader->load($file_name);

		unlink($file_name);

		$data = $spreadsheet->getActiveSheet()->toArray();

		foreach($data as $row)
		{
			$insert_data = array(
				':studentid'		=>	$row[0],
				':tuitionfee'		=>	$row[1],
				':learnandins'	=>	$row[2],
				':regfee'				=>	$row[3],
				':compprossfee'	=>	$row[4],
				':guidandcouns'	=>	$row[5],
				':schoolidfee'	=>	$row[6],
				':studenthand'	=>	$row[7],
				':schoolfab'		=>	$row[8],
				':insurance'		=>	$row[9],
				':totalass'			=>	$row[10],
				':discount'			=>	$row[11],
				':netass'				=>	$row[12],
				':cashcheckpay'	=>	$row[13],
				':balance'			=>	$row[14]
			);

			$query = "
			INSERT INTO billing
			(studentid, tuitionfee, learnandins, regfee, compprossfee, guidandcouns, schoolidfee, studenthand, schoolfab,
			insurance, totalass, discount, netass, cashcheckpay, balance)
			VALUES (:studentid, :tuitionfee, :learnandins, :regfee, :compprossfee, :guidandcouns, :schoolidfee, :studenthand, :schoolfab,
			:insurance, :totalass, :discount, :netass, :cashcheckpay, :balance)
			";

			$statement = $connect->prepare($query);
			$statement->execute($insert_data);
		}
		$message = '<script type="text/javascript">setTimeout(function () {
	    swal("Succesfully Uploaded!","","success");}, 200);</script>';
	}
	else
	{

		$message = '<script type="text/javascript">setTimeout(function () {
      swal("Only .xls .csv or .xlsx file allowed","","error");}, 200);</script>';
	}
}
else
{
	$message = '<script type="text/javascript">setTimeout(function () {
		swal("Please Select a File First!","","error");}, 200);</script>';
}

echo $message;

?>
