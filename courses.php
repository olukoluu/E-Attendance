<?php
include_once('connect.php');
session_start();

if ($_SESSION['verified'] === true) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="template/styles/dashboard.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


    <link rel="stylesheet" href="template/boostrap/css/bootstrap.min.css" />
    <script defer src="template/boostrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <title>Document</title>
  </head>



  <body class="d-flex position-relative">

    <?php
    include_once "hodsidenav.php";
    ?>


    <div class="container">

      <div class="container" style="width: 100%; margin-top: 40px;">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-sm-6">
                <h2 style="font-size: 40px;">All Courses</h2>
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
            <?php
            $sql = "SELECT courses.id AS course_id, courses.course_code, courses.course_title,GROUP_CONCAT(lecturers.pfn ORDER BY lecturers.pfn) AS pfn FROM courses LEFT JOIN lecturer_course ON courses.id = lecturer_course.course_id LEFT JOIN lecturers ON lecturer_course.lecturer_id = lecturers.id GROUP BY courses.id ORDER BY pfn DESC";
            $stmt = mysqli_query($conn, $sql);

            $sn = 1;
            while ($row = mysqli_fetch_array($stmt)) {
              $assigned = !empty($row['pfn']) ? 'Assigned': 'Not Assigned';
              $pfn = !empty($row['pfn']) ? $row['pfn'] : 'Not Assigned';
              echo '
            <tr>
              <td>'.$sn.'</td>
              <td>'.$row['course_code'].'</td>
              <td>'.$row['course_title'].'</td>
              <td>'.$assigned.'</td>
              <td>'.$pfn.'</td>
            </tr>
              ';
              $sn++;
            }
            ?>
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
} else {
  header("Location: login.php");
}
?>