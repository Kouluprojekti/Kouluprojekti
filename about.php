<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet">
    <script src="script.js" defer></script>
</head>

<body>
<!-- Navbar Section -->
<nav class="navbar">
    <div class="navbar__container">
        <a href="index.php" id="navbar__logo">Shop Name</a>
        <div class="navbar__toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <ul class="navbar__menu">
            <li class="navbar__item">
                <a href="index.php" class="navbar__links">Shop</a>
            </li>
            <li class="navbar__item">
                <a href="about.php" class="navbar__links">About</a>
            </li>
            <li class="navbar__btn">
                <a href="cart.php" class="button" id="cart-btn">Cart</a>
                <div id="cart-content">
                    <!-- Cart content here -->
                    <h1>CART</h1>
                    <?php
                    session_start();
                    // Check if there are items in the session cart
                    if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) 
                    {
                        // Loop through each item in the cart and display its name, price, and quantity
                        foreach ($_SESSION["cart"] as $item) 
                        {
                            echo "<p>{$item['name']} - {$item['price']} x{$item['quantity']} <a href='#' class='remove-from-cart' data-product='{$item['name']}'>Remove</a></p>";
                        }
                        // Display Clear cart and Checkout buttons
                        echo '<div class="buttonContainer">
                                <button type="button" class="clearCartButton" onclick="location.href=\'clearCart.php\'">Clear Cart</button>
                                <button type="button" class="checkoutButton" onclick="location.href=\'cart.php\'">Checkout</button>
                            </div>';
                    } 
                    else 
                    {
                        // If the cart is empty, display a message
                        echo "<p>Your cart is empty</p>";
                    }
                    ?>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!-- About Section -->
<div class="about__container" id="about">
    <h1>About Us</h1>
    <div class="about__content">
        <p>Welcome to [Company Name], where we breathe new life into pre-loved electronic devices, giving them a second chance to shine. At [Company Name], we specialize in refurbishing a wide range of electronics, from laptops and desktops to gaming consoles and home appliances. <br><br>

            Our mission is simple: to provide high-quality refurbished electronics that not only meet but exceed our customers' expectations. We believe in sustainability and the power of giving products a second life, reducing electronic waste and minimizing our environmental footprint.<br><br>
                
            With a dedicated team of experts, we meticulously refurbish each device to ensure it not only looks brand new but also performs flawlessly. From thorough inspections to component replacements and software updates, every step is taken to deliver a product that's as good as new.<br><br>
                
            Whether you're looking for a budget-friendly laptop for work or play, a powerful gaming console, or a reliable home appliance, [Company Name] has you covered. Our commitment to quality, affordability, and sustainability sets us apart in the refurbished electronics market.
                
            Join us in our journey to redefine the way people think about refurbished electronics. Experience the difference with [Company Name] - where quality meets sustainability.
        
            <br><br>If you have any questions, contact our team at: 
            <br><strong>company.name@gmail.com</strong></p>
        <div class="about__card"></div>
    </div>
</div>

<!-- Footer Section -->
<div class="footer__container">
    <div class="social__media">
        <div class="social__media--wrap">
            <a href="https://www.facebook.com/" target="_blank" class="fa fa-facebook"></a>
            <a href="https://twitter.com/home" target="_blank" class="fa fa-twitter"></a>
            <a href="https://www.youtube.com/" target="_blank" class="fa fa-youtube"></a>
            <a href="https://www.instagram.com/" target="_blank" class="fa fa-instagram"></a>
            <div class="footer__logo">
                <a href="index.php" id="footer__logo">SHOP NAME</a>
            </div>
            <p class="website__rights">© SHOP NAME 2024. All rights reserved</p>
        </div>
    </div>
</div>

<script src="app.js"></script>
</body>
</html>
