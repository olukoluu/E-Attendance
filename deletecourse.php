<?php
ob_start();
include_once('connect.php');
session_start();

$lecturer_id = $_POST['lecturer_id'];
$lecturer_name = $_POST['lecturer_name'];
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

        <div class="container" style="background-color: #DBFFDB; width: 65%; height: 100vh; margin-top: 0px; padding: 30px;">

            <head>
                <h1 style="font-size: 30px; margin-bottom: -40px;">Delete Course</h1>
            </head>
            <br>
            <br>

            <form class="" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class=" d-flex flex-column gap-4 px-4 pb-4 mb-5" style="border: gray solid 2px; border-radius: 1px; height: fit-content; margin: 20px 0;">
                    <label class="form-label fs-4" for="course">Course</label>
                    <select name="course" id="course" style="border: none; border-bottom: solid 2px gray; background-color: transparent; width: 100%;">
                        <option value=""> Select Course</option>
                        <?php
                        $sql = "SELECT courses.id, courses.course_code, courses.course_title, lecturer_course.course_id, lecturer_course.lecturer_id FROM courses LEFT JOIN lecturer_course ON courses.id = lecturer_course.course_id WHERE lecturer_course.lecturer_id = ?;";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $lecturer_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while ($row = $result->fetch_array()) {
                            echo '
                                    <option value="' . $row['id'] . '">' . $row['course_code'] . ': ' . $row['course_title'] . '</option>
                        ';
                        }
                        mysqli_stmt_close($stmt);
                        ?>
                    </select>
                </div>
                <div class=" d-flex flex-column gap-4 px-4 pb-4 mb-5" style="border: gray solid 2px; border-radius: 1px; height: fit-content; margin: 20px 0;">
                    <label class="form-label fs-4" for="course_code">Lecturer</label>
                    <input type="text" name="lecturer_name" value="<?php echo $lecturer_name; ?>" readonly style=" border: none; border-bottom:  solid 2px gray; background-color: transparent; width: 100%;">
                </div>

                <button type="submit" name="delete" class="btn btn-success px-3" style=" justify-self: center;">Delete</button>
            </form>
        </div>
        <?php

        if (isset($_POST['delete'])) {

            $sql = "DELETE FROM lecturer_course WHERE course_id = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $_POST['course'],);
            if ($stmt->execute()) {
                header('Location: lecturer.php');
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
    </script>

    </html>

<?php
    mysqli_close($conn);
} else {
    header("Location: login.php");
}
?>