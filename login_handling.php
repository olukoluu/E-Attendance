<?php
session_start();

include_once('connect.php');
include_once('login_function.php');

    if($_SERVER["REQUEST_METHOD"] === "POST"){
    

        $pfnum = $_POST[ 'pfnum' ];
        $pass = $_POST[ 'pass' ];
        $verified = false;

        $errors = [];

        if (is_input_empty($pfnum, $pass)) {
            $errors["input_empty"] = "Fill all fields!";
        }
        if (does_pfn_exist($conn, $pfnum)) {
            $errors["pfn_exist"] = "Pfn doesnot exist!";
        }
        if (is_pwd_invalid($conn, $pfnum, $pass)) {
            $errors["pwd_invalid"] = "Incorrect Password!";
        }
    
        if ($errors) {
            $_SESSION['errors_login'] = $errors;
            header("Location: login.php");
            die();
        }
        
        $sql = "SELECT * FROM lecturers WHERE pfn LIKE '$pfnum%'";
        $stmt = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc( $stmt );
        $count = mysqli_num_rows( $stmt );
        
        if($count == 1){
            $hashed_password = $row['pwd'];
            $verify = password_verify($pass,$hashed_password);
            if($verify){
                $verified = true;
                session_start();
                $_SESSION['FName'] = $row["first_name"];
                $_SESSION['LName'] = $row["last_name"];
                $_SESSION['Email'] = $row["email"];
                $_SESSION['pfnum'] = $row["pfn"];
                $_SESSION['is_hod'] = $row["is_hod"];
                $_SESSION['verified'] = $verified;

                if($row["is_hod"] == 1){
                    header('Location: hoddashboard.php');
                }else {
                    header('Location: teacherdashboard.php');   
                }

                exit();                
            }
        }
    }

    mysqli_close($conn);
?>
