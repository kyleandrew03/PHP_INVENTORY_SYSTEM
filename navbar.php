<nav class="top-nav">
    <h1 class="logo">My Sari-Sari Store</h1>
    <ul>
        <li><a href="casia.php" class="<?= basename($_SERVER['PHP_SELF'])=='casia.php'?'active':'' ?>">Shop</a></li>
        <li><a href="cart.php" class="<?= basename($_SERVER['PHP_SELF'])=='cart.php'?'active':'' ?>">Cart</a></li>
        <li><a href="about.php" class="<?= basename($_SERVER['PHP_SELF'])=='about.php'?'active':'' ?>">About</a></li>
        <li><a href="contact.php" class="<?= basename($_SERVER['PHP_SELF'])=='contact.php'?'active':'' ?>">Contact</a></li>
    </ul>
</nav>
