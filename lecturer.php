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
    <link rel="stylesheet" href="styles/dashboard.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css" />
    <script defer src="boostrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <title>Lecturer's page</title>
</head>



<body class="d-flex position-relative">

    <aside class="side_nav d-none py-2 pt-4 text-center d-md-flex flex-column align-items-center border"
        style="height: 100vh; width: fit-content">
        <a href="#" class="logo">
            <img src="images/logo.png" class="icon" alt="" style="width: 40px" />
        </a>
        <ul class="nav flex-column mt-4 h-100">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="hoddashboard.html">
                    <img src="images/dashboard.png" alt="dashboard" style="width: 25px; padding-top: 20px;" />
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="courses.html"><img src="images/courses.png" alt="profile" style="width: 25px; padding-top: 20px;"/>
                    <p>Courses</p>
                </a>
            </li>
           
            <li class="nav-item">
                <a href="lecturer.html" class="nav-link"><img src="images/classes.png" alt="profile" style="width: 25px; padding-top: 20px;" />
                    <p>Lecturer</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><img src="images/report.png" alt="report" style="width: 25px; padding-top: 20px;" />
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
                        <h2 style="font-size: 40px;">All Lecturers</h2>
                    </div>
                    
            </div>
        </div>
        </div>
                

        <br>
        <br>

        
        <table class="table">
            <thead class="table-custom-success">
                <tr style="color: white;">
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Courses</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>johndoe@gmail.com</td>
                    <td>CSC 113, 419,</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Emily</td>
                    <td>Davis</td>
                    <td>emilydavis@gmail.com</td>
                    <td>CSC 304, 212</td>
                    
                    
                </tr>
                <tr>
                    <td>3</td>
                    <td>Adam</td>
                    <td>Sandler</td>
                    <td>adamsandler@gmail.com</td>
                    <td>CSC 312, 405</td>
                    
                    
                </tr>
                <tr>
                    <td>4</td>
                    <td>Chris</td>
                    <td>Middleton</td>
                    <td>chrismiddleton@gmail.com</td>
                    <td>CSC 111, 124</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Charles</td>
                    <td>Elton</td>
                    <td>charleselton1@gmail.com</td>
                    <td>CSC 201, 425</td>
                </tr>
            </tbody>
        </table>
    </div>



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