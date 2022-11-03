<head>
<meta charset="UTF-8">
  <title>HCC Portal</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/plugins/bootstrap.min.css" type="text/css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <script src="../assets/plugins/bootstrap.bundle.min.js" type="text/javascript"></script>
  <script src="../assets/plugins/sweetalert.min.js"></script>
</head>
<nav class="navbar navbar-dark bg-dark transparent">
  <div class="container-fluid">
    <a class="navbar-brand fs-2" style="position:relative; left:20px;bottom:15px;" href="welcome.php"> HCC Portal </a>
    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle link-light" id="username" style="position:relative; bottom:25px;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo  $_SESSION['username']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="dropdown">
                         <li><a class="dropdown-item" href="Activities.php"   style="color:black;"><i class="bi bi-megaphone-fill"></i> Announcement</a></li>
            <li><a class="dropdown-item" href="studentprofile.php"  style="color:black;" ><i class="bi bi-person-fill"></i> Student Profile</a></li>
            <li><a class="dropdown-item" href="grades.php"   style="color:black;"><i class="bi bi-bar-chart-line-fill"></i> Grades</a></li>
            <li><a class="dropdown-item" href="billing.php"   style="color:black;"><i class="bi bi-receipt"></i> Billing</a></li>
            <hr />
            <li><a class="dropdown-item" href="logout.php"   style="color:black;"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
          </ul>
        </li>
  </div>
</nav>
