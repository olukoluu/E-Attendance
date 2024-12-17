<?php  
    include_once('connect.php');
    session_start();

    if(isset($_POST['submit'])) {
        // Capture the fingerprint ID from the form (submitted by the fingerprint reader)
        $fingerprintID = $_POST['fingerprint_id'];

        // Look up the student by their fingerprint ID
        $sql = "SELECT * FROM students WHERE fingerprint_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $fingerprintID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                // Fetch student details
                $matricNum = $row['MatricNum'];
                $studentName = $row['Name'];
                $programme = $row['Programme'];

                echo "Matric Number: " . $matricNum . "<br>";
                echo "Student Name: " . $studentName . "<br>";
                echo "Programme: " . $programme . "<br>";

                // Insert the student's details into the attendance table
                $insertSql = "INSERT INTO attendance (MatricNum, Name, Programme) VALUES (?, ?, ?)";
                $insertStmt = mysqli_prepare($conn, $insertSql);
                mysqli_stmt_bind_param($insertStmt, "sss", $matricNum, $studentName, $programme);

                if(mysqli_stmt_execute($insertStmt)){
                    echo "Attendance recorded successfully.<br>";
                } else {
                    echo "Error: Could not record attendance.<br>";
                }
            }
        } else {
            echo "Fingerprint not recognized. You are not registered.";
        }
    }

    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form name="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> ">
        <h3>Scan your fingerprint to record attendance</h3>
        <!-- Assuming the fingerprint reader captures a biometric ID and submits it via this input -->
        <input type="hidden" name="fingerprint_id" id="fingerprint_id" value="captured_fingerprint_id">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
