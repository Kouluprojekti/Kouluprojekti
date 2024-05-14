// Add products to cart
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
            xhr.send("productName=" + encodeURIComponent(productName) + "&price=" + encodeURIComponent(price));
        });
    });

    // Cart content display
    const cartButton = document.querySelector('.button');
    const cartContent = document.getElementById('cart-content');

    cartButton.addEventListener('mouseenter', () => {
        cartContent.style.display = 'block';
    });

    cartButton.addEventListener('mouseleave', () => {
        setTimeout(() => {
            if (!cartContent.matches(':hover')) {
                cartContent.style.display = 'none';
            }
        }, 300);
    });

    cartContent.addEventListener('mouseenter', () => {
        cartContent.style.display = 'block';
    });

    cartContent.addEventListener('mouseleave', () => {
        cartContent.style.display = 'none';
    });
});
