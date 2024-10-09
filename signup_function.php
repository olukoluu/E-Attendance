<?php

function is_input_empty($fname, $lname, $email, $pfn, $pwd, $conPwd)
{
    if (empty($fname) || empty($lname) || empty($email) || empty($pfn) || empty($pwd) || empty($conPwd)) {
        return true;
    } else {
        return false;
    }
}

function is_password_same($pass, $cpass)
{
        if ($pass == $cpass) {
            return true;
        } else{
            return false;
        }
}

function is_email_invalid($email)
{
    if(!empty($email)){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
}

//query the db to get email
function get_email($conn, $email)
{
    $sql = "SELECT * FROM lecturers WHERE pfn LIKE '$email%'";
        $stmt = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc( $stmt );
        // $count = mysqli_num_rows( $stmt );
        return $row;
}

function is_email_taken($conn, $email)
{
    if(!empty($email)){
        if (get_email($conn, $email)) {
            return true;
        } else {
            return false;
        }
    }
}

//query the db to get pfn
function get_pfn($conn, $pfn)
{
    $sql = "SELECT * FROM lecturers WHERE pfn LIKE '$pfn%'";
        $stmt = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc( $stmt );
        // $count = mysqli_num_rows( $stmt );
        return $row;
}

function is_pfn_taken($conn, $pfn)
{
    if(!empty($pfn)){
        if (get_pfn($conn, $pfn)) {
            return true;
        } else {
            return false;
        }
    }
}


// To display error msg
function check_signup_errors()
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];
        echo "<br>";

        foreach ($errors as $error) {
            echo '<p style="color: red">' . $error . '</p>';
        }

        unset($_SESSION['errors_signup']);
    }
}

