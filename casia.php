<?php include "database.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sari-Sari Store</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<nav class="top-nav">
    <h1 class="logo">My Sari-Sari Store</h1>
    <ul>
        <li><a href="index.php">Shop</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contacts</a></li>
    </ul>
</nav>

<div class="store-container">

    <!-- LEFT: Categories -->
    <aside class="categories">
        <h2>Categories</h2>
        <ul>
            <?php 
            $cat = $conn->query("SELECT * FROM categories");
            while($c = $cat->fetch_assoc()):
            ?>
            <li><a href="index.php?category=<?= $c['category_id'] ?>">
                <?= $c['category_name'] ?>
            </a></li>
            <?php endwhile; ?>
        </ul>
    </aside>

    <!-- RIGHT: Product Grid -->
    <section class="products-section">
        <h2>Products</h2>

        <div class="products-grid">

            <?php
            if(isset($_GET['category'])) {
                $cid = $_GET['category'];
                $sql = "SELECT * FROM products WHERE category_id = $cid";
            } else {
                $sql = "SELECT * FROM products";
            }

            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()):
            ?>
            <div class="product-card">
                <img src="<?= $row['image'] ?>" alt="product">
                <h3><?= $row['product_name'] ?></h3>
                <p class="price">₱<?= $row['price'] ?></p>
                <p class="stock">Stock: <?= $row['stock'] ?></p>
            </div>
            <?php endwhile; ?>

        </div>
    </section>

</div>

</body>
</html>
