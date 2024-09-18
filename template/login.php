<?php

    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "lecturer_att";


    $conn = mysqli_connect($server,$user,$pass,$db);

    if(!$conn){
        die("connection error".mysqli_connect_error());
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){
    

        $pfnum = $_POST[ 'pfnum' ];
        $pass = $_POST[ 'pass' ];
        
        $sql = "SELECT * FROM lecturer WHERE PFNumber LIKE '$pfnum%'";
        $stmt = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array( $stmt );
        $count = mysqli_num_rows( $stmt );
        
        if($count == 1){
            $hashed_password = $row['password'];
            $verify = password_verify($pass,$hashed_password);
            if($verify){
                session_start();
                $_SESSION['PFNumber'] = $PFNumber;
                $_SESSION['Name'] = $name;
                $_SESSION['Email'] = $Email;
                header('location:dashboard.php');
                exit();                
            }else{
                echo '<script>
                alert("Login failed. invalid password");
                window.location.href = "login.html";
            </script>';
            }
        }else{
            echo '<script>
            alert("Login failed. invalid password");
            window.location.href = "login.html";
        </script>';
        }
    }

    mysqli_close($conn);
?>
