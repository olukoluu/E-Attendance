<?php

include_once('connect.php');

    if($_SERVER["REQUEST_METHOD"] === "POST"){
    

        $pfnum = $_POST[ 'pfnum' ];
        $pass = $_POST[ 'pass' ];
        $verified = false;
        
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
                $_SESSION['verified'] = $verified;

                header('Location: dashboard.php');
                exit();                
            }else{
                echo '<script>
                alert("Login failed. invalid password");
                window.location.href = "template/login.html";
            </script>';
            
            // header('Location: dashboard.php');
            }
        }else{
            echo '<script>
            alert("Login failed. invalid password");
            window.location.href = "template/login.html";
        </script>';
        }
    }

    mysqli_close($conn);
?>
