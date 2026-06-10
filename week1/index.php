<?php
// Week 1: Environment Setup with Direct Asset Links
ini_set('display_errors', 1);
error_reporting(E_ALL);

$projectName = "Mini-Supermarket E-Commerce Platform";
$currentYear = date('Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickMart - Week 1 Setup</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>🛒 Welcome to the <?php echo $projectName; ?> Workspace</h1>
    
    <div class="status">
        ✓ Success! Your local Apache server is processing PHP correctly.
    </div>
    
    <p>This page is being rendered dynamically from your local development stack with external assets securely linked.</p>
    
    <div class="details">
        <strong>Environment Snapshot:</strong><br>
        - Server Software: <?php echo $_SERVER['SERVER_SOFTWARE']; ?><br>
        - Executing File: <?php echo basename(__FILE__); ?><br>
        - System Architecture: Capstone Week 1 Configuration<br>
        - Project Copyright © <?php echo $currentYear; ?>
    </div>
</div>

<script src="main.js"></script>
</body>
</html>