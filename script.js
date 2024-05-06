document.addEventListener("DOMContentLoaded", function() {
    var addToCartButtons = document.querySelectorAll(".add-to-cart");

    addToCartButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            var productName = button.getAttribute("data-product");
            var price = button.getAttribute("data-price");

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "addToCart.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("cart-content").innerHTML = xhr.responseText;
                }
            };
            xhr.send("productName=" + productName + "&price=" + price);
        });
    });
});
