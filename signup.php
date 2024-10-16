<?php
session_start();
include_once('signup_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
    <link rel="stylesheet" href="template/styles/signup.css" />
    <link rel="stylesheet" href="template/boostrap/css/bootstrap.min.css" />
    <script defer src="template/boostrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <form action="signup_handling.php" method="post">

        <div style="border-radius: 30px; border: 2px solid white; background-color: white  opacity 0.9;">
            <div class="login-box">
                <div class="login-header">
                    <header style="color: white;">HELLO, WELCOME. </header>
                </div>
                <div class="input-box">
                    <input type="text" name="fname" class="input-field" placeholder="First Name" autocomplete="off">
                    <input type="text" name="lname" class="input-field" placeholder="Last Name" autocomplete="off">
                    <input type="text" name="email" class="input-field" placeholder="Email Address" autocomplete="off">
                    <input type="text" name="pfnum" placeholder="PF Number" class="input-field" autocomplete="off">
                    <input type="password" name="pass" class="input-field" placeholder="Password" autocomplete="off">
                    <input type="password" name="cpass" class="input-field" placeholder="Confirm Password" autocomplete="off">
                </div>

                <?php
                check_signup_errors();
                ?>

                <a class="input-submit">
                    <button class="submit-btn" type="submit" id="submit"></button>
                    <label for="submit">SIGN UP</label>
                </a>
                <div class="login-link">
                    <p>Already have an account? <a href="login.php">Login</a></p>
                </div>
            </div>
        </div>

    </form>

</body>

</html>