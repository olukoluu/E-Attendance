<?php
include_once('connect.php');
session_start();

$last_name = $_SESSION['LName'];
$verified = $_SESSION['verified'];

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
        <title>Lecturer's page</title>
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
                        <?php
                        $sql = "SELECT lecturers.id, lecturers.first_name, lecturers.last_name, lecturers.email, GROUP_CONCAT(courses.course_code ORDER BY courses.course_code) AS courses FROM lecturers LEFT JOIN lecturer_course ON lecturers.id = lecturer_course.lecturer_id LEFT JOIN courses ON lecturer_course.course_id = courses.id WHERE lecturers.is_hod = 0 GROUP BY lecturers.id ORDER BY courses DESC";
                        $stmt = mysqli_query($conn, $sql);
                        $sn = 1;

                        while ($row = mysqli_fetch_array($stmt)) {
                            $courses  = !empty($row['courses']) ? $row['courses'] : 'No course';
                            echo '
                        <tr>
                            <td>' . $sn . '</td>
                            <td>' . $row['first_name'] . '</td>
                            <td>' . $row['last_name'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $courses . '</td>
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
    header("Location: template/login.html");
}
?>