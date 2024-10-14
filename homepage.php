<?php  
    include_once('connect.php');
    session_start();
    
    $last_name = $_SESSION['LName'];
    $verified = $_SESSION['verified'];

    if($_SESSION['verified'] === true){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/homepage.css" />
    <link rel="stylesheet" href="boostrap/css/bootstrap.min.css" />
    <script defer src="boostrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-light bg-light" style="padding-top: 30px;">
        <div class="container">
          <div class="w-100 d-flex justify-content-between">
            <h5>
              <a class="navbar-brand"></a>
                <img src="images/logo.png" alt="logo" width="50px">
              </a>
              <div style="display: inline; padding-left: 20px;">
                <b>E-Attendance</b>
              </div>
            </h5>

            <div class="">
                <a href="../signup.php" class="btn btn-success">Sign up</a>
                <a href="login.html" class="btn btn-success">Log in</a>
            </div>
          </div>
          
        </div>
      </nav>
  

    <div class="background">  
       
    </div>
    
</body>
</html>

<?php 
    mysqli_close($conn); 
} else{
  header("Location: template/login.html");
}
 ?>