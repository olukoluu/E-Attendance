<?php
$servername = "localhost";
$username = "root";  // Replace with your DB username
$password = "";      // Replace with your DB password
$dbname = "university";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
session_start();

// Handle form submission   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pf_number = $_POST['pf_number'];
    $password = $_POST['password'];

    // Prepare and execute SQL to get lecturer details
    $stmt = $conn->prepare("SELECT id, name, email, password FROM lecturers WHERE pf_number = ?");
    $stmt->bind_param("i", $pf_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $lecturer = $result->fetch_assoc();
        
        // Verify password (ensure password is hashed in the DB using password_hash())
        if (password_verify($password, $lecturer['password'])) {
            // Store lecturer ID in session
            $_SESSION['lecturer_id'] = $lecturer['id'];
            header('Location: dashboard.php');
            exit;
        } else {
            $error_message = "Invalid PF Number or Password!";
        }
    } else {
        $error_message = "Invalid PF Number or Password!";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecturer Login</title>
</head>
<body>

<h2>Lecturer Login</h2>

<?php
if (!empty($error_message)) {
    echo "<p style='color:red;'>$error_message</p>";
}
?>

<form method="POST" action="">
    <label for="pf_number">PF Number:</label>
    <input type="text" id="pf_number" name="pf_number" required><br><br>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    
    <input type="submit" value="Login">
</form>

</body>
</html>
