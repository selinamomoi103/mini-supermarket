<?php
// 1. Start the session so we can access the session data
session_start();

// 2. Clear all session variables
session_unset();

// 3. Destroy the session on the server
session_destroy();

// 4. Redirect the user back to the login page
header("Location: login.php");
exit();
?>