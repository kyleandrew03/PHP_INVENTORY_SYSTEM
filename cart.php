<?php
session_start();
include "database.php";

if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

// Remove item
if(isset($_GET['remove'])){
    unset($_SESSION['cart'][$_GET['remove']]);
    header("Location: cart.php");
    exit;
}

// Update quantity
if(isset($_GET['action'], $_GET['id'])){
    $id = $_GET['id'];
    if($_GET['action'] === 'add') $_SESSION['cart'][$id]['quantity']++;
    if($_GET['action'] === 'minus' && $_SESSION['cart'][$id]['quantity'] > 1) $_SESSION['cart'][$id]['quantity']--;
    header("Location: cart.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="style.css">
    <title>Shopping Cart</title>
</head>
<body>
<?php include "navbar.php"; ?>

<div class="cart-container">
    <h1 class="cart-title">Shopping Cart</h1>

    <?php if(empty($_SESSION['cart'])): ?>
        <p>Your cart is empty.</p>
    <?php else: 
        $total = 0;
        foreach($_SESSION['cart'] as $id => $item):
            $subtotal = $item['price'] * $item['quantity'];
            $total += $subtotal;
    ?>
        <div class="cart-item">
            <img src="<?= htmlspecialchars($item['image']) ?>">
            <div class="cart-details">
                <h3><?= htmlspecialchars($item['name']) ?></h3>
                <p class="price">₱<?= number_format($item['price'],2) ?></p>
                <div class="cart-qty">
                    <a class="qty-btn" href="cart.php?action=minus&id=<?= $id ?>">−</a>
                    <span><?= $item['quantity'] ?></span>
                    <a class="qty-btn" href="cart.php?action=add&id=<?= $id ?>">+</a>
                </div>
            </div>
            <a class="cart-remove" href="cart.php?remove=<?= $id ?>">Remove</a>
        </div>
    <?php endforeach; ?>
    <h2 class="cart-total">Total: ₱<?= number_format($total,2) ?></h2>
    <a class="checkout-btn" href="checkout.php">Proceed to Checkout</a>
    <?php endif; ?>
</div>
</body>
</html>
