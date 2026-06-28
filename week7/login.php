<?php
session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Sanitize the email input
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // 2. Fetch the user record from the database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    // 3. Verify the password using password_verify()
    if ($user && password_verify($password, $user['password'])) {
        // Password is correct, start the session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        
        // 4. Redirect to the catalog page
        header("Location: ../week6/catalog.php");
        exit();
    } else {
        echo "Invalid email or password.";
    }
}
?>

<form method="post">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>