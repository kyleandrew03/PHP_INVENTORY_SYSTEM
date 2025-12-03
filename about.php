<?php
include "database.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us - My Sari-Sari Store</title>
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include "navbar.php"; ?>

<div class="page-container">
    <h1>About Us</h1>

    <section class="about-section">
        <h2>Our Story</h2>
        <p>My Sari-Sari Store started with a simple goal: to provide affordable and high-quality everyday products to our community. From snacks and drinks to household essentials, we make sure our customers can find what they need in one place.</p>
    </section>

    <section class="about-section">
        <h2>Our Mission</h2>
        <p>We aim to create a convenient and friendly shopping experience. Customer satisfaction is our top priority, and we strive to deliver quality products with excellent service.</p>
    </section>

    <section class="about-section">
        <h2>Why Choose Us?</h2>
        <ul>
            <li>Wide variety of daily essentials at affordable prices.</li>
            <li>Friendly and helpful service.</li>
            <li>Quick and easy shopping experience online and in-store.</li>
        </ul>
    </section>
</div>

</body>
</html>
