/**
 * Drono - Shopping Cart Functionality
 * Created by: EssadeqBillouche
 * Last Updated: 2025-04-23
 */

// Cart state management
let cartItems = [];
let cartTotal = 0;

// Toggle the cart sidebar visibility
function toggleCart() {
    const sidebar = document.getElementById('cartSidebar');
    const overlay = document.getElementById('cartOverlay');

    if (sidebar.classList.contains('translate-x-full')) {
        sidebar.classList.remove('translate-x-full');
        overlay.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    } else {
        sidebar.classList.add('translate-x-full');
        overlay.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
}

// Add to cart with animation
function addToCart(modalId) {
    // Get product information from the current modal
    const modal = document.getElementById(modalId);

    if (!modal) {
        console.error("Modal not found:", modalId);
        return;
    }

    // Extract product details from modal
    const productName = modal.querySelector('h2.text-2xl').textContent;
    const productImage = modal.querySelector('.aspect-square img').src;
    const productPrice = parseFloat(
        modal.querySelector('.text-3xl.font-bold.text-primary').textContent
            .replace('$', '')
    );

    // Get quantity
    const quantityInput = modal.querySelector('input[type="number"]');
    const quantity = quantityInput ? parseInt(quantityInput.value) : 1;

    // Get button for animation
    const button = modal.querySelector('.bg-primary.text-white.py-2.px-6');

    if (button) {
        // Show loading animation on button
        const originalText = button.innerHTML;
        button.innerHTML = '<svg class="w-5 h-5 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';

        setTimeout(() => {
            button.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Added';
            button.classList.add('bg-green-600');

            // Add the item to cart
            addItemToCart(modalId, productName, productPrice, productImage, quantity);

            // Animate cart icon
            animateCartIcon();

            setTimeout(() => {
                button.innerHTML = originalText;
                button.classList.remove('bg-green-600');
            }, 2000);
        }, 1000);
    } else {
        // Just add to cart without animation if button not found
        addItemToCart(modalId, productName, productPrice, productImage, quantity);
        animateCartIcon();
    }
}

// Update quantity of an item in the modal
function updateQuantity(element, change) {
    const input = element.parentNode.querySelector('input');
    if (input) {
        let value = parseInt(input.value) + change;
        if (value < 1) value = 1;
        input.value = value;

        // Add animation effect
        input.style.transform = 'scale(1.2)';
        setTimeout(() => {
            input.style.transform = 'scale(1)';
        }, 200);
    }
}

// Animate the cart icon when an item is added
function animateCartIcon() {
    const cartCounter = document.querySelector('.shopping-cart-button span');
    const cartIcon = document.querySelector('.shopping-cart-button');

    if (cartCounter) {
        // Update the count
        let currentCount = parseInt(cartCounter.textContent.trim());
        cartCounter.textContent = currentCount + 1;

        // Animate the counter
        cartCounter.classList.add('animate-bounce');
        setTimeout(() => {
            cartCounter.classList.remove('animate-bounce');
        }, 1000);
    }

    if (cartIcon) {
        // Animate the icon
        cartIcon.classList.add('scale-125');
        setTimeout(() => {
            cartIcon.classList.remove('scale-125');
        }, 300);
    }
}

// Add an item to cart with product details
function addItemToCart(productId, name, price, image, quantity = 1) {
    const existingItem = cartItems.find(item => item.id === productId);

    if (existingItem) {
        existingItem.quantity += quantity;
    } else {
        cartItems.push({
            id: productId,
            name: name,
            price: price,
            image: image,
            quantity: quantity
        });
    }

    // Update cart UI
    updateCartTotal();
    renderCartItems();

    // Save cart to local storage
    saveCart();
}

// Remove an item from cart
function removeCartItem(productId) {
    cartItems = cartItems.filter(item => item.id !== productId);

    // Update cart UI
    updateCartTotal();
    renderCartItems();
    updateCartCount();

    // Save cart to local storage
    saveCart();
}

// Update cart count in the header
function updateCartCount() {
    const cartCounter = document.querySelector('.shopping-cart-button span');
    if (cartCounter) {
        const count = cartItems.reduce((total, item) => total + item.quantity, 0);
        cartCounter.textContent = count;
    }
}

// Update the cart total price
// Update the cart total price
function updateCartTotal() {
    cartTotal = cartItems.reduce((total, item) => {
        return total + (item.price * item.quantity);
    }, 0);

    // Calculate delivery fee (example: free for orders over $50, otherwise $5)
    const deliveryFee = cartTotal > 50 ? 0 : 5;
    const finalTotal = cartTotal + deliveryFee;

    // Update subtotal in the footer price breakdown
    const subtotalElement = document.querySelector('#cartSidebar .border-t .flex:first-child .font-bold');
    if (subtotalElement) {
        subtotalElement.textContent = `$${cartTotal.toFixed(2)}`;
    }

    // Update delivery fee if that element exists
    const deliveryFeeElement = document.querySelector('#cartSidebar .delivery-fee');
    if (deliveryFeeElement) {
        deliveryFeeElement.textContent = `$${deliveryFee.toFixed(2)}`;
    }

    // Update total if that element exists
    const finalTotalElement = document.querySelector('#cartSidebar .cart-total');
    if (finalTotalElement) {
        finalTotalElement.textContent = `$${finalTotal.toFixed(2)}`;
    }
}
// Render all items in the cart
function renderCartItems() {
    const cartContainer = document.querySelector('#cartSidebar .p-4.overflow-y-auto');

    if (!cartContainer) return;

    if (cartItems.length === 0) {
        cartContainer.innerHTML = `
            <div class="flex flex-col items-center justify-center h-full py-8">
                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <p class="text-gray-500">Your cart is empty</p>
                <button onclick="toggleCart()" class="mt-4 text-primary hover:text-[#e67100] transition-colors">
                    Continue Shopping
                </button>
            </div>
        `;
        return;
    }

    let cartHTML = '';

    cartItems.forEach(item => {
        cartHTML += `
            <div class="flex items-center py-4 border-b border-gray-100">
                <div class="w-16 h-16 rounded-lg overflow-hidden">
                    <img src="${item.image}" alt="${item.name}" class="w-full h-full object-cover">
                </div>
                <div class="flex-1 px-4">
                    <h4 class="text-sm font-medium text-gray-800">${item.name}</h4>
                    <div class="flex items-center mt-1">
                        <div class="flex border border-gray-200 rounded">
                            <button onclick="updateCartItemQuantity('${item.id}', -1)" class="px-2 py-1 text-xs">-</button>
                            <span class="px-2 py-1 text-xs border-x border-gray-200">${item.quantity}</span>
                            <button onclick="updateCartItemQuantity('${item.id}', 1)" class="px-2 py-1 text-xs">+</button>
                        </div>
                        <span class="text-primary font-medium text-sm ml-2">$${(item.price * item.quantity).toFixed(2)}</span>
                    </div>
                </div>
                <button onclick="removeCartItem('${item.id}')" class="text-gray-400 hover:text-gray-600 p-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        `;
    });

    cartContainer.innerHTML = cartHTML;
}

// Update quantity of an item in cart
function updateCartItemQuantity(productId, change) {
    const item = cartItems.find(item => item.id === productId);

    if (item) {
        item.quantity += change;

        if (item.quantity < 1) {
            removeCartItem(productId);
            return;
        }

        updateCartTotal();
        renderCartItems();
        saveCart();
    }
}

// Save cart to local storage
function saveCart() {
    localStorage.setItem('dronoCart', JSON.stringify(cartItems));
}

// Load cart from local storage
function loadCart() {
    const savedCart = localStorage.getItem('dronoCart');
    if (savedCart) {
        cartItems = JSON.parse(savedCart);
        updateCartCount();
        updateCartTotal();
        renderCartItems();
    }
}

// Initialize the cart when the DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Load saved cart
    loadCart();

    // Add click handler to cart button if it exists
    const cartButton = document.querySelector('.shopping-cart-button');
    if (cartButton) {
        cartButton.addEventListener('click', function(e) {
            e.preventDefault();
            toggleCart();
        });
    }

    // Add click handler to quantity buttons in modals
    const decreaseButtons = document.querySelectorAll('.flex.border.border-gray-300 button:first-child');
    const increaseButtons = document.querySelectorAll('.flex.border.border-gray-300 button:last-child');

    decreaseButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            updateQuantity(this, -1);
        });
    });

    increaseButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            updateQuantity(this, 1);
        });
    });
});
