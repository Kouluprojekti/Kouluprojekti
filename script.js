document.addEventListener("DOMContentLoaded", function() 
{
    var addToCartButtons = document.querySelectorAll(".add-to-cart");

    addToCartButtons.forEach(function(button) 
    {
        button.addEventListener("click", function() 
        {
            var productName = button.getAttribute("data-product");
            var price = button.getAttribute("data-price");

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "addToCart.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() 
            {
                if (xhr.readyState == 4 && xhr.status == 200) 
                {
                    document.getElementById("cart-content").innerHTML = xhr.responseText;
                    button.disabled = true; // Disable the button after adding to cart
                    addRemoveEventListeners(); // Re-add event listeners for remove links
                }
            };
            xhr.send("productName=" + encodeURIComponent(productName) + "&price=" + encodeURIComponent(price) + "&action=add");
        });
    });

    // Add event listeners for remove links
    function addRemoveEventListeners() {
        var removeFromCartLinks = document.querySelectorAll(".remove-from-cart");

        removeFromCartLinks.forEach(function(link) 
        {
            link.addEventListener("click", function(event) 
            {
                event.preventDefault(); // Prevent the default link behavior
                var productName = link.getAttribute("data-product");

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "addToCart.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() 
                {
                    if (xhr.readyState == 4 && xhr.status == 200) 
                    {
                        document.getElementById("cart-content").innerHTML = xhr.responseText;
                        // Re-enable the add to cart button
                        var addButton = document.querySelector(".add-to-cart[data-product='" + productName + "']");
                        if (addButton) {
                            addButton.disabled = false;
                        }
                        addRemoveEventListeners(); // Re-add event listeners for remove links
                    }
                };
                xhr.send("productName=" + encodeURIComponent(productName) + "&action=remove");
            });
        });
    }

    // Initialize event listeners for remove links when the page loads
    addRemoveEventListeners();

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

    // Checkout button
    document.addEventListener('click', function(event) 
    {
        if (event.target.closest('#checkout a')) 
        {
            window.location.href = 'cart.php';
        }
    });
});
