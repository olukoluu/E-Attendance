<?php  
    include_once('connect.php');
    session_start();
    
    if(isset($_SESSION['pfnum'])) {
      $last_name = $_SESSION['LName'];
      $pfn = $_SESSION['pfnum'];
      $email = $_SESSION['Email'];
      $verified = $_SESSION['verified'];
    } else {
      $name = "Guest";  // Default if the session variable isn't set
    }

    mysqli_close($conn);

    if($verified){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="template/styles/dashboard.css" />
    <link rel="stylesheet" href="template/boostrap/css/bootstrap.min.css" />
    <script defer src="template/boostrap/js/bootstrap.bundle.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <title>Dashboard</title>
  </head>
  <body class="d-flex position-relative">
 
<?php 
include_once "sidenav.php";
?>
    <main class="p-md-4 pt-0 w-100">
      <div class="p-3 pt-md-0 d-flex justify-content-between align-items-center pb-2 border-bottom">
        <h2 class="">Welcome, <?php echo $last_name; ?></h2>
        <i class="bi bi-list d-block d-md-none" id="menuBtn" style="font-size: 40px"></i>
      </div>

      <section class="mt-md-4 p-3">
        <h5>Upcoming Classes</h5>
        <div class="row row-cols-md-3 gap-4 justify-content-center mt-4">
          <div class="card p-3" style="width: 380px">
            <h6 class="fw-bold">CSC 201</h6>
            <p>Date: Jan 12, 2025</p>
            <p>Time: 12:00pm - 2:00pm</p>
          </div>
          <div class="card p-3" style="width: 380px">
            <h6 class="fw-bold">CSC 419</h6>
            <p>Date: Jan 15, 2025</p>
            <p>Time: 8:00am - 10:00am</p>
          </div>
          <div class="card p-3" style="width: 380px">
            <h6 class="fw-bold">CSC 112</h6>
            <p>Date: Jan 16, 2025</p>
            <p>Time: 10:00am - 12:00pm</p>
          </div>
        </div>
      </section>

      <section class="mt-4 p-3">
        <h5>Quick link</h5>
        <div class="row row-cols-3 gap-4 justify-content-center mt-4">
          <div class="card p-4" style="width: 380px">
            <h6>Take Attendance</h6>
            <p>
              Quickly mark attendance for your class. Ensure all students are
              accounted for.
            </p>
            
            <button class="p-3 submit-btn" ><link rel="stylesheet" href="fingerprint.php">Start Now</button>
          </div>
          <div class="card p-4" style="width: 380px">
            <h6>Edit Class Details</h6>
            <p>
              Modify class information including schedules, room and
              description.
            </p>
            <button class="p-3 submit-btn">Add Course</button>
          </div>
          <div class="card p-4" style="width: 380px">
            <h6>Update Attendance</h6>
            <p>Review and modify attendance records for accuracy.</p>
            <button class="p-3 submit-btn">Start Now</button>
          </div>
        </div>
      </section>

    </main>
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
<?php } else{
  header("Location: template/login.html");
} ?>