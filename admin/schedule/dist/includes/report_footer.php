<div style="clear:both;"><br></div>  
<h4>Generated by:</h4>
<?php 
			include('../dist/includes/dbcon.php');
			$id=$_SESSION['theid'];
			$query=mysqli_query($con,"select * from faculty where facultyid = $id")or die(mysqli_error($con));
				 $row=mysqli_fetch_array($query);
				 if($id == '999999'){
					echo "<h3>Administrator</h3>";
				 }else{
					echo "<h3>$row[firstname] $row[lastname]<h3>";
				 }
				 