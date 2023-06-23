<?php
// Start a session
session_start();

// Destroy the session, clearing all session data
session_destroy();

// Redirect the user to the "register.php" page
header("location:./register.php");
?>
