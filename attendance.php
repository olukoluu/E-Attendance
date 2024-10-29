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
        <title>Document</title>
    </head>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        /* input[type=number] {
            -moz-appearance: textfield;
        } */
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
                        <h4 class=""><?php echo $_GET['course_code']; ?></h4>
                    </div>
                </div>


                <br>
                <br>

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
                                        <input class="form-check-input" name="" id="" type="checkbox" value="checkedValue" aria-label="Text for screen reader">
                                    </label>
                                </div>
                            </td>
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