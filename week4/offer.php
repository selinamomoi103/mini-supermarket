<?php
// Handle form submission
if (isset($_POST['subscribe'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    // You would typically save this to a 'subscribers' table in your database
    echo "🎉 Thank you, $email! You are now subscribed to our weekly deals.";
}
?>
<form method="POST">
    <input type="email" name="email" placeholder="Enter your email for offers" required>
    <button type="submit" name="subscribe">Subscribe</button>
</form>