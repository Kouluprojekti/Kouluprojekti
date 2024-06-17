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
                    <a href="cart.php" class="button">Cart</a>
                </li>
            </ul>
        </div>
    </nav>

    <!--Receipt Section-->
    <div class="receipt_container">
    <?php
        session_start();

        // Retrieve contact information from the session
        $contact_info = isset($_SESSION["contact_info"]) ? $_SESSION["contact_info"] : [];

        echo "<div class=\"small_container cart_page\">
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>";
                    $totalPrice = 0;
        foreach ($_SESSION["cart"] as $item) {
            echo "<tr>
                    <td>
                        <div class=\"cart_info\">
                            <img src=\"laptop_build.webp\" style=\"width: 200px; height: auto;\">
                            <div>
                                <p>{$item['name']}</p>
                                <small>Price: {$item['price']}</small><br>
                            </div>
                        </div>
                    </td>
                    <td>{$item['quantity']}</td>
                    <td>{$item['price']}</td>
                </tr>";
                // Remove the dollar sign from the price and ensure price and quantity are numeric before calculation
                $itemPrice = is_numeric(str_replace('$', '', $item['price'])) ? floatval(str_replace('$', '', $item['price'])) : 0;
                $itemQuantity = is_numeric($item['quantity']) ? intval($item['quantity']) : 0;
                
                $totalPrice += $itemPrice * $itemQuantity;
        }
        $taxlessPrice1 = $totalPrice * 0.76;
        $taxlessPrice2 = number_format($taxlessPrice1, 2);
        $tax1 = $totalPrice * 0.24;
        $tax2 = number_format($tax1, 2);
        echo "</table>
            <div class=\"total_price\">
                <table>
                    <tr>
                        <td>Taxless</td>
                        <td>\$$taxlessPrice2</td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>\$$tax2</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>\$$totalPrice</td>
                    </tr>
                    <tr><td colspan='2'><hr></td></tr>
                    <tr>
                        <td colspan='1'><strong>Shipping To</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>First Name</td>
                        <td>{$contact_info['first_name']}</td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>{$contact_info['last_name']}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{$contact_info['address']}</td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>{$contact_info['city']}</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>{$contact_info['phone']}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{$contact_info['email']}</td>
                    </tr>
                </table>
            </div>
            <div class=\"button_container\">
            <button class=\"cart__btn\" onclick=\"window.location.href='index.php';\">
                To Home Screen
            </button>
            </div>
            </div>";
        unset($_SESSION["cart"]);
        unset($_SESSION["contact_info"]);
        ?>
   </div>

<!--Footer Section-->
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

    <script src="app.js"></script>
</body>
</html>
