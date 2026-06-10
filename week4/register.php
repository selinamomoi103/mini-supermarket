<?php
$conn = new mysqli("localhost", "root", "", "supermarket_db");

if (isset($_POST['register'])) {
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure hashing
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO customers (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user, $email, $pass);
    
    if ($stmt->execute()) {
        echo "✅ Registration successful!";
    } else {
        echo "❌ Error: User might already exist.";
    }
}
?>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="register">Sign Up</button>
</form>