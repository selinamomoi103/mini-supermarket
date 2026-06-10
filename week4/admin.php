<?php
// Force error reporting on to reveal hidden syntax issues
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$error_message = "";

// Temporary Development Bypass Logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Hardcoded check for instant development access
    if ($username === 'admin' && $password === '1234') {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['username'] = 'admin';
        
        header("Location: admin.php");
        exit();
    } else {
        $error_message = "Invalid username or password!";
    }
}
?>