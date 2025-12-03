<?php
session_start();

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['image'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if(isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['quantity']++;
} else {
    $_SESSION['cart'][$id] = [
        'name' => $name,
        'price' => $price,
        'image' => $image,
        'quantity' => 1
    ];
}

header("Location: casia.php");
exit;
?>
