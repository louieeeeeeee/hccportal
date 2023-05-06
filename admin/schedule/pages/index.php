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
            overflow-y: scroll;
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
			font-size: 25px;
			font-weight: bold;
			position: absolute;
			top: 10px;
			left: 20px;;
			padding: 10px;
		}
		.navbar {
			background-color: transparent !important;
			border: none;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<span class="navbar-brand" id="user">Administrator</span>
			</div>
			<a class="nav-link link-light" style="bottom:5%;" >
                <span class="fw-bold fs-4" id="clock"></span>
            </a>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-xs-4">
				<button id="btn-schedule" class="btn btn-sq-lg mx-auto">
					<i class="fas fa-calendar-alt fa-6x"></i>
					<div class="btn-label">Schedule</div>
				</button>
			</div>
			<div class="col-xs-4">
				<button id="btn-maintenance" class="btn btn-sq-lg mx-auto">
					<i class="fas fa-tools fa-6x"></i>
					<div class="btn-label">Maintenance</div>
				</button>
			</div>
			<div class="col-xs-4">
			

				<button id="btn-schedule2" class="btn btn-sq-lg mx-auto">
					<i class="fas fa-clock fa-6x"></i>
					<div class="btn-label">Settings</div>
				</button>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
<script>
var clockElement = document.getElementById('clock');
  function clock() {
    var date = new Date();
      clockElement.textContent = date.toLocaleString();;
    }
    setInterval(clock, 100);
</script>