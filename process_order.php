<?php
session_start();
include "database.php";

if(empty($_SESSION['cart'])) header("Location: cart.php");

// Save customer
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';

$saveCustomer = $conn->prepare("INSERT INTO customers (name,email,phone) VALUES (?,?,?)");
if(!$saveCustomer) die("Prepare failed (customers): ".$conn->error);
$saveCustomer->bind_param("sss", $name,$email,$phone);
$saveCustomer->execute();
$customer_id = $saveCustomer->insert_id;

// Calculate total
$total = 0;
foreach($_SESSION['cart'] as $item) $total += $item['price']*$item['quantity'];

// Save order
$saveOrder = $conn->prepare("INSERT INTO orders (customer_id,total,order_date) VALUES (?,?,NOW())");
if(!$saveOrder) die("Prepare failed (orders): ".$conn->error);
$saveOrder->bind_param("id",$customer_id,$total);
$saveOrder->execute();
$order_id = $saveOrder->insert_id;

// Save order items
foreach($_SESSION['cart'] as $pid=>$item){
    $saveItem = $conn->prepare("INSERT INTO order_items (order_id,product_id,quantity,price) VALUES (?,?,?,?)");
    if(!$saveItem) die("Prepare failed (order_items): ".$conn->error);
    $saveItem->bind_param("iiid",$order_id,$pid,$item['quantity'],$item['price']);
    $saveItem->execute();

    // Deduct stock
    $conn->query("UPDATE products SET stock = stock - {$item['quantity']} WHERE product_id=$pid");
}

$_SESSION['cart'] = [];
header("Location: receipt.php?id=".$order_id);
exit;
?>
