const iconCart = document.querySelector('.icon-cart');
const closeCart = document.querySelector('.close');
const body = document.querySelector('body');
const listProductHTML = document.getElementById('product-list');
const listCartHTML = document.querySelector('.listCart');
const iconCartSpan = document.querySelector('.icon-cart span');

let products = [];
let cart = [];

// Toggle cart visibility
const toggleCartVisibility = () => {
    body.classList.toggle('showCart');
};

// Fetch products from the PHP script
const fetchProducts = async () => {
    try {
        const response = await fetch('fetch_products.php');
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        products = await response.json();
        renderProducts(products);
    } catch (error) {
        console.error('Failed to fetch products:', error);
    }
};

// Render fetched products
const renderProducts = (products) => {
    listProductHTML.innerHTML = '';

    if (products.length > 0) {
        products.forEach(product => {
            const productElement = document.createElement('div');
            productElement.classList.add('item');
            productElement.dataset.id = product.product_id;
            productElement.innerHTML = `
                <img src="${product.image}" alt="${product.name}">
                <h2>${product.name}</h2>
                <div class="price">R${parseFloat(product.price).toFixed(2)}</div>
                <button class="addCart" data-id="${product.product_id}">Add to Cart</button>
            `;
            listProductHTML.appendChild(productElement);
        });

        // Add event listeners to "Add to Cart" buttons
        document.querySelectorAll('.addCart').forEach(button => {
            button.addEventListener('click', (e) => {
                const productId = e.target.dataset.id;
                handleAddToCart(productId);
            });
        });
    }
};

// Handle adding product to cart
const handleAddToCart = (productId) => {
    const productIndex = cart.findIndex(item => item.product_id == productId);

    if (productIndex === -1) {
        cart.push({ product_id: productId, quantity: 1 });
    } else {
        cart[productIndex].quantity += 1;
    }

    saveCartToLocalStorage();
    updateCartDisplay();
};

// Handle quantity change (plus or minus) in the cart
const handleQuantityChange = (productId, action) => {
    const productIndex = cart.findIndex(item => item.product_id == productId);

    if (productIndex !== -1) {
        if (action === 'plus') {
            cart[productIndex].quantity += 1;
        } else {
            cart[productIndex].quantity -= 1;
            if (cart[productIndex].quantity <= 0) {
                cart.splice(productIndex, 1);
            }
        }
    }

    saveCartToLocalStorage();
    updateCartDisplay();
};

// Update the cart display in HTML
const updateCartDisplay = () => {
    listCartHTML.innerHTML = '';
    let totalQuantity = 0;

    cart.forEach(item => {
        const product = products.find(product => product.product_id == item.product_id);
        if (product) {
            totalQuantity += item.quantity;

            const cartElement = document.createElement('div');
            cartElement.classList.add('item');
            cartElement.dataset.id = item.product_id;
            cartElement.innerHTML = `
                <div class="image">
                    <img src="${product.image}" alt="${product.name}">
                </div>
                <div class="name">${product.name}</div>
                <div class="totalPrice">R${(product.price * item.quantity).toFixed(2)}</div>
                <div class="quantity">
                    <button class="minus">-</button>
                    <span>${item.quantity}</span>
                    <button class="plus">+</button>
                </div>
            `;

            listCartHTML.appendChild(cartElement);
        }
    });

    iconCartSpan.textContent = totalQuantity;

    // Add event listeners to plus and minus buttons
    listCartHTML.querySelectorAll('.plus').forEach(button => {
        button.addEventListener('click', (e) => {
            const productId = e.target.closest('.item').dataset.id;
            handleQuantityChange(productId, 'plus');
        });
    });

    listCartHTML.querySelectorAll('.minus').forEach(button => {
        button.addEventListener('click', (e) => {
            const productId = e.target.closest('.item').dataset.id;
            handleQuantityChange(productId, 'minus');
        });
    });
};

// Save the cart data to local storage
const saveCartToLocalStorage = () => {
    localStorage.setItem('cart', JSON.stringify(cart));
};

// Load the cart data from local storage
const loadCartFromLocalStorage = () => {
    const storedCart = localStorage.getItem('cart');
    if (storedCart) {
        cart = JSON.parse(storedCart);
        updateCartDisplay();
    }
};

// Fetch and render products on page load
document.addEventListener('DOMContentLoaded', () => {
    fetchProducts().then(loadCartFromLocalStorage);
});

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

// Function to transfer cart data to the checkout page
const transferToCheckout = () => {
    const checkoutURL = "Checkout.php";
    const params = new URLSearchParams();

    cart.forEach((item, index) => {
        const product = products.find(product => product.product_id == item.product_id);
        if (product) {
            params.append(`product_${index + 1}`, product.name);
            params.append(`quantity_${index + 1}`, item.quantity);
        }
    });

    const totalPrice = calculateTotalPrice();
    params.append('totalPrice', totalPrice);

    window.location.href = `${checkoutURL}?${params.toString()}`;
};

// Event listeners
iconCart.addEventListener('click', toggleCartVisibility);
closeCart.addEventListener('click', toggleCartVisibility);

// Event listener for checkout button
const checkoutButton = document.querySelector('.checkOut');
checkoutButton.addEventListener('click', transferToCheckout);
