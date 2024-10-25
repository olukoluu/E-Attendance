<?php
include_once('connect.php');
session_start();
$pfn = $_SESSION['pfnum'];

if ($_SESSION['verified'] === true) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="template/styles/dashboard.css" />
        <link rel="stylesheet" href="template/boostrap/css/bootstrap.min.css" />
        <script defer src="template/boostrap/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
        <title>Document</title>
    </head>

    <body class="d-flex position-relative">
        <?php include_once('lecturersidenav.php'); ?>
        <section class="p-4 w-100">
            <h3>Select A Course</h3>
            <div class="row row-cols-md-3 row-gap-4 mt-4 px-4">
                <?php
                $sql = "SELECT courses.id AS course_id, courses.course_code, courses.course_title, courses.level,GROUP_CONCAT(lecturers.pfn ORDER BY lecturers.pfn) AS pfn FROM courses LEFT JOIN lecturer_course ON courses.id = lecturer_course.course_id LEFT JOIN lecturers ON lecturer_course.lecturer_id = lecturers.id WHERE lecturers.pfn = ? GROUP BY courses.id ORDER BY pfn DESC";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $pfn);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_array()) {
                        echo '
              <form action="attendance.php">
              <input type="hidden" name="course_code" value="' . $row["course_code"] . '">
                <button class="card p-3" style="width: 100%">
                    <p>Course Title: ' . $row["course_title"] . '</p>
                    <p>Course Code: ' . $row["course_code"] . '</p>
                    <p>Level: ' . $row["level"] . '</p>
                </button>
              </form>
                        ';
                    }
                } else {
                    echo '<p class=" text-center mt-2">NO ASSIGNED COURSE YET</p>';
                }

                mysqli_stmt_close($stmt);
                ?>

            </div>
        </section>

    </body>

    </html>
<?php
    mysqli_close($conn);
} else {
    header("Location: login.php");
}
?>