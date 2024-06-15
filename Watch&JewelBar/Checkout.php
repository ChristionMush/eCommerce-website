<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Watch & Jewel Bar</title>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Jost:ital,wght@0,100..900;1,100..900&family=Nanum+Myeongjo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://kit.fontawesome.com/7970bed18f.js" crossorigin="anonymous"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AdmI34iS7qhTuI342p1SaAcbvzHFRLywYfDjSeGWGPbdT77HEkj6eWG1e5vMCy4iXoyfBLZ9ZWHUHDSn&disable-funding=credit,card"></script> <!-- Replace YOUR_CLIENT_ID with your actual client ID -->
    <style>
        
* {
    margin: 0;
    padding: 0;
    font-family: Montserrat, sans-serif;
    box-sizing: border-box;
}

html {
    scroll-behavior: smooth;
}

body {
    background: white;
    color: #ababab;
}

#header {
    width: 100%;
    height: 40vh;
    background-image: url(https://jackmasonbrand.com/cdn/shop/articles/Blog_DifferentWatchTypes_Hero_1512x741.jpg?v=1655315156);
    background-size: cover;
    background-position: center;
}

.container {
    padding: 10px 10%;
}

nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: white;
    height: 75px;
    padding: 0 20px;
}

nav .header-text {
    margin-top: 0;
    font-size: 30px;
    color: black; /* Changed to black for visibility against white background */
}

nav .header-text h1 {
    font-size: 24px; /* Adjusted for better alignment */
    margin: 0; /* Removed margin for alignment */
}

nav .header-text h1 span {
    color: #AB2B2B;
    font-family: "Great Vibes", cursive;
}

nav .header-text p {
    font-size: 10px;
    color: #ababab;
}

nav ul {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline-block;
    text-align: center;
    margin: 0 20px; /* Adjusted margin for spacing */
}

nav ul li a {
    color: #ababab;
    text-decoration: none;
    font-size: 18px;
    position: relative;
}

nav ul li a::after {
    content: '';
    width: 0;
    height: 3px;
    background: #AB2B2B;
    position: absolute;
    left: 0;
    bottom: -6px;
    transition: 0.5s;
}

nav ul li a:hover::after {
    width: 100%;
}

.checkout {
    text-align: center;
    padding: 20px 0;
}

.checkout p {
    color: black;
    padding: 50px;
    font-size: 25px;
    font-weight: bolder;
}

form {
    margin: 20px auto;
    width: 450px;
    padding: 20px;
    border: none;
    border-radius: 5px;
    background-color: transparent;
    color: #abababc5;
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="number"],
select {
    width: 100%;
    height: 45px;
    padding: 10px;
    margin: 5px 0;
    background-color: whitesmoke;
    color: #ababab;
    border: none;
}

input[type="submit"] {
    width: 100%;
    height: 45px;
    padding: 10px;
    margin: 5px 0;
    background-color: #AB2B2B;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #FAD2D2;
}
#paypal-button-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
}
.copyright {
    width: 100%;
    text-align: center;
    padding: 25px 0;
    background: #AB2B2B;
    font-weight: 300;
    margin-top: 20px;
}

    </style>
</head>
<body>
    <div id="header">
        <div class="container">
            <nav>
                <div class="header-text">
                    <h1><span>Watch & Jewel Bar</span></h1>
                    <p>Luxury and Finesse made affordable</p>
                </div>
                <ul id="sidemenu">
                    <li><a href="index.php">Back</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!----------------------------------------------Checkout------------------------------------------------------->
    <div class="checkout">
        <div class="cart-summary">
            <h2>Cart Summary</h2>
            <div id="cart-items"></div>
            <p>Total Price: R <span id="totalPrice"></span></p>
        </div>

        <script>
    // Retrieve cart data from local storage
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    let products = [];

    // Fetch products from the PHP script
    const fetchProducts = async () => {
        try {
            const response = await fetch('fetch_products.php');
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            products = await response.json();
            displayCartSummary();
        } catch (error) {
            console.error('Failed to fetch products:', error);
        }
    };

    // Function to calculate total price of items in the cart
    const calculateTotalPrice = () => {
        let totalPrice = 0;
        cart.forEach(item => {
            const product = products.find(product => product.product_id == item.product_id);
            if (product) {
                totalPrice += product.price * item.quantity;
            }
        });
        return totalPrice.toFixed(2);
    };

    // Function to display cart summary
    const displayCartSummary = () => {
        const cartItemsContainer = document.getElementById('cart-items');
        const totalPriceElement = document.getElementById('totalPrice');

        cartItemsContainer.innerHTML = '';

        cart.forEach(item => {
            const product = products.find(product => product.product_id == item.product_id);
            if (product) {
                const productElement = document.createElement('div');
                productElement.classList.add('item');
                productElement.innerHTML = `
                    <div class="name">${product.name}</div>
                    <div class="quantity">Quantity: ${item.quantity}</div>
                `;
                cartItemsContainer.appendChild(productElement);
            }
        });

        // Display total price
        totalPriceElement.textContent = calculateTotalPrice();
    };

    // PayPal Button rendering
    paypal.Buttons({
        style: {
            color: 'blue',
            shape: 'pill'
        },
        createOrder: function (data, actions) {
            const totalPrice = calculateTotalPrice();
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: totalPrice
                    }
                }]
            });
        },
        onApprove: function (data, actions) {
            return actions.order.capture().then(function (details) {
                console.log(details);
                window.location.replace("success.php");
            });
        },
        onCancel: function (data) {
            window.location.replace("Oncancel.php");
        }
    }).render('#paypal-button-container');

    // Fetch and render products on page load
    document.addEventListener('DOMContentLoaded', () => {
        fetchProducts();
    });
</script>


        <h2>Click button below to Pay:</h2>
        <form id="shipping-form">
		 <div id="paypal-button-container"></div>
        
        </form>
    </div>
    <!-------------------------------------------------------------Contacts-------------------------------------->
    <div id="contact">
        <div class="copyright">
            <p>copyright © Christion Mushariwa.</p>
        </div>
    </div>
</body>
</html>
