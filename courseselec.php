<?php  
    include_once('connect.php');
    session_start();
    
    $last_name = $_SESSION['LName'];
    $verified = $_SESSION['verified'];

    if($_SESSION['verified'] === true){
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles/dashboard.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css" />
    <script defer src="boostrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <title>Document</title>
</head>



<body class="d-flex position-relative">

    <aside
    class="side_nav d-none py-2 pt-4 text-center d-md-flex flex-column align-items-center border" 
    style="height: 100vh; width: fit-content" 
  >
    <a href="#" class="logo">
      <img src="images/logo.png" class="icon" alt="" style="width: 40px" />
    </a>
    <ul class="nav flex-column mt-4 h-100">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="teacherdashboard.html">
          <img src="images/dashboard.png"  alt="dashboard" style="width: 25px; padding-top: 20px;"   />
          <p>Dashboard</p>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="attendance.html">
          <img
            src="images/attendance.png"
            alt="attendance"
            style="width: 25px; padding-top: 20px;"
          />
          <p>Attendance</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="courseslec.html" class="nav-link"
          ><img src="images/classes.png" alt="profile" style="width: 25px; padding-top: 20px;" />
          <p>Courses</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link"
          ><img src="images/report.png" alt="report" style="width: 25px; padding-top: 20px;"/>
          <p>Sign out</p>
        </a>
      </li>
      
    </ul>
  </aside>


    <div class="container">

        <div class="container" style="width: 100%; margin-top: 40px;">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 style="font-size: 40px;">All Courses</h2>
                        </div>
                        <div class="col-sm-6">
                            <div class="input-box" style="float: right;"></div>
                            <h2 style="font-size: 20px; margin-top: 20px; margin-left: 400px;">
                                <input type="Search" placeholder="Search...">
                                <i class='bx bxs-lock-alt' style="size: 10px;"></i>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <br>
        <br>


        <table class="table">
            <thead class="table-custom-success">
                <tr>
                    <th>#</th>
                    <th>Course code</th>
                    <th>Course title</th>
                    <th>Status</th>
                    <td><b>PF Number</b></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>CSC 113</td>
                    <td>Introduction to computer science</td>
                    <td>Assigned</td>


                </tr>
                <tr>
                    <td>2</td>
                    <td>CSC 219</td>
                    <td>Python Programming</td>
                    <td>Assigned</td>

    </body>

<script>
    var menuBtn = document.getElementById('menuBtn');
    var mobileNav = document.getElementById('mobileNav');
    // mobileNav.classList.add("menuOpen")
    menuBtn.addEventListener('click', toggleMenu);
    function toggleMenu() {
    mobileNav.classList.toggle("menuOpen");
    }
                    
</script>

</html>


<?php 
    mysqli_close($conn); 
} else{
  header("Location: template/login.html");
}
 ?>
                    