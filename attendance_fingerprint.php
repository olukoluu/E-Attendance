<?php
// Database connection
$server = "localhost";
$user = "root";
$pass = "";
$db = "lecturer_att";

$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// This should come from the fingerprint scanner after verification
if (isset($_POST['fingerprint_id'])) {
    $fingerprint_id = $_POST['fingerprint_id'];

    // Fetch student b y fingerprint ID
    $sql = "SELECT * FROM students WHERE FingerPrint = '$fingerprint_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $student_id = $row['student_id'];

        // Insert attendance record with current timestamp
        $timestamp = date("Y-m-d H:i:s");
        $insert_sql = "INSERT INTO attendance (stu_mat, time_siged) VALUES ('$student_id', '$timestamp')";
        if (mysqli_query($conn, $insert_sql)) {
            echo "Attendance recorded for " . $row['name'] . " at " . $timestamp;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Student not found!";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System</title>
</head>
<body>
    <h2>Fingerprint Attendance</h2>
    <form action="dashboard.php" method="post">
        <label for="fingerprint_id">Fingerprint ID:</label>
        <input type="text" id="fingerprint_id" name="fingerprint_id">
        <input type="submit" value="Register Attendance">
    </form>
</body>
</html>
