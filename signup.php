<?php
session_start();

$errors = isset($_SESSION['errors_signup']) ? $_SESSION['errors_signup'] : '';
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
                    <span style="color: red; margin-bottom: 10px;"><?php if(isset($errors["email_invalid"])) { echo $errors["email_invalid"]; } ?></span>
                    <span style="color: red; margin-bottom: 10px;"><?php if(isset($errors["email_taken"])) { echo $errors["email_taken"]; } ?></span>
                    <input type="text" name="pfnum" placeholder="PF Number" class="input-field" autocomplete="off">
                    <span style="color: red; margin-bottom: 10px;"><?php if(isset($errors["pfn_taken"])) { echo $errors["pfn_taken"]; } ?></span>
                    <input type="password" name="pass" class="input-field" placeholder="Password" autocomplete="off">
                    <input type="password" name="cpass" class="input-field" placeholder="Confirm Password" autocomplete="off">
                    <span style="color: red; margin-bottom: 10px;"><?php if(isset($errors["password_different"])) { echo $errors["password_different"]; } ?></span>
                    <span style="color: red; margin-bottom: 10px;"><?php if(isset($errors["input_empty"])) { echo $errors["input_empty"]; } ?></span>
                </div>

                <?php
                    unset($_SESSION['errors_signup']);
                ?>

                <a class="input-submit">
                    <button class="submit-btn text-light" type="submit" id="submit">Sign Up</button>
                </a>
                <div class="login-link">
                    <p>Already have an account? <a href="login.php">Login</a></p>
                </div>
            </div>
        </div>

    </form>

</body>

</html>