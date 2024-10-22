<?php
session_start();

$errors = isset($_SESSION['errors_login']) && $_SESSION['errors_login'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="template/styles/login.css" />
    <link rel="stylesheet" href="template/boostrap/css/bootstrap.min.css" />
    <script defer src="template/boostrap/js/bootstrap.bundle.min.js"></script>
    <title>Lecturer log in page</title>
</head>
<body>
    <form action="login_handling.php" method="POST">
        <div style="border-radius: 30px; border: 2px solid white; background-color: white  opacity 0.9;">
            <div class="login-box">
                <div class="login-header">
                    <header style="color: white;">Login</header>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="PF Number" autocomplete="off" name="pfnum">
                </div>
                <p style="color: red;"><?php  if(isset($errors["pfn_exist"])) { echo $errors["pfn_exist"]; }  ?></p>
                <div class="input-box">
                    <input type="password" class="input-field" placeholder="Password" autocomplete="off" name="pass">
                </div>
                <p style="color: red;"><?php if(isset($errors["pwd_invalid"])) { echo $errors["pwd_invalid"]; } ?></p>
                <p style="color: red;"><?php if(isset($errors["input_empty"])) { echo $errors["input_empty"]; } ?></p>
                <!-- <div class="forgot">
                    <section>
                        <input type="checkbox" id="check">
                        <label for="check">Remember me</label>
                    </section>
                    <section>
                        <a href="#">Forgot password</a>
                    </section>
                </div> -->
                <a class="input-submit">
                    <button class="submit-btn" type="submit" id="submit"></button>
                    <label for-="submit">Sign In</label>
                </a>
                </div>
                    <div class="sign-up-link">
                        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
                </div>
            </div>
        </div>
    </form>
    <?php unset($_SESSION['errors_login']); ?>
</body>
</html>
