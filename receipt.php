<?php
include "database.php";

$order_id = (int)$_GET['id'];

$order = $conn->query("
    SELECT o.*, c.name, c.email, c.phone 
    FROM orders o
    JOIN customers c ON c.customer_id = o.customer_id
    WHERE o.order_id = $order_id
");
if(!$order) die("Query failed (order): ".$conn->error);
$order = $order->fetch_assoc();

$items = $conn->query("
    SELECT oi.*, p.product_name
    FROM order_items oi
    JOIN products p ON p.product_id = oi.product_id
    WHERE oi.order_id = $order_id
");
if(!$items) die("Query failed (order_items): ".$conn->error);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "navbar.php"; ?>

<div class="receipt-container">
    <h2>Order #<?= $order_id ?></h2>

    <p><strong>Name:</strong> <?= htmlspecialchars($order['name']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($order['email']) ?></p>
    <p><strong>Phone:</strong> <?= htmlspecialchars($order['phone']) ?></p>
    <p><strong>Date:</strong> <?= $order['order_date'] ?></p>

    <h3>Items:</h3>
    <table class="receipt-table">
        <tr>
            <th>Product</th><th>Qty</th><th>Price</th><th>Subtotal</th>
        </tr>

        <?php 
        $grand = 0;
        while($i = $items->fetch_assoc()):
            $sub = $i['price'] * $i['quantity'];
            $grand += $sub;
        ?>
        <tr>
            <td><?= htmlspecialchars($i['product_name']) ?></td>
            <td><?= $i['quantity'] ?></td>
            <td>₱<?= number_format($i['price'],2) ?></td>
            <td>₱<?= number_format($sub,2) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2 class="total">TOTAL: ₱<?= number_format($grand, 2) ?></h2>

    <a class="checkout-btn" href="casia.php">Back to Shop</a>
</div>

</body>
</html>
