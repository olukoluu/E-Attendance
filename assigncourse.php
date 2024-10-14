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
                <a class="nav-link active" aria-current="page" href="courses.html">
                    <img src="images/courses.png" alt="dashboard" style="width: 25px; padding-top: 20px;" />
                    <p>Courses</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="lecturer.html" class="nav-link"><img src="images/classes.png" alt="profile"
                        style="width: 25px; padding-top: 20px;" />
                    <p>Lecturers</p>

                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link"><img src="images/report.png" alt="report" style="width: 25px; padding-top: 20px;" />
                    <p>Sign out</p>
                </a>
            </li>

        </ul>
    </aside>

    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    
    <body>
        <br>
        <br>
        <div class="container" style="background-color: #DBFFDB; width: 65%; height: 700px; margin-top: 30px; padding: 30px; height: fit-content;">
    
            <head>
                <h1 style="font-size: 30px; margin-bottom: -40px;">Assign Courses</h1>
            </head>
            <br>
            <br>
    
            <div class="col-md-sm-12"
                style="border: gray solid 2px; border-radius: 1px; height: fit-content; margin-top: 20px; margin-bottom: 20px;">
                <div class="row">
                    <div class="col-md-sm-12" style="padding-left: 30px; padding-top: 5px; padding-right: 30px;">
                        <h1 style="font-size: 20px;">Lecturers</h1>
                        <br>
                        <p>
                            <input type="Lecturer" placeholder="PF Number"
                                style="width: 100%; background-color: transparent; border: none; border-bottom: 2px solid gray;">
                        </p>
                    </div>
                </div>
            </div>
            <br>
            <br>

    
            <div class="col-md-sm-12"style="border: gray solid 2px; border-radius: 1px; height: fit-content; margin-top: 20px; margin-bottom: 20px;">
                <div class="row">
                    <div class="col-md-sm-12" style="padding-left: 30px; padding-top: 5px; padding-right: 30px;">
                        <h1 style="font-size: 20px;">Course Code</h1>
                        <br>
                        <p>
                            <input type="Course Code" placeholder="Course Code"
                                style="width: 100%; background-color: transparent; border: none; border-bottom: 2px solid gray;">
                        </p>
                        
                    </div>
                </div>
            </div>
            <br>
            <br>
    
            <div class="col-md-sm-12"
                style="border: gray solid 2px; border-radius: 1px; height: fit-content; margin-top: 20px; margin-bottom: 20px;">
                <div class="row">
                    <div class="col-md-sm-12" style="padding-left: 30px; padding-top: 5px; padding-right: 30px;">
                        <h1 style="font-size: 20px;">Course Title</h1>
                        <br>
                        <p>
                            <input type="Course Title" placeholder="Course Title"
                                style="width: 100%; background-color: transparent; border: none; border-bottom: 2px solid gray;">
                        </p>
                    </div>
                </div>
            </div>
            <br>
            <br>

            <div class="col-md-sm-12"
                style="border: gray solid 2px; border-radius: 1px; height: fit-content; margin-top: 20px; margin-bottom: 20px;">
                <div class="row">
                    <div class="col-md-sm-12" style="padding-left: 30px; padding-top: 5px; padding-right: 30px;">
                        <h1 style="font-size: 20px;">Level</h1>
                        <br>
                        <p>
                            <input type="Level" placeholder="Level"
                                style="width: 100%; background-color: transparent; border: none; border-bottom: 2px solid gray;">
                        </p>
                    </div>
                </div>
            </div>

            <br>
            <br>

            <button type="button" class="btn btn-success" style="margin-bottom: 30px; justify-self: center;">Submit</button>
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