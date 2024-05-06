<?php
// Start the session
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get product name and price from form
    $productName = $_POST["productName"];
    $price = $_POST["price"];

    // Create an array to store product information
    $product = array(
        "name" => $productName,
        "price" => $price
    );

    // Add the product to the session cart
    $_SESSION["cart"][] = $product;

    // Output the updated cart content
    if (!empty($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $item) {
            echo "<p>{$item['name']} - {$item['price']}</p>";
        }
    } else {
        echo "<p>Your cart is empty</p>";
    }
}
?>


