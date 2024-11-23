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

        <link rel="stylesheet" href="template/boostrap/css/bootstrap.min.css" />
        <script defer src="template/boostrap/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
        <title>Attendance</title>
    </head>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

    <body class="d-flex position-relative">

        <?php
        include_once "lecturersidenav.php";

        ?>


        <div class="container">

            <div class="container" style="width: 100%; margin-top: 40px;">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row justify-content-between align-items-center">
                            <h2 class="col-sm-6" style="font-size: 40px;">Attendance</h2>
                            <!-- <form class="col-sm-4" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                                <div class="input-group">
                                    <input type="number" name="matric_no" id="matric_no" class="form-control border-secondary">
                                    <button class="btn btn-outline-success">Search</button>
                                </div>
                            </form> -->
                        </div>
                    </div>
                </div>

                <form class="" action="attendance_process.php" method="post">
                    <div class=" d-flex justify-content-between p-3">
                        <h4><?php echo $_GET['course_code']; ?></h4>
                        <input type="hidden" name="course_id" value="<?php echo $_GET['course_id']; ?>">
                        <?php
                        $query = "SELECT DISTINCT week as marked_week FROM attendance WHERE course_id = ?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param('i',  $_GET['course_id']);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        $marked_weeks = [];
                        while ($row = $result->fetch_assoc()) {
                            $marked_weeks[] = $row['marked_week'];
                        }
                        echo '<div>';
                        echo '<label for="week" class="me-2">Select Week: </label>';
                        echo '<select name="week" id="week" required>';

                        for ($i = 1; $i <= 10; $i++) {
                            if (!in_array($i, $marked_weeks)) {
                                echo "<option value='$i'>Week $i</option>";
                            }
                        }

                        echo '</select>';
                        echo '</div>';
                        mysqli_stmt_close($stmt);
                        ?>

                    </div>

                    <table class="table">
                        <thead class="table-custom-success">
                            <tr style="color: white;">
                                <th>#</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Matric No</th>
                                <th>Email</th>
                                <th>Check</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $sql = "SELECT * FROM students_bio_data WHERE level = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param('i', $_GET['level']);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            $sn = 1;
                            while ($row = $result->fetch_array()) {
                                echo '
                        <tr>
                            <td>' . $sn . '</td>
                            <td>' . $row['first_name'] . '</td>
                            <td>' . $row['last_name'] . '</td>
                            <td>' . $row['matric_number'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="studentsid[]" id="" type="checkbox" value="' . $row['matric_number'] . '" aria-label="Text for screen reader">
                                    </label>
                                </div>
                            </td>
                        </tr>
                           ';
                                $sn++;
                            }

                            mysqli_stmt_close($stmt);
                            ?>
                        </tbody>
                    </table>
                    <button class="btn btn-secondary px-3 p-2">Submit</button>
                </form>
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