<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Name</title>
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
                <a href="cart.html" class="button" id="cart-btn">Cart</a>
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
                            echo "<p>{$item['name']} - {$item['price']} x{$item['quantity']}</p>";
                        }
                        // Display the "Clear Cart" button if the cart is not empty
                        echo '<button type="button" id="clear-cart"><a href="clearCart.php">Clear Cart</a></button>';
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

    <!--Hero Section-->
    <div class="main" id="home">
        <div class="main__container">
            <div class="main__content">
                <h2>Highest Quality Refurbished Electronics.</h2>
                <p>-20% off, only until xx.xx.xxxx!</p>
                <button class="main__btn" onclick="window.location.href='#shop'">Shop Now</button>
            </div>
            <div class="main__img--container">
                <img src="pic1.svg" alt="Discount sign, Sale" id="main__img">
            </div>
        </div>
    </div>

    <!--Shop Section-->
    <div class="products" id="shop">
        <h1>Our Products</h1>
        <div class="products__container">
            <div class="products__card">
                <h2>Product 1</h2>
                <p>xxx$</p>
                <button class="add-to-cart" data-product="Product 1" data-price="10$">Add to Cart</button>
            </div>
            <div class="products__card">
                <h2>Product 2</h2>
                <p>xxx$</p>
                <button class="add-to-cart" data-product="Product 2" data-price="30$">Add to Cart</button>
            </div>
            <div class="products__card">
                <h2>Product 3</h2>
                <p>xxx$</p>
                <button class="add-to-cart" data-product="Product 3" data-price="25$">Add to Cart</button>
            </div>
            <div class="products__card">
                <h2>Product 4</h2>
                <p>xxx$</p>
                <button class="add-to-cart" data-product="Product 4" data-price="58$">Add to Cart</button>
            </div>
        </div>
    </div>

    <form id="add-to-cart-form" action="addToCart.php" method="post" style="display: none;">
        <input type="hidden" id="product-name" name="productName">
        <input type="hidden" id="price" name="price">
    </form>

    <!-- Footer Section -->

    <div class="footer__container">
        
        <div class="social__media">
            <div class="social__media--wrap">
            <a href="https://www.facebook.com/" target="blank" class="fa fa-facebook"></a>
            <a href="https://twitter.com/home" target="blank" class="fa fa-twitter"></a>
            <a href="https://www.youtube.com/" target="blank" class="fa fa-youtube"></a>
            <a href="https://www.instagram.com/" target="blank" class="fa fa-instagram"></a>
                <div class="footer__logo">
                    <a href="/" id="footer__logo">SHOP NAME</a>
                </div>
                <p class="website__rights">© SHOP NAME 2024. All rights reserved</p>
            </div>
        </div>
    </div>

    <script src="app.js"></script>
</body>
</html>