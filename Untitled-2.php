  <!-- if(isset($_POST['submit'])){
        $MatNumber = $_POST['MatNum'];


        $sql = "SELECT * FROM students WHERE MatricNum like ? ";
        $stmt = mysqli_prepare($conn, $sql);
        $searchMatNum = $MatNumber . '%';
        mysqli_stmt_bind_param($stmt, "s", $searchMatNum);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "Matric Number: " . $row['MatricNum'] . "<br>";
            }
        }else{
            echo"You are not registered for this course";
        }

    } -->


    <?php

//     $server = "localhost";
//     $user = "root";
//     $password = "";
//     $db = "lecturer_att";

//     $conn = mysqli_connect($server,$user,$password,$db);

//     if(!$conn){
//         die("connection error".mysqli_connect_error());
//     }

//     if(isset($_POST['submit'])){
//         $name = $_POST['name'];
//         $email = $_POST['email'];
//         $phoneNum = $_POST['phonenum'];
//         $pfnum = $_POST['pfnum'];
//         $pass = $_POST['pass'];
//         $cpass = $_POST['cpass'];
        
//          //check if the record exist 
//          $sql = "SELECT * FROM  lecturer WHERE pfnumber = '$pfnum'";
//          $stmt = mysqli_query($conn,$sql);
//          $count = mysqli_num_rows($stmt);
//          if($count == 1 ){
//             echo '<script>
//                 alert("pfnumber already exist");
//                 window.location.href = "signup.html";
//         </script>';
//          }elseif($cpass != $pass){
//             echo '<script>
//                     alert("passwords do not match");
//                     window.location.href = "signup.html";
//                 </script>';
//          }
//          // Assuming you have already connected to the database using $conn
         
//          // Check if the password and confirm password match
//          if ($password !== $cpass) {
//              echo "Passwords do not match!";
//          } else {
//              // Hash the password securely
//              $hashed_password = password_hash($cpass, PASSWORD_DEFAULT);
//              // SQL insert query with placeholders
//              $sql = "INSERT INTO lecturer (Name, PhoneNumber, Email, PFNumber, password) VALUES (?, ?, ?, ?, ?)";
         
//              // Prepare the SQL statement
//              if ($stmt = mysqli_prepare($conn, $sql)) {
//                  // Bind the parameters: "sssis" means 4 strings (Name, PhoneNumber, Email, password) and 1 integer (PFNumber)
//                  mysqli_stmt_bind_param($stmt, "sssis", $name, $phoneNum, $email, $pfnum, $hashed_password);
         
//                  // Execute the prepared statement
//                  if (mysqli_stmt_execute($stmt)) {
//                      echo "Inserted successfully";
//                     session_start();
//                      // Redirect to the dashboard page
//                      header("Location: dashboard.php");
//                      exit;  // Stop further script execution after redirection
//                  } else {
//                      echo "Error executing the query: " . mysqli_error($conn);
//                  }
         
//                  // Close the prepared statement
//                  mysqli_stmt_close($stmt);
//              } else {
//                  echo "Error preparing the query: " . mysqli_error($conn);
//              }
//          }
         
         
//     }
//     mysqli_close($conn);
// ?>
