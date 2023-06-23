<!-- connection with database -->
<?php
$host = "localhost";
$db = "seifsales";
$user = "root";
$password = "";

try {
    $conn = mysqli_connect($host, $user, $password, $db);
    // echo("done");
} catch (Exception $e) {
    // echo("Error:" . $e);
}
