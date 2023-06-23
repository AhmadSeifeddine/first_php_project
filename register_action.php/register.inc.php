<!-- registration logic -->
<?php
include("./db_config/conn.php");
session_start();

// Check if the success message should be displayed
if (isset($_SESSION['account_created']) && $_SESSION['account_created']) {
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: "success",
                title: "Your account have been created , sign in Now!",
                showConfirmButton: false,
                timer: 4000
            });
        });
    </script>';
    unset($_SESSION['account_created']);
}

if (isset($_POST["submit"])) {

    $error = array();

    // creating new variable by their name in the input field
    $fullname = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // checking if the email already exists or not 
    $checkEmail = "SELECT * FROM user WHERE email = '$email'";
    $checkEmail_result = mysqli_query($conn, $checkEmail);
    $rowCount = mysqli_num_rows($checkEmail_result);
    if ($rowCount > 0) {
        $error["email_count"] = "Email is already in use";
    }

    // checking if the name or email or password or the repeated password are not empty
    elseif (empty($fullname) || empty($email) || empty($password)) {
        $error["empty_field"] = "Please fill the form";
    }

    // checking if the user is writing the email with all the important details
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($error, "Email is not valid");
    }

    // checking that the password must not be less than 5 characters
    elseif (strlen($password) < 5) {
        array_push($error, "Password too short");
    }
    // Verifying if the entered name and password conform to the specified pattern.
    elseif (!preg_match('/^[a-zA-Z0-9_-]+$/', $fullname) || !preg_match('/^[a-zA-Z0-9_\-\p{P}]+$/', $password)) {
        array_push($error, "Invalid password or name");
    }

    // checking if the length of the name is greater than 15 characters
    elseif (strlen($fullname) > 15) {
        array_push($error, "Name must be less than 15 characters");
    } else {
        try {

            // Hash the password
            $password_hashed = password_hash($password, PASSWORD_BCRYPT);

            // Insert user data into database
            $sql = "INSERT INTO user (name, email, password, created_at) VALUES (?, ?, ?, NOW())";
            $stmt = mysqli_stmt_init($conn);
            $prepare = mysqli_stmt_prepare($stmt, $sql);

            if ($prepare) {
                // Bind parameters and execute the statement
                mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $password_hashed);

                if (mysqli_stmt_execute($stmt)) {
                    // If insert query executed successfully, redirect to login page
                    echo "Record inserted successfully.";
                    $_SESSION["account_created"] = true;
                    header("Location: register.php");
                    exit();
                } else {
                    // If insert query failed, show the error message
                    echo "Error executing statement: " . mysqli_stmt_error($stmt);
                }
            } else {
                // If preparing statement failed, show the error message
                echo "Error preparing statement: " . mysqli_error($conn);
            }
        } catch (\Exception $ex) {
            // If any exception occurred, show the error message
            echo "Error exception: " . $ex;
        }
    }
}
?>
<!-- Rest of your HTML code -->