<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Shop Name</title>
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
                    <a href="cart.php" class="button">Cart</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Checkout Section -->
    <?php
    session_start();

    function calculateTotals($cart) 
    {
        $totalPrice = 0;
        foreach ($cart as $item) 
        {
            $itemPrice = is_numeric(str_replace('$', '', $item['price'])) ? floatval(str_replace('$', '', $item['price'])) : 0;
            $itemQuantity = is_numeric($item['quantity']) ? intval($item['quantity']) : 0;
            $totalPrice += $itemPrice * $itemQuantity;
        }
        $taxlessPrice = $totalPrice * 0.76;
        $tax = $totalPrice * 0.24;
        return [number_format($taxlessPrice, 2), number_format($tax, 2), number_format($totalPrice, 2)];
    }

    if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) 
    {
        list($taxlessPrice, $tax, $totalPrice) = calculateTotals($_SESSION["cart"]);
        echo "<div class=\"checkout_container\">";
            echo "<div class=\"contact_info\">";
                //Contact Information
                echo "<h2>Ship To</h2>";
                echo "<div class='input_row'>";
                    echo "<div class='input_group'>";
                        echo "<label for='first_name'>First Name:</label>";
                        echo "<input type='text' id='first_name' name='first_name' required>";
                    echo "</div>";
                    echo "<div class='input_group'>";
                        echo "<label for='last_name'>Last Name:</label>";
                        echo "<input type='text' id='last_name' name='last_name' required>";
                    echo "</div>";
                echo "</div>";
                echo "<div class='input_row'>";
                    echo "<div class='input_group'>";
                        echo "<label for='address'>Address:</label>";
                        echo "<input type='text' id='address' name='address' required>";
                    echo "</div>";
                    echo "<div class='input_group'>";
                        echo "<label for='city'>City:</label>";
                        echo "<input type='text' id='city' name='city' required>";
                    echo "</div>";
                echo "</div>";
                echo "<div class='input_row'>";
                    echo "<div class='input_group'>";
                        echo "<label for='phone'>Phone Number:</label>";
                        echo "<input type='tel' id='phone' name='phone' required>";
                    echo "</div>";
                    echo "<div class='input_group'>";
                        echo "<label for='email'>Email:</label>";
                        echo "<input type='email' id='email' name='email' required>";
                    echo "</div>";
                echo "</div>";
                echo "<div class=\"button_container\">";
                    echo "<button class=\"cart__btn button_disabled\" id=\"continue_button\" onclick=\"window.location.href='receipt.php';\" disabled>";
                        echo "Continue";
                    echo "</button>";
                echo "</div>";
            echo "</div>";
            echo "<div class=\"checkout_page\">";
                echo "<div class=\"product-details\">";
                    echo "<table>";
                        echo "<tr><th>Product</th><th>Quantity</th><th>Subtotal</th></tr>";
        foreach ($_SESSION["cart"] as $item) 
        {
            echo "<tr>
                    <td>" . htmlspecialchars($item['name']) . "</td>
                    <td>" . htmlspecialchars($item['quantity']) . "</td>
                    <td>" . htmlspecialchars($item['price']) . "</td>
                </tr>";
        }
        echo "</table>";
        echo "</div>";
        echo "<div class=\"total_priceCheckout\">
                <table>
                    <tr>
                        <td class=\"label\">Taxless</td>
                        <td class=\"value\">\$$taxlessPrice</td>
                    </tr>
                    <tr>
                        <td class=\"label\">Tax</td>
                        <td class=\"value\">\$$tax</td>
                    </tr>
                    <tr>
                        <td class=\"label\">Total</td>
                        <td class=\"value\">\$$totalPrice</td>
                    </tr>
                </table>
            </div>";
        echo "</div>";
    echo "</div>";
    }
    ?>

    <!-- Footer Section -->
    <div class="footer__container">
        <div class="social__media">
            <div class="social__media--wrap">
                <a href="https://www.facebook.com/" target="_blank" class="fa fa-facebook"></a>
                <a href="https://twitter.com/home" target="_blank" class="fa fa-twitter"></a>
                <a href="https://www.youtube.com/" target="_blank" class="fa fa-youtube"></a>
                <a href="https://www.instagram.com/" target="_blank" class="fa fa-instagram"></a>
                <div class="footer__logo">
                    <a href="/" id="footer__logo">SHOP NAME</a>
                </div>
                <p class="website__rights">© SHOP NAME 2024. All rights reserved</p>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.contact_info input');
            const continueButton = document.getElementById('continue_button');

            function checkInputs() {
                let allFilled = true;
                inputs.forEach(input => {
                    if (input.value === '') {
                        allFilled = false;
                    }
                });
                if (allFilled) {
                    continueButton.disabled = false;
                    continueButton.classList.remove('button_disabled');
                } else {
                    continueButton.disabled = true;
                    continueButton.classList.add('button_disabled');
                }
            }

            inputs.forEach(input => {
                input.addEventListener('input', checkInputs);
            });

            checkInputs(); // Initial check
        });
    </script>
</body>

</html>
