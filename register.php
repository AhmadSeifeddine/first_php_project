<?php
// Include the "register.inc.php" file
include("./register_action.php/register.inc.php");

// Check if the user is already logged in, if yes, redirect to the "home.php" page
if (isset($_SESSION['logged_in'])) {
    header("location:home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Document</title>
</head>

<body>
    <div class="container right-panel-active">
        <!-- Sign Up -->
        <div class="container__form container--signup">
            <form action="register.php" class="form" id="form1" method="post">
                <h2 class="form__title">Sign Up</h2>
                <?php
                // Check if the form is submitted
                if (isset($_POST['submit'])) {
                    // Check for errors in the form fields and display error messages
                    if (empty($fullname)) {
                        echo "<span class='error' style='color:red;'>Full Name is required</span>";
                    } elseif (!preg_match('/^[a-zA-Z0-9_-]+$/', $fullname)) {
                        echo "<span class='error' style='color:red;'>Full Name must contain only letters and numbers</span>";
                    } elseif (strlen($fullname) > 15) {
                        echo "<span class='error' style='color:red;'>Full Name must be less than 15 characters</span>";
                    }
                }
                ?>
                <input type="text" placeholder="User" class="input" name="name" />

                <?php
                // Check if the form is submitted
                if (isset($_POST['submit'])) {

                    // Check for errors in the form fields and display error messages
                    if (empty($email)) {
                        echo "<span class='error' style='color:red;'>Email is required</span>";
                    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo "<span class='error' style='color:red;'>Invalid Email</span>";
                    }
                    if ($rowCount > 0) {
                        echo "<span class='error' style='color:red;'>Email already exists</span>";
                    }
                }
                ?>
                <input type="email" placeholder="Email" class="input" name="email" />

                <?php
                // Check if the form is submitted
                if (isset($_POST['submit'])) {
                    // Check for errors in the form fields and display error messages
                    if (empty($password)) {
                        echo "<span class='error' style='color:red;'>Password is required</span>";
                    } elseif (strlen($password) < 5) {
                        echo "<span class='error' style='color:red;'>Password must be at least 5 characters</span>";
                    } elseif (!preg_match('/^[a-zA-Z0-9_\-\p{P}]+$/', $password)) {
                        echo "<span class='error' style='color:red;'>Password must contain only letters, numbers and symbols </span>";
                    }
                }
                ?>

                <input type="password" placeholder="Password" class="input" name="password" />
                <button type="submit" name="submit" class="btn">Sign Up</button>
            </form>
        </div>

        <!-- Sign In -->
        <div class="container__form container--signin">
            <form action="./register_action.php/login.inc.php" class="form" id="form2" method="post">
                <h2 class="form__title">Sign In</h2>
                <?php
                // Check if there are any error messages passed through the URL and display them
                if (isset($_GET['error']) && $_GET['error'] == 'email_invalid') {
                    echo '<p class="error-message" style="color:red;">Email invalid</p>';
                }

                if (isset($_GET['error']) && $_GET['error'] == 'empty_field') {
                    echo '<p class="error-message" style="color:red;">empty fields</p>';
                }
                ?>
                <input type="email" placeholder="Email" class="input" name="email_log" />
                <input type="password" placeholder="Password" class="input" name="password_log" />
                <p href="#" class="link">Admin demo account: admin@admin.com/ password: admin</p>
                <button type="submit" name="submit" class="btn">Sign In</button>
            </form>
        </div>

        <!-- Overlay -->
        <div class="container__overlay">
            <div class="overlay">
                <div class="overlay__panel overlay--left">
                    <button class="btn" id="signIn">Sign In</button>
                </div>
                <div class="overlay__panel overlay--right">
                    <button class="btn" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./js/app.js"></script>

</html>
