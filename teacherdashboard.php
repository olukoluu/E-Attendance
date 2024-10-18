<?php
include_once('connect.php');
session_start();

$last_name = $_SESSION['LName'];
$verified = $_SESSION['verified'];
$pfn= $_SESSION['pfnum'] ;

if ($_SESSION['verified'] === true) {
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <title>Document</title>
  </head>

  <body class="d-flex position-relative">


    <?php
    include_once "lecturersidenav.php";
    ?>

    <main class="p-md-4 pt-0 w-100">
      <div class="p-3 pt-md-0 d-flex justify-content-between align-items-center pb-2 border-bottom">
        <h4 class="">Welcome back, <?php echo $last_name?></h4>
        <i class="bi bi-list d-block d-md-none" id="menuBtn" style="font-size: 40px"></i>
      </div>

      <section class="mt-md-4 mb-5 pt-3 pb-5">
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
      <section class="mt-md-5 pt-5">
        <h5>Asssigned Courses</h5>
        <div class="row row-cols-md-3 gap-4 justify-content-center mt-4">
        <?php
                                    $sql = "SELECT courses.id AS course_id, courses.course_code, courses.course_title, courses.level,GROUP_CONCAT(lecturers.pfn ORDER BY lecturers.pfn) AS pfn FROM courses LEFT JOIN lecturer_course ON courses.id = lecturer_course.course_id LEFT JOIN lecturers ON lecturer_course.lecturer_id = lecturers.id WHERE lecturers.pfn = ? GROUP BY courses.id ORDER BY pfn DESC";
                                
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("i", $pfn);
                                    $stmt->execute();
                                    
                                    $result = $stmt->get_result();
                                    // if($result = $stmt->get_result()){
                                         while ($row = $result->fetch_array()) {
                                        echo '
                                    <div class="card p-3" style="width: 380px">
                                    <p>Course Title: '.$row["course_title"].'</p>
                                    <p>Course Code: '.$row["course_code"].'</p>
                                    <p>Level: '.$row["level"].'</p>
                                  </div>
                        ';
                                    }
                                  //  }
                                  //  else {
                                  //   echo 'NO ASSIGNED COURSE YET';
                                  // }
                               
                                    mysqli_stmt_close($stmt);
                                    ?>  
        
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

<?php
  mysqli_close($conn);
} else {
  header("Location: template/login.html");
}
?>