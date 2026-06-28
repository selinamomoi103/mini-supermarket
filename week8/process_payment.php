<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmed</title>
</head>
<body style="text-align: center; padding-top: 50px;">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        echo "<h1>Thank you, $name!</h1>";
        echo "<p>Your payment has been simulated successfully.</p>";
        echo "<p>Your order will be shipped to the address provided shortly.</p>";
        echo "<a href='index_combined.php'>Back to Store</a>";
    } else {
        echo "<h1>Invalid access.</h1>";
    }
    ?>
</body>
</html>