<?php
$conn = new mysqli("localhost", "root", "", "supermarket_db");

if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

echo "<h2>Database Connection Test</h2>";

// Test 1: Try inserting a test subscriber
$email_test = "test@example.com";
$stmt = $conn->prepare("INSERT IGNORE INTO subscribers (email) VALUES (?)");
$stmt->bind_param("s", $email_test);

if ($stmt->execute()) {
    echo "<p style='color:green;'>✅ Subscriber table is working!</p>";
} else {
    echo "<p style='color:red;'>❌ Subscriber table failed: " . $conn->error . "</p>";
}

// Test 2: Try inserting a dummy customer
$user_test = "tester";
$pass_test = password_hash("password123", PASSWORD_DEFAULT);
$stmt2 = $conn->prepare("INSERT IGNORE INTO customers (username, email, password) VALUES (?, ?, ?)");
$stmt2->bind_param("sss", $user_test, $email_test, $pass_test);

if ($stmt2->execute()) {
    echo "<p style='color:green;'>✅ Customer table is working!</p>";
} else {
    echo "<p style='color:red;'>❌ Customer table failed: " . $conn->error . "</p>";
}
?>