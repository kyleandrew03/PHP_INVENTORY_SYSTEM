<?php
include "../database.php";

$orders = $conn->query("
    SELECT orders.*, customers.name 
    FROM orders
    JOIN customers ON customers.customer_id = orders.customer_id
    ORDER BY order_id DESC
");
?>

<h2>Orders</h2>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th><th>Customer</th><th>Date</th><th>Total</th><th>View</th>
</tr>

<?php while ($o = $orders->fetch_assoc()): ?>
<tr>
    <td><?= $o['order_id'] ?></td>
    <td><?= $o['name'] ?></td>
    <td><?= $o['order_date'] ?></td>
    <td>₱<?= $o['total_amount'] ?></td>
    <td><a href="order_view.php?id=<?= $o['order_id'] ?>">Open</a></td>
</tr>
<?php endwhile; ?>
</table>
