<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $productName = $_POST['productName'];
    $action = $_POST['action'];

    if (!isset($_SESSION['cart'])) 
    {
        $_SESSION['cart'] = [];
    }

    // Handle the add or remove action
    if ($action == "add") {
        $price = $_POST['price'];
        // Check if the product already exists in the cart
        if (!isset($_SESSION['cart'][$productName])) 
        {
            // Add new product to the cart with quantity 1
            $_SESSION['cart'][$productName] = [
                'name' => $productName,
                'price' => $price,
                'quantity' => 1
            ];
        }
    } elseif ($action == "remove") {
        // Remove the product from the cart
        if (isset($_SESSION['cart'][$productName])) 
        {
            unset($_SESSION['cart'][$productName]);
        }
    }

    // Generate the updated cart content
    ob_start();
    echo "<h1>CART</h1>";
    if (!empty($_SESSION["cart"])) 
    {
        foreach ($_SESSION["cart"] as $item) 
        {
            echo "<p>{$item['name']} - {$item['price']} x{$item['quantity']} <a href='#' class='remove-from-cart' data-product='{$item['name']}'>Remove</a></p>";
        }
        echo '<div class="buttonContainer">
                <button type="button" class="clearCartButton" onclick="location.href=\'clearCart.php\'">Clear Cart</button>
                <button type="button" class="checkoutButton" onclick="location.href=\'cart.php\'">Checkout</button>
            </div>';
    } 
    else 
    {
        echo "<p>Your cart is empty</p>";
    }
    $cartContent = ob_get_clean();

    echo $cartContent;
}
?>