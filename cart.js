document.addEventListener('DOMContentLoaded', function() {
    // Load cart items from localStorage
    loadCartItems();
    
    // Setup event listeners
    setupEventListeners();
});

function loadCartItems() {
    const cartItemsContainer = document.getElementById('cart-items');
    const cartEmptyMessage = document.getElementById('cart-empty-message');
    const cartSummarySection = document.getElementById('cart-summary-section');
    
    // Get cart from localStorage
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    // Update cart counter in header if it exists
    updateCartCounter();
    
    // Check if cart is empty
    if (cart.length === 0) {
        if (cartEmptyMessage) {
            cartEmptyMessage.style.display = 'block';
        }
        if (cartSummarySection) {
            cartSummarySection.style.display = 'none';
        }
        if (cartItemsContainer) {
            cartItemsContainer.innerHTML = '';
        }
        return;
    }
    
    // Hide empty message and show summary section
    if (cartEmptyMessage) {
        cartEmptyMessage.style.display = 'none';
    }
    if (cartSummarySection) {
        cartSummarySection.style.display = 'block';
    }
    
    // Clear existing items
    if (!cartItemsContainer) {
        console.error('Cart items container not found');
        return;
    }
    cartItemsContainer.innerHTML = '';
    
    // Add each item to the cart
    cart.forEach((item, index) => {
        const itemElement = createCartItemElement(item, index);
        cartItemsContainer.appendChild(itemElement);
    });
    
    // Calculate and update cart summary
    updateCartSummary();
}

function createCartItemElement(item, index) {
    const itemContainer = document.createElement('div');
    itemContainer.className = 'cart-item';
    itemContainer.dataset.index = index;
    
    // Format variant info for display
    let variantInfo = '';
    if (item.color && item.size) {
        variantInfo = `${item.color} / ${item.size}`;
    } else if (item.color) {
        variantInfo = item.color;
    } else if (item.size) {
        variantInfo = item.size;
    }
    
    // Calculate item total
    const itemTotal = item.price * item.quantity;
    
    // Create item HTML
    itemContainer.innerHTML = `
        <div class="cart-item-image">
            <img src="${item.image}" alt="${item.name}">
        </div>
        <div class="cart-item-details">
            <h3 class="cart-item-name">${item.name}</h3>
            ${variantInfo ? `<p class="cart-item-variant">${variantInfo}</p>` : ''}
            <p class="cart-item-price">₱${item.price.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}</p>
            <div class="cart-item-quantity">
                <button class="quantity-btn decrease">-</button>
                <input type="number" class="quantity-input" value="${item.quantity}" min="1" max="99">
                <button class="quantity-btn increase">+</button>
            </div>
        </div>
        <div class="cart-item-actions">
            <p class="cart-item-total">₱${itemTotal.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}</p>
            <button class="remove-item-btn">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    `;
    
    // Add event listeners to quantity buttons and remove button
    const decreaseBtn = itemContainer.querySelector('.quantity-btn.decrease');
    const increaseBtn = itemContainer.querySelector('.quantity-btn.increase');
    const quantityInput = itemContainer.querySelector('.quantity-input');
    const removeBtn = itemContainer.querySelector('.remove-item-btn');
    
    decreaseBtn.addEventListener('click', () => {
        updateItemQuantity(index, Math.max(1, parseInt(quantityInput.value) - 1));
    });
    
    increaseBtn.addEventListener('click', () => {
        updateItemQuantity(index, parseInt(quantityInput.value) + 1);
    });
    
    quantityInput.addEventListener('change', () => {
        let newQuantity = parseInt(quantityInput.value);
        // Ensure quantity is at least 1
        if (isNaN(newQuantity) || newQuantity < 1) {
            newQuantity = 1;
            quantityInput.value = 1;
        }
        updateItemQuantity(index, newQuantity);
    });
    
    removeBtn.addEventListener('click', () => {
        removeCartItem(index);
    });
    
    return itemContainer;
}

function updateItemQuantity(index, newQuantity) {
    // Get cart from localStorage
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    // Update item quantity
    if (index >= 0 && index < cart.length) {
        cart[index].quantity = newQuantity;
        
        // Save updated cart to localStorage
        localStorage.setItem('cart', JSON.stringify(cart));
        
        // Update display
        const itemContainer = document.querySelector(`.cart-item[data-index="${index}"]`);
        if (itemContainer) {
            const quantityInput = itemContainer.querySelector('.quantity-input');
            const itemTotalElement = itemContainer.querySelector('.cart-item-total');
            
            // Update quantity input
            quantityInput.value = newQuantity;
            
            // Update item total price
            const itemTotal = cart[index].price * newQuantity;
            itemTotalElement.textContent = `₱${itemTotal.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}`;
            
            // Update cart summary
            updateCartSummary();
            
            // Update cart counter
            updateCartCounter();
        }
    }
}

function removeCartItem(index) {
    // Get cart from localStorage
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    // Remove item from cart
    if (index >= 0 && index < cart.length) {
        cart.splice(index, 1);
        
        // Save updated cart to localStorage
        localStorage.setItem('cart', JSON.stringify(cart));
        
        // Reload cart items
        loadCartItems();
    }
}

function updateCartSummary() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    // Calculate subtotal
    const subtotal = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
    
    // Calculate shipping (this is just a placeholder - adjust as needed)
    const shipping = subtotal > 0 ? 150 : 0; // Example: ₱150 shipping fee
    
    // Calculate total
    const total = subtotal + shipping;
    
    console.log('Updating cart summary:', { subtotal, shipping, total });
    
    // Update summary elements
    const subtotalElement = document.getElementById('cart-subtotal');
    const shippingElement = document.getElementById('cart-shipping');
    const totalElement = document.getElementById('cart-total');
    
    if (subtotalElement) {
        subtotalElement.textContent = `₱${subtotal.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}`;
    } else {
        console.error('Cart subtotal element not found with ID: cart-subtotal');
    }
    
    if (shippingElement) {
        shippingElement.textContent = subtotal > 0 ? 
            `₱${shipping.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}` : 
            'Free';
    } else {
        console.error('Cart shipping element not found with ID: cart-shipping');
    }
    
    if (totalElement) {
        totalElement.textContent = `₱${total.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}`;
    } else {
        console.error('Cart total element not found with ID: cart-total');
    }
}

function updateCartCounter() {
    const cartCounter = document.querySelector('.cart-counter');
    if (cartCounter) {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
        cartCounter.textContent = totalItems;
        
        // Make counter visible if there are items
        if (totalItems > 0) {
            cartCounter.style.display = 'flex';
        } else {
            cartCounter.style.display = 'none';
        }
    }
}

function setupEventListeners() {
    // Continue shopping button
    const continueShoppingBtn = document.getElementById('continue-shopping-btn');
    if (continueShoppingBtn) {
        continueShoppingBtn.addEventListener('click', () => {
            window.location.href = 'shop.html';
        });
    }
    
    // Checkout button
    const checkoutBtn = document.getElementById('checkout-btn');
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', () => {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            if (cart.length === 0) {
                alert('Your cart is empty. Please add items before proceeding to checkout.');
                return;
            }
            
            // Redirect to checkout page
            window.location.href = 'checkout.html';
        });
    }
    
    // Clear cart button (if you have one)
    const clearCartBtn = document.getElementById('clear-cart-btn');
    if (clearCartBtn) {
        clearCartBtn.addEventListener('click', () => {
            if (confirm('Are you sure you want to clear your cart?')) {
                localStorage.removeItem('cart');
                loadCartItems();
            }
        });
    }
}