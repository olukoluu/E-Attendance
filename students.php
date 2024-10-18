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
        <?php
        include_once "lecturersidenav.php";
        ?>
        <div class="container">

            <div class="container" style="width: 100%; margin-top: 40px;">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2 style="font-size: 40px;">Students</h2>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-box" style="float: right;"></div>
                                <h2 style="font-size: 20px; margin-top: 20px; margin-left: 400px;">
                                    <input type="Search" placeholder="Search...">
                                    <i class='bx bxs-lock-alt' style="size: 10px;"></i>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <br>
            <br>

            <table class="table" style="max-width: 100%;">
                <thead class="table-custom-success">
                    <tr style="color: white;">
                        <th>#</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Matric No</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Nimah</td>
                        <td>Adeleke</td>
                        <td>2024001</td>
                        <td>nimah@gmail.com</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Peter</td>
                        <td>Last name</td>
                        <td>2024002</td>
                        <td>peter@gmail.com</td>
                    </tr>



                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Vincent</td>
                        <td>Last Name</td>
                        <td>2024003</td>
                        <td>vincent@gmail.com</td>

                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Emmanuel</td>
                        <td>Last Name</td>
                        <td>2024004</td>
                        <td>emmanuel@gmail.com</td>

                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Gabriel</td>
                        <td>Last Name</td>
                        <td>2024005</td>
                        <td>gabriel@gmail.com</td>

                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Precious</td>
                        <td>Last Name</td>
                        <td>2024006</td>
                        <td>precious@gmail.com</td>

                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Martin</td>
                        <td>Last Name</td>
                        <td>2024007</td>
                        <td>martin@gmail.com</td>

                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Uthman</td>
                        <td>Last Name</td>
                        <td>2024008</td>
                        <td>uthman@gmail.com</td>

                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Seun</td>
                        <td>Last Name</td>
                        <td>2024009</td>
                        <td>seun@gmail.com</td>

                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Precious</td>
                        <td>Last Name</td>
                        <td>2024010</td>
                        <td>precious@gmail.com</td>

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