<head>
  <meta charset="UTF-8">
  <title>HCC PORTAL</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/plugins/bootstrap.min.css" type="text/css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <script src="../assets/plugins/bootstrap.bundle.min.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="../assets/plugins/sweetalert.min.js"></script>
  <script src="../assets/plugins/jquery.min.js"></script>
  <script src="../assets/js/scripts.js"></script>
</head>
<nav class="navbar navbar-dark bg-dark transparent">
  <div class="container-fluid">
    <a class="navbar-brand fs-2" style="position:relative; left:20px;bottom:15px;" href="welcome.php"> HCC Portal </a>
    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle link-light" id="username" style="position:relative; bottom:25px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
           Welcome, Super  <?php echo  $_SESSION['username']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdown">
            <li><a class="dropdown-item" href="Activities.php"   style="color:black;"><i class="bi bi-megaphone"></i> Announcement</a></li>
            <li><a class="dropdown-item" href="facultymembers.php " style="color:black;"><i class="bi bi-person-fill" > </i> Faculty Members</a></li>
            <li><a class="dropdown-item" href="studentmembers.php " style="color:black;"><i class="bi bi-people-fill" > </i> Students Members</a></li>
            <li><a class="dropdown-item" href="userview.php"   style="color:black;"><i class="bi bi-clipboard-data"></i> User View</a></li>
            <li><a class="dropdown-item" href="registration.php" style="color:black"><i class="bi bi-person-plus" ></i> Registration</a></li>
            <li><a class="dropdown-item" href="subjects.php" style="color:black" ><i class="bi bi-journals" ></i> Subjects</a></li>
            <li><a class="dropdown-item" href="upload.php" style="color:black" ><i class="bi bi-upload" ></i> Upload</a></li>
            <hr />
            <li><a class="dropdown-item" href="logout.php" style="color:black"><i class="bi bi-box-arrow-right "></i> Logout</a></li>
        </li>
  </div>
</nav>
