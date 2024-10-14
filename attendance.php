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
        <link rel="stylesheet" href="styles/dashboard.css" />

        <link rel="stylesheet" href="boostrap/css/bootstrap.min.css" />
        <script defer src="boostrap/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
        <title>Document</title>
    </head>

    <body class="d-flex position-relative">

        <aside class="side_nav d-none py-2 pt-4 text-center d-md-flex flex-column align-items-center border" style="height: 100vh; width: fit-content">
            <a href="#" class="logo">
                <img src="images/logo.png" class="icon" alt="" style="width: 40px" />
            </a>
            <ul class="nav flex-column mt-4 h-100">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="teacherdashboard.html">
                        <img src="images/dashboard.png" alt="dashboard" style="width: 25px; padding-top: 20px;" />
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="attendance.html">
                        <img src="images/attendance.png" alt="attendance" style="width: 25px; padding-top: 20px;" />
                        <p>Attendance</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link"><img src="images/report.png" alt="report" style="width: 25px; padding-top: 20px;" />
                        <p>Sign out</p>
                    </a>
                </li>

            </ul>
        </aside>

        <div class="container">

            <div class="container" style="width: 100%; margin-top: 40px;">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2 style="font-size: 40px;">Attendance</h2>
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
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Matric No</th>
                            <th>Email</th>
                            <th>Check</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Nimah</td>
                            <td>Adeleke</td>
                            <td>2024001</td>
                            <td>nimah@gmail.com</td>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="" id="" type="checkbox" value="checkedValue" aria-label="Text for screen reader">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Peter</td>
                            <td>Lastname</td>
                            <td>2024002</td>
                            <td>peter@gmail.com</td>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="" id="" type="checkbox" value="checkedValue" aria-label="Text for screen reader">

                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Vincent</td>
                            <td>Last Name</td>
                            <td>2024003</td>
                            <td>vincent@gmail.com</td>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="" id="" type="checkbox" value="checkedValue" aria-label="Text for screen reader">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Emmanuel</td>
                            <td>Last Name</td>
                            <td>2024004</td>
                            <td>emmanuel@gmail.com</td>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="" id="" type="checkbox" value="checkedValue" aria-label="Text for screen reader">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Gabriel</td>
                            <td>Last Name</td>
                            <td>2024005</td>
                            <td>gabriel@gmail.com</td>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="" id="" type="checkbox" value="checkedValue" aria-label="Text for screen reader">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Precious</td>
                            <td>Last Name</td>
                            <td>2024006</td>
                            <td>precious@gmail.com</td>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="" id="" type="checkbox" value="checkedValue" aria-label="Text for screen reader">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Martin</td>
                            <td>Last Name</td>
                            <td>2024007</td>
                            <td>martin@gmail.com</td>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="" id="" type="checkbox" value="checkedValue" aria-label="Text for screen reader">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Uthman</td>
                            <td>Last Name</td>
                            <td>2024008</td>
                            <td>uthman@gmail.com</td>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="" id="" type="checkbox" value="checkedValue" aria-label="Text for screen reader">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Seun</td>
                            <td>Last Name</td>
                            <td>2024009</td>
                            <td>seun@gmail.com</td>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="" id="" type="checkbox" value="checkedValue" aria-label="Text for screen reader">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Precious</td>
                            <td>Last Name</td>
                            <td>2024010</td>
                            <td>precious@gmail.com</td>
                            <td>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="" id="" type="checkbox" value="checkedValue" aria-label="Text for screen reader">
                                    </label>
                                </div>
                            </td>
                        </tr>
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