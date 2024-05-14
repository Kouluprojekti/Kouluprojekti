<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $productName = $_POST['productName'];
    $price = $_POST['price'];

    if (!isset($_SESSION['cart'])) 
    {
        $_SESSION['cart'] = [];
    }

    // Check if the product already exists in the cart
    if (isset($_SESSION['cart'][$productName])) {
        // Increment the quantity
        $_SESSION['cart'][$productName]['quantity'] += 1;
    } else {
        // Add new product to the cart with quantity 1
        $_SESSION['cart'][$productName] = [
            'name' => $productName,
            'price' => $price,
            'quantity' => 1
        ];
    }

    // Generate the updated cart content
    ob_start();
    if (!empty($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $item) {
            echo "<p>{$item['name']} - {$item['price']} x{$item['quantity']}</p>";
        }
        echo '<button type="button" id="clear-cart"><a href="clearCart.php">Clear Cart</a></button>';
    } else {
        echo "<p>Your cart is empty</p>";
    }
    $cartContent = ob_get_clean();

    echo $cartContent;
}
?>



