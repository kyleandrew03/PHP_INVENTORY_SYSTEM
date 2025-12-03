<?php
session_start();
include "database.php";

if(empty($_SESSION['cart'])) header("Location: cart.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "navbar.php"; ?>

<div class="checkout-container">
    <h2>Customer Information</h2>
    <form action="process_order.php" method="POST" class="checkout-form">
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Phone:</label>
        <input type="text" name="phone" required>
        <button type="submit" class="checkout-btn">Place Order</button>
    </form>
</div>
</body>
</html>
