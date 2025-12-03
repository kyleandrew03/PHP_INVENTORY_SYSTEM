<?php 
include "database.php"; 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sari-Sari Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include "navbar.php"; ?>

<div class="store-container">

    <!-- Categories -->
    <aside class="categories">
        <h2>Categories</h2>
        <ul>
            <?php 
            $cat = $conn->query("SELECT * FROM categories ORDER BY category_name ASC");
            if(!$cat) die("Query failed (categories): " . $conn->error);
            while($c = $cat->fetch_assoc()):
            ?>
            <li>
                <a href="casia.php?category=<?= $c['category_id'] ?>">
                    <?= htmlspecialchars($c['category_name']) ?>
                </a>
            </li>
            <?php endwhile; ?>
        </ul>
    </aside>

    <!-- Products -->
    <section class="products-section">
        <h2>Products</h2>
        <div class="products-grid">
            <?php
            if(isset($_GET['category'])){
                $cid = (int)$_GET['category'];
                $sql = "SELECT * FROM products WHERE category_id=$cid ORDER BY product_name ASC";
            } else {
                $sql = "SELECT * FROM products ORDER BY product_name ASC";
            }

            $result = $conn->query($sql);
            if(!$result) die("Query failed (products): " . $conn->error);

            while($row = $result->fetch_assoc()):
            ?>
            <div class="product-card">
                <img src="<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['product_name']) ?>">
                <h3><?= htmlspecialchars($row['product_name']) ?></h3>
                <p class="price">₱<?= number_format($row['price'],2) ?></p>
                <p class="stock">Stock: <?= $row['stock'] ?></p>

                <!-- Add to Cart -->
                <form action="add_to_cart.php" method="POST">
                    <input type="hidden" name="id" value="<?= $row['product_id'] ?>">
                    <input type="hidden" name="name" value="<?= htmlspecialchars($row['product_name']) ?>">
                    <input type="hidden" name="price" value="<?= $row['price'] ?>">
                    <input type="hidden" name="image" value="<?= htmlspecialchars($row['image']) ?>">
                    <button class="add-cart-btn">Add to Cart</button>
                </form>
            </div>
            <?php endwhile; ?>
        </div>
    </section>

</div>

</body>
</html>
