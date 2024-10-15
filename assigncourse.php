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
        <title>Document</title>
    </head>



    <body class="d-flex position-relative">

        <?php
        include_once "hodsidenav.php";
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        </head>

        <body>
            <br>
            <br>
            <div class="container" style="background-color: #DBFFDB; width: 65%; height: 700px; margin-top: 30px; padding: 30px; height: fit-content;">

                <head>
                    <h1 style="font-size: 30px; margin-bottom: -40px;">Assign Courses</h1>
                </head>
                <br>
                <br>

                <div class="col-md-sm-12" style="border: gray solid 2px; border-radius: 1px; height: fit-content; margin-top: 20px; margin-bottom: 20px;">
                    <div class="row">
                        <div class="col-md-sm-12" style="padding-left: 30px; padding-top: 5px; padding-right: 30px;">
                            <h1 style="font-size: 20px;">Lecturers</h1>
                            <br>
                            <p>
                                <select name="PF NUMBER" id="PF NUMBER" style="border: none; border-bottom:  solid 2px gray; background-color: transparent; width: 100%;">
                                    <option value="" placeholder="Lecturers"> Select Lecturer</option>
                                    <option value="PF 4091">DR. FADEKPE SAMUEL</option>
                                    <option value="PF 7891">MRS. AMISU DEBORAH</option>
                                    <option value="PF 6723">MR. TOLU OLAKUNLE</option>
                                    <option value="PF 8910">MR. OBEKI GABRIEL</option>
                                </select>
                            </p>
                        </div>
                    </div>
                </div>
                <br>
                <br>

                <div class="col-md-sm-12" style="border: gray solid 2px; border-radius: 1px; height: fit-content; margin-top: 20px; margin-bottom: 20px;">
                    <div class="row">
                        <div class="col-md-sm-12" style="padding-left: 30px; padding-top: 5px; padding-right: 30px;">
                            <h1 style="font-size: 20px;">Course</h1>
                            <br>
                            <p>
                                <select id="courses" onchange="myFunction()" style="border: none; border-bottom:  solid 2px gray; background-color: transparent; width: 100%;">
                                    <option value="" placeholder="Lecturers"> Select Courses</option>
                                    <option value="CSC 113" data-level="100">CSC 113: INTRODUCTION TO COMPUTER SCIENCE</option>
                                    <option value="csc 219" data-level="200">CSC 219: PYTHON PROGRAMMING </option>
                                    <option value="CSC 305" data-level="300">CSC 305: WEB DEVELOPMENT</option>
                                    <option value="CSC 225" data-level="200">CSC 225: DATA STRUCTURE</option>
                                    <option value="CSC 217" data-level="200">CSC 217: OPERATING SYSTEMS </option>
                                    <option value="CSC 322" data-level="300">CSC 322: NETWORKING</option>
                                    <option value="CSC 411" data-level="400">CSC 411: INFORMATION SCIENCE</option>
                                    <option value="STA 129" data-level="100">STA 129: INTRODUCTION TO STATISTICS </option>
                                    <option value="CSC 429" data-level="400">CSC 429: HUMAN COMPUTER INTERACTION</option>
                                    <option value="CSC 425" data-level="400">CSC 425: INTRODUCTION TO CYBERSECURITY</option>
                                </select>
                            </p>
                        </div>
                    </div>
                </div>
                <br>
                <br>


                <div class="col-md-sm-12" style="border: gray solid 2px; border-radius: 1px; height: fit-content; margin-top: 20px; margin-bottom: 20px;">
                    <div class="row">
                        <div class="col-md-sm-12" style="padding-left: 30px; padding-top: 5px; padding-right: 30px;">
                            <h1 style="font-size: 20px;">Level</h1>
                            <br>
                            <p id="demo" style="border: none; border-bottom:  solid 2px gray; background-color: transparent; width: 100%;">
                                <input id="Level" type="Level" placeholder="Level" style="width: 100%; background-color: transparent; border: none; border-bottom: 2px solid gray;">

                            </p>
                        </div>
                    </div>
                </div>

                <br>
                <br>

                <button type="button" class="btn btn-success" style="margin-bottom: 30px; justify-self: center;">Submit</button>
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

            function myFunction() {
                var x = document.getElementById("courses");
                let y = x.options[x.selectedIndex].getAttribute('data-level');

                document.getElementById("demo").innerHTML = y;
            }
        </script>

        </html>

    <?php
    mysqli_close($conn);
} else {
    header("Location: template/login.html");
}
    ?>