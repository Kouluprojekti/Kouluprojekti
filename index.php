<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>i7 Restorations</title>
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
        <a href="index.php" id="navbar__logo">i7 Restorations</a>
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
                            echo "<p>{$item['name']} - {$item['price']} x {$item['quantity']} <a href='#' class='remove-from-cart' data-product='{$item['name']}'>Remove</a></p>";
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

<!-- Hero Section -->
<div class="main" id="home">
    <div class="main__container">
        <div class="main__content">
            <h2>Highest Quality Refurbished Electronics.</h2>
            <p>Browse our Selection below.</p>
            <button class="main__btn" id="shopBtn">Shop Now</button>
        </div>
        <div class="main__img--container">
            <img src="pic2.svg" alt="Devices, Phone, Tablet, Screen" id="main__img">
        </div>
    </div>
</div>

<!-- Shop Section -->
<div class="products" id="shop">
    <h1>Our Products</h1>
    <div class="products__container">
        <?php
        require_once 'connect.php';

        // Fetch products from the database
        $sql = "SELECT id, name, price FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='products__card' style='background-image: url(\"laptop_build.webp\");'>";
                echo "<h2>" . $row["name"] . "</h2>";
                echo "<p>$" . $row["price"] . "</p>";
                echo "<button class='add-to-cart' data-product='" . $row["name"] . "' data-price='$" . $row["price"] . "'>Add to Cart</button>";
                echo "</div>";
            }
        } else {
            echo "<p>No products found</p>";
        }

        $conn->close();
        ?>
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
                <a href="index.php" id="footer__logo">i7 Restorations</a>
            </div>
            <p class="website__rights">© i7 Restorations 2024. All rights reserved</p>
        </div>
    </div>
</div>
<script>
    document.getElementById('shopBtn').addEventListener('click', function() {
        document.getElementById('shop').scrollIntoView({ behavior: 'smooth' });
    });
</script>
<script src="app.js"></script>
</body>
</html>
