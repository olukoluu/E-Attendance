<?php
include_once('connect.php');
session_start();

$last_name = $_SESSION['LName'];
$course_id = $_GET['course_id'];
$pfn = $_SESSION['pfnum'];

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
        <title>Attendance Report</title>
    </head>

    <body class="d-flex position-relative">

        <?php
        include_once "lecturersidenav.php";
        ?>

        <div class="container-fluid p-4 mt-4">
            <h2>Attendance Report</h2>
            <div class=" d-flex justify-content-between p-3">

                <h4><?php echo $_GET['course_code']; ?></h4>
                <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
                <select name="week" class=" me-4 p-2 fw-bold" id="week" onchange="changeWeek(this.value)">
                    <option value="">Select Week</option>
                    <option value="1">Week 1</option>
                    <option value="2">Week 2</option>
                    <option value="3">Week 3</option>
                    <option value="4">Week 4</option>
                    <option value="5">Week 5</option>
                    <option value="6">Week 6</option>
                    <option value="7">Week 7</option>
                    <option value="8">Week 8</option>
                    <option value="9">Week 9</option>
                    <option value="10">Week 10</option>
                </select>
            </div>


            <table class="table">
                <thead class="table-custom-success">
                    <tr style="color: white;">
                        <th>S/N</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Matric No</th>
                        <th>Remark</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                </tbody>
            </table>
        </div>
    </body>
    <script>

        function changeWeek(week) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);

            let output = '';

            let i = 1;
         data.forEach(element => {
            output += `
            <tr>
        <td>${i}</td>
        <td>${element['first_name']}</td>
        <td>${element['last_name']}</td>
        <td>${element['matric_number']}</td>
        <td>${element['matric_number'] = `<? $course_id?> `? 'PRESENT': 'ABSENT'}</td>
    </tr>
            `;
            i++;
         });
            document.getElementById("tbody").innerHTML = output == ''? 'No Report for this week': output;
        }
    };
    xmlhttp.open("GET", "process.php?week=" + week + "&course_id=" + <?php echo $course_id; ?>, true);
    xmlhttp.send();
}
    </script>

    </html>
<?php
    mysqli_close($conn);
} else {
    header("Location: login.php");
}
?>