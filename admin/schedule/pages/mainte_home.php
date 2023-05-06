<?php
session_start();
error_reporting(0);
if (!($_SESSION['role'] == 'Admin')) {
  header("Location: ../../../index.php");
}

include '../../../config.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Centered Big Square Buttons</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<style>
        body {
            background: url(../dist/img/temp.jpg) center/cover no-repeat;
            margin: 0;
            justify-content: center;
            font-family: Verdana, sans-serif;
            overflow-x: hidden;
            overflow-y: hidden;
            animation: fadeInAnimation ease 1s;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
        }
		.btn-sq-lg {
			width: 220px;
			height: 200px;
			border-radius: 25px;
			position: relative;
			overflow: hidden;
		}
		#btn-schedule{
			border-radius: 25px;
			color: #2596be;
		}
		.fa-6x {
			padding-top: 35px;
			position: absolute;
			top: 0;
			left: 50%;
			transform: translateX(-50%);
			color: #2596be;
			opacity: 0.8;
			transition: all 0.2s ease-in-out;
		}
		.btn-sq-lg:hover .fa-6x {
			transform: translate(-50%, -10%) scale(1.2);
			opacity: 1;
		}
		.btn-label {
			position: absolute;
			bottom: 0;
			left: 50%;
			transform: translateX(-50%);
			font-size: 20px;
			font-weight: bold;
			color: #2596be;
			opacity: 0.8;
			transition: all 0.2s ease-in-out;
		}
		.btn-sq-lg:hover .btn-label {
			transform: translate(-50%, 10%);
			opacity: 1;
		}
		body, html {
			height: 100%;
			margin: 0;
			padding: 0;
		}
		.container {
			display: flex;
			align-items: center;
			justify-content: center;
			height: calc(100% - 50px);
		}
		.navbar {
			margin-bottom: 0;
		}
		#clock {
            font: small-caps lighter 30px/150% "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
			color: black;
			font-weight: bold;
			position: absolute;
			top: 0;
			right: 0;
			padding: 10px;
		}
        #user {
            color: #2596be;
			font-size: 25px;
			font-weight: bold;
			position: absolute;
			top: 15px;
			left: 30px;;
			padding: 10px;
		}
		.navbar {
			background-color: transparent !important;
			border: none;
		}
		.back-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
  }
	</style>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
                <a class="navbar-brand fw-bold" id="user" href=""> <?php echo  $_SESSION['username']; ?> </a>
			</div>
			<a class="nav-link link-light" style="bottom:5%;" >
                <span class="fw-bold fs-4" id="clock"></span>
            </a>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
				<a href="pages/home.php">
					<button id="btn-schedule" class="btn btn-sq-lg mx-auto">
                        <i class="fas fa-calendar-alt fa-6x"></i>
						<div class="btn-label">School Year</div>
					</button>
				</a>
			</div>
			<div class="col-xs-4">
				<button id="btn-maintenance" class="btn btn-sq-lg mx-auto">
                    <i class="fas fa-clock fa-6x"></i>
					<div class="btn-label">Time</div>
				</button>
			</div>
			<div class="col-xs-4">
				<a href="pages/settings.php">
					<button id="btn-schedule2" class="btn btn-sq-lg mx-auto">
                        <i class="fas fa-map-marker-alt fa-6x"></i>
						<div class="btn-label">Room</div>
					</button>
				</a>	
			</div>
		</div>
	</div>
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<div class="back-button">
  <a href="../index.php">
    <button class="btn btn-primary btn-lg">Back</button>
  </a>
</div>

</body>
</html>

<div style="text-align: center">
              		<h4>Print Class Schedule
              		<a href="#searcht" data-target="#searcht" data-toggle="modal" class="dropdown-toggle btn btn-primary">
                     
                      Teacher				
                    </a>
                   <a href="#searchclass" data-target="#searchclass" data-toggle="modal" class="dropdown-toggle btn btn-success">
                     
                      Class				
                    </a>
                  
                   <a href="#searchroom" data-target="#searchroom" data-toggle="modal" class="dropdown-toggle btn btn-warning">
                     
                      Room				
                    </a>
                    </h4>
                </div

<div id="searcht" class="modal fade in" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
	  <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Search Faculty Schedule</h4>
              </div>
              <div class="modal-body">
			  <form class="form-horizontal" method="post" action="faculty_sched.php" target="_blank">
                
				<div class="form-group">
					<label class="control-label col-lg-2" for="name">Faculty</label>
					<div class="col-lg-10">
					<select class="select2" name="faculty" style="width:90%!important" required>
								  <?php 
								  
									$query2=mysqli_query($con,"select * from faculty order by lastname")or die(mysqli_error($con));
									  while($row=mysqli_fetch_array($query2)){
								  ?>
										<option value="<?php echo $row['facultyid'];?>"><?php echo $row['lastname'].", ".$row['firstname'];?></option>
								  <?php }
									
								  ?>
								</select>
					</div>
				</div> 
				
				
              </div><hr>
              <div class="modal-footer">
				<button type="submit" name="search" class="btn btn-primary">Display Schedule</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
			
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal--> 
 
 

 <div id="searchclass" class="modal fade in" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
	  <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Search Class Schedule</h4>
              </div>
              <div class="modal-body">
			  <form class="form-horizontal" method="post" action="class_sched.php" target="_blank">
                
				<div class="form-group">
					<label class="control-label col-lg-2" for="name">Class</label>
					<div class="col-lg-10">
					<select class="select2" name="class" style="width:90%!important" required>
								  <?php 
								  
									$query2=mysqli_query($con,"select * from cys")or die(mysqli_error($con));
									  while($row=mysqli_fetch_array($query2)){
								  ?>
										<option><?php echo $row['course'] . $row['year'] . $row['section'];?></option>
								  <?php }
									
								  ?>
								</select>
					</div>
				</div> 
				
				
              </div><hr>
              <div class="modal-footer">
				<button type="submit" name="search" class="btn btn-primary">Display Schedule</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
			
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal--> 
 
 <div id="searchroom" class="modal fade in" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
	  <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Search Room Schedule</h4>
              </div>
              <div class="modal-body">
			  <form class="form-horizontal" method="post" action="room_sched.php" target="_blank">
                
				<div class="form-group">
					<label class="control-label col-lg-2" for="name">Room</label>
					<div class="col-lg-10">
					<select class="select2" name="room" style="width:90%!important" required>
								  <?php 
								  
									$query2=mysqli_query($con,"select * from room order by room")or die(mysqli_error($con));
									  while($row=mysqli_fetch_array($query2)){
								  ?>
										<option><?php echo $row['room'];?></option>
								  <?php }
									
								  ?>
								</select>
					</div>
				</div> 
				
				
              </div><hr>
              <div class="modal-footer">
				<button type="submit" name="search" class="btn btn-primary">Display Schedule</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
			
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal--> 


<script>
var clockElement = document.getElementById('clock');
  function clock() {
    var date = new Date();
      clockElement.textContent = date.toLocaleString();;
    }
    setInterval(clock, 100);
</script>