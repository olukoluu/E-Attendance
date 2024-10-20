<?php

function is_input_empty($pfn, $pwd)
{
    if (empty($pfn) || empty($pwd)) {
        return true;
    } else {
        return false;
    }
}

//query the db to get pfn
function get_pfn($conn, $pfn)
{
    $sql = "SELECT * FROM lecturers WHERE pfn LIKE '$pfn%'";
        $stmt = mysqli_query($conn,$sql);
        $row = mysqli_fetch_row( $stmt );
        // $count = mysqli_num_rows( $stmt );
        return $row;
}

function does_pfn_exist($conn, $pfn)
{
    if(!empty($pfn)){
        if (!get_pfn($conn, $pfn)) {
            return true;
        } else {
            return false;
        }
    }
}

//query the db to get pwd
function get_pwd($conn, $pfn, $pwd)
{
    $sql = "SELECT * FROM lecturers WHERE pfn LIKE '$pfn%'";
        $stmt = mysqli_query($conn,$sql);
        $row = mysqli_fetch_row( $stmt );
        $hashed_password = $row['pwd'];
        $verify = password_verify($pwd,$hashed_password);
        // $count = mysqli_num_rows( $stmt );
        return $verify;
}

function is_pwd_invalid($conn, $pfn, $pwd)
{
    if(!empty($pwd)){
        if (!get_pwd($conn, $pfn, $pwd)) {
            return true;
        } else {
            return false;
        }
    }
}