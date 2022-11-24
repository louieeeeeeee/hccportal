<?php session_start(); ?>
<head>
<meta charset="UTF-8">
  <title>HCC Portal</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/plugins/bootstrap.min.css" type="text/css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <script src="../assets/plugins/bootstrap.bundle.min.js" type="text/javascript"></script>
  <script src="../assets/plugins/sweetalert.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
  <script src="../assets/js/scripts.js"></script>

</head>
<nav class="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" id="username" style="position:relative; left:20px;bottom:5%;" href="welcome.php"> <?php echo  $_SESSION['username']; ?> </a>
    <a class="nav-link link-light" id="username" style="bottom:5%;" >
      <span id="clock"></span>
    </a>
  </div>
</nav>
<script>
var clockElement = document.getElementById('clock');

    function clock() {
        var date = new Date();
        clockElement.textContent = date.toLocaleString();;
    }

    setInterval(clock, 100);

if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
