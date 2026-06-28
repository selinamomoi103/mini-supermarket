<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the data from the form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    // Hash the password securely
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Execute the query using the correct columns: name, email, password
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful! You can now <a href='login.php'>Login here</a>.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<form method="post">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Register</button>
</form>