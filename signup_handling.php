<?php
session_start();
include_once('connect.php');
include_once('signup_function.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pfnum = $_POST['pfnum'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    $errors = [];

    if (is_input_empty($fname, $lname, $email, $pfnum, $pass, $cpass)) {
        $errors["input_empty"] = "Fill all fields!";
    }
    if (!is_password_same($pass, $cpass)) {
        $errors["password_different"] = "Password not the same!";
    }
    if (is_email_invalid($email)) {
        $errors["email_invalid"] = "Invalid Email!";
    }
    if (is_email_taken($conn, $email)) {
        $errors["email_taken"] = "Email already taken!";
    }
    if (is_pfn_taken($conn, $pfnum)) {
        $errors["pfn_taken"] = "Pfn already taken!";
    }

    if ($errors) {
        $_SESSION['errors_signup'] = $errors;
        header("Location: ../signup.php");
        die();
    }


    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "INSERT INTO lecturers (first_name, last_name, email, pfn, pwd) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssis", $fname, $lname, $email, $pfnum, $hashed_password);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Redirect to the login page
        header("Location: template/login.html");
        // Close the prepared statement
        mysqli_stmt_close($stmt);
        exit;  // Stop further script execution after redirection
    } else {
        echo "Error executing the query: " . mysqli_error($conn);
    }


    // Check if the record exists
    //     $sql = "SELECT * FROM lecturers WHERE pfnumber = ?";
    //     $stmt = mysqli_prepare($conn, $sql);
    //     mysqli_stmt_bind_param($stmt, "i", $pfnum);
    //     mysqli_stmt_execute($stmt);
    //     $count = mysqli_stmt_num_rows($stmt);
    //     if ($count == 1) {
    //         echo '<script>
    //             alert("pfnumber already exist");
    //             window.location.href = "signup.html";
    //         </script>';
    //     } elseif ($cpass != $pass) {
    //         echo '<script>
    //                 alert("passwords do not match");
    //                 window.location.href = "signup.html";
    //             </script>';
    //     } else {
    //         // Free the result from the previous SELECT query
    //         mysqli_stmt_free_result($stmt);

    //         // Hash the password securely
    //         $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    //         // SQL insert query with placeholders
    //         $sql = "INSERT INTO lecturer (Name, PhoneNumber, Email, PFNumber, password) VALUES (?, ?, ?, ?, ?)";
    //         $stmt = mysqli_prepare($conn, $sql);
    //         mysqli_stmt_bind_param($stmt, "sssis", $name, $phoneNum, $email, $pfnum, $hashed_password);

    //         // Execute the prepared statement
    //         if (mysqli_stmt_execute($stmt)) {
    //             echo "Inserted successfully";
    //             session_start();
    //             // Redirect to the dashboard page
    //             header("Location: dashboard.php");
    //             exit;  // Stop further script execution after redirection
    //         } else {
    //             echo "Error executing the query: " . mysqli_error($conn);
    //         }

    //         // Close the prepared statement
    //         mysqli_stmt_close($stmt);
    //     }
}

mysqli_close($conn);
