<!DOCTYPE html>
<html>
<head>
    <title>Checkout | Mini Supermarket</title>
    <style>
        body { font-family: sans-serif; padding: 40px; line-height: 1.6; }
        .checkout-box { max-width: 400px; margin: auto; border: 1px solid #ddd; padding: 20px; border-radius: 8px; }
        input { width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background-color: #28a745; color: white; border: none; cursor: pointer; font-size: 16px; }
    </style>
</head>
<body>

<div class="checkout-box">
    <h2>Secure Checkout</h2>
    <form action="process_payment.php" method="POST">
        <label>Full Name:</label>
        <input type="text" name="name" required>
        
        <label>Email Address:</label>
        <input type="email" name="email" required>
        
        <label>Shipping Address:</label>
        <input type="text" name="address" required>
        
        <button type="submit">Place Order</button>
    </form>
</div>

</body>
</html>