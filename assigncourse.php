<?php
ob_start();
include_once('connect.php');
session_start();

$course_id = $_POST['course_id'];
$course_title = $_POST['course_title'];
$course_code = $_POST['course_code'];
$course_level = $_POST['course_level'];

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

        <div class="container" style="background-color: #DBFFDB; width: 65%; height: 700px; margin-top: 0px; padding: 30px; height: fit-content;">

            <head>
                <h1 style="font-size: 30px; margin-bottom: -40px;">Assign Courses</h1>
            </head>
            <br>
            <br>

            <form class="" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class=" d-flex flex-column gap-4 px-4 pb-4 mb-5" style="border: gray solid 2px; border-radius: 1px; height: fit-content; margin: 20px 0;">
                    <label class="form-label fs-4" for="lecturer_id">Lecturer</label>
                    <select name="lecturer_id" id="lecturer_id" style="border: none; border-bottom: solid 2px gray; background-color: transparent; width: 100%;">
                        <option value=""> Select Lecturer</option>
                        <?php
                        $sql = "SELECT lecturers.id, lecturers.first_name, lecturers.last_name , lecturers.pfn FROM lecturers LEFT JOIN lecturer_course ON lecturers.id = lecturer_course.lecturer_id AND lecturer_course.course_id = ? WHERE lecturer_course.lecturer_id IS NULL AND lecturers.is_hod = 0;";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $course_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while ($row = $result->fetch_array()) {
                            echo '
                                    <option value="' . $row['id'] . '">' . $row['last_name'] . ' ' . $row['first_name'] . '</option>
                        ';
                        }
                        mysqli_stmt_close($stmt);
                        ?>
                    </select>
                </div>
                <div class=" d-flex flex-column gap-4 px-4 pb-4 mb-5" style="border: gray solid 2px; border-radius: 1px; height: fit-content; margin: 20px 0;">
                    <label class="form-label fs-4" for="course_code">Course</label>
                    <input type="text" name="course_code" value="<?php echo $course_code . ': ' . $course_title; ?>" readonly style=" border: none; border-bottom:  solid 2px gray; background-color: transparent; width: 100%;">
                </div>

                <div class=" d-flex flex-column gap-4 px-4 pb-4 mb-5" style="border: gray solid 2px; border-radius: 1px; height: fit-content; margin: 20px 0;">
                    <label for="level" class="fs-4">Level</label>
                    <input type="text" name="level" id="level" value="<?php echo $course_level; ?>" style="border: none; border-bottom:  solid 2px gray; background-color: transparent; width: 100%;"></input>
                </div>
                <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">

                <button type="submit" name="assign" class="btn btn-success px-3" style=" justify-self: center;">Assign</button>
            </form>
        </div>
        <?php

        if (isset($_POST['assign'])) {

            $sql = "INSERT INTO lecturer_course (lecturer_id, course_id) VALUES (?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $_POST['lecturer_id'], $_POST['course_id'],);
            if ($stmt->execute()) {
                header('Location: hoddashboard.php');
                die();
            }
        }
        ?>

    </body>
    <script>
        var menuBtn = document.getElementById('menuBtn');
        var mobileNav = document.getElementById('mobileNav');
        // mobileNav.classList.add("menuOpen")
        menuBtn.addEventListener('click', toggleMenu);

        function toggleMenu() {
            mobileNav.classList.toggle("menuOpen");
        }

        // function myFunction() {
        //     var x = document.getElementById("courses");
        //     let y = x.options[x.selectedIndex].getAttribute('data-level');

        //     document.getElementById("demo").innerHTML = y;
        // }
    </script>

    </html>

<?php
    mysqli_close($conn);
} else {
    header("Location: login.php");
}
?>