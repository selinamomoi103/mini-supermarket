<?php
// 1. FORCE ERROR REPORTING ON (Prevents silent blank screen crashes)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. START SESSION MANAGEMENT
session_start();
$error_message = ""; 

// 3. TEMPORARY DEVELOPMENT BYPASS LOGIC
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Hardcoded credentials for instant local testing bypass (Spelling fixed!)
    if ($username === 'admin' && $password === '1234') {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['username'] = 'admin';
        
        // Redirect directly to your active dashboard panel file
        header("Location: dashboard.php");
        exit();
    } else {
        $error_message = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickMart - Admin Login</title>
    <style>
        body { 
            background-color: #22252a; 
            color: #ffffff; 
            font-family: 'Segoe UI', Arial, sans-serif; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
        }
        .login-card { 
            background-color: #2d3139; 
            padding: 40px; 
            border-radius: 8px; 
            border: 1px solid #3f444e; 
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 360px;
        }
        h2 { 
            margin-top: 0; 
            font-size: 22px; 
            color: #10b981;
            margin-bottom: 10px;
        }
        label {
            font-size: 13px; 
            color: #cbd5e1;
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
        }
        input { 
            width: 100%; 
            padding: 12px; 
            background: #22252a; 
            color: white; 
            border: 1px solid #475569; 
            border-radius: 4px; 
            box-sizing: border-box;
            font-size: 14px;
        }
        input:focus {
            border-color: #10b981;
            outline: none;
        }
        button { 
            width: 100%; 
            padding: 12px; 
            background: #10b981; 
            color: white; 
            border: none; 
            border-radius: 4px; 
            font-weight: bold; 
            font-size: 15px;
            cursor: pointer; 
            margin-top: 25px;
            transition: background 0.2s;
        }
        button:hover { background: #059669; }
        .error-box { 
            background-color: rgba(239, 68, 68, 0.1);
            border-left: 4px solid #ef4444;
            color: #f87171; 
            padding: 10px;
            border-radius: 4px;
            font-size: 14px; 
            margin-bottom: 15px; 
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h2>🛒 Admin Login Panel</h2>
        <p style="color: #a4b0be; font-size: 13px; margin: 0 0 20px 0;">Week 4 Security Workspace Dashboard</p>
        
        <?php if (!empty($error_message)): ?>
            <div class="error-box">
                ⚠️ <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <label>Username</label>
            <input type="text" name="username" placeholder="e.g., admin" required>
            
            <label>Password</label>
            <input type="password" name="password" placeholder="••••" required>
            
            <button type="submit">Login to Workspace</button>
        </form>
    </div>

</body>
</html>