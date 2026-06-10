<?php
// Start a secure user session
session_start();

// Include the database connection
include 'db_connect.php';

$error = "";

if (isset($_POST['login'])) {
    // Escape user inputs to secure against SQL injection bugs
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password']; // In production, use password_verify() with hashes

    // Query your specific MySQL users table
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // Fetch matching row records from phpMyAdmin
        $user_data = $result->fetch_assoc();
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['user_name'] = $user_data['name'];
        
        // Redirect right to your inventory dashboard upon success
        header("Location: admin.php");
        exit();
    } else {
        $error = "Invalid database credentials! Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreshMarket Secure Gateway</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background-color: #1e252b; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-card { background: #2c3e50; padding: 40px; border-radius: 10px; box-shadow: 0 10px 25px rgba(0,0,0,0.3); width: 100%; max-width: 400px; border: 1px solid #34495e; color: #fff; }
        h2 { text-align: center; color: #5dade2; margin-bottom: 30px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: 600; }
        input { width: 100%; padding: 10px; box-sizing: border-box; border-radius: 4px; border: 1px solid #bdc3c7; }
        .btn { width: 100%; padding: 12px; background: #5dade2; color: #1e252b; border: none; border-radius: 4px; font-weight: bold; font-size: 1em; cursor: pointer; margin-top: 10px; }
        .btn:hover { background: #3498db; color: #fff; }
        .error-msg { color: #e74c3c; text-align: center; margin-bottom: 15px; font-weight: 500; }
    </style>
</head>
<body>

<div class="login-card">
    <h2>FreshMarket Portal Login</h2>
    
    <?php if(!empty($error)) { echo "<p class='error-msg'>$error</p>"; } ?>

    <form method="POST" action="login.php">
        <div class="form-group">
            <label>Database User Email</label>
            <input type="email" name="email" required placeholder="admin@freshmarket.com">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required placeholder="••••••••">
        </div>
        <button type="submit" name="login" class="btn">Authenticate Securely</button>
    </form>
</div>

</body>
</html>