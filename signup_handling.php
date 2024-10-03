<?php
     include_once('connect.php');
  

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $fname = htmlspecialchars($_POST['fname']);
        $lname = htmlspecialchars($_POST['lname']);
        $email = htmlspecialchars($_POST['email']);
        $pfnum = htmlspecialchars($_POST['pfnum']);
        $pass = htmlspecialchars($_POST['pass']);
        $cpass = htmlspecialchars($_POST['cpass']);

        
     
         
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
?>