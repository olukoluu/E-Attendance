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
        <link rel="stylesheet" href="/template/styles/dashboard.css" />

        <link rel="stylesheet" href="/template/boostrap/css/bootstrap.min.css" />
        <script defer src="/template/boostrap/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
        <title>Document</title>
    </head>

    <body class="d-flex position-relative">

        <?php
        include_once "hodsidenav.php";
        ?>

        <main class="p-md-4 pt-0 w-100">
            <div class="p-3 pt-md-0 d-flex justify-content-between align-items-center pb-2 border-bottom">
                <h4 class="">Welcome back, HOD</h4>
                <i class="bi bi-list d-block d-md-none" id="menuBtn" style="font-size: 40px"></i>
            </div>


            <div class="container">

                <div class="container" style="width: 100%; margin-top: 20px;">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">


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
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM courses";
                            $stmt = mysqli_query($conn,$sql);

                            while($row = mysqli_fetch_array($stmt)){
                                    echo '
                            <tr>
                                <td>'.$row['id'].'</td>
                                <td>'.$row['course_code'].'</td>
                                <td>'.$row['course_title'].'</td>
                                <td>
                                    <a class="btn btn-success" href="assigncourse.php" role="button">Assign</a>
                                </td>

                            </tr>';
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