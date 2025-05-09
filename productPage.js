import products from './products.js';

document.addEventListener('DOMContentLoaded', function() {
    // Get product ID from URL parameter
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get('id') || 'backflip-strike'; // Default to first product if no ID provided
    
    // Load product data
    loadProductData(productId);
    
    // Setup event listeners
    setupQuantityControls();
    setupAddToCartButton();
    setupBuyNowButton();
});

// More robust product ID handling
function getProductById(productId) {
    // First try direct lookup
    if (products[productId]) {
        return products[productId];
    }
    
    // Try case-insensitive matching and handle dashes/spaces
    const normalizedId = productId.toLowerCase().replace(/\s+/g, '-');
    
    // Check normalized keys
    for (const key in products) {
        const normalizedKey = key.toLowerCase().replace(/\s+/g, '-');
        if (normalizedKey === normalizedId) {
            return products[key];
        }
    }
    
    // Try fuzzy matching
    for (const key in products) {
        if (key.toLowerCase().includes(productId.toLowerCase()) || 
            productId.toLowerCase().includes(key.toLowerCase())) {
            return products[key];
        }
    }
    
    return null;
}

function loadProductData(productId) {
    const product = getProductById(productId);
    
    if (!product) {
        showProductNotFound();
        return;
    }
    
    // Set page title
    document.title = `${product.name} - Motoworld`;
    
    // Update breadcrumb
    document.getElementById('category-link').textContent = product.category;
    document.getElementById('product-name').textContent = product.name;
    
    // Set product name
    document.getElementById('product-title').textContent = product.name;
    
    // Set prices
    document.getElementById('current-price').textContent = `₱${product.currentPrice.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}`;
    document.getElementById('original-price').textContent = `₱${product.originalPrice.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})}`;
    
    // Set discount badge if applicable
    const discountBadge = document.getElementById('discount-badge');
    if (product.discount) {
        discountBadge.textContent = `-${product.discount}%`;
        discountBadge.style.display = 'block';
    } else {
        discountBadge.style.display = 'none';
    }
    
    // Set main product image
    const mainImage = document.getElementById('main-product-image');
    mainImage.src = product.mainImage;
    mainImage.alt = product.name;
    
    // Add additional images if available
    const additionalImagesContainer = document.getElementById('additional-images');
    additionalImagesContainer.innerHTML = ''; // Clear existing images
    
    if (product.additionalImages && product.additionalImages.length > 0) {
        product.additionalImages.forEach(imgSrc => {
            const imgElement = document.createElement('img');
            imgElement.src = imgSrc;
            imgElement.alt = product.name;
            imgElement.className = 'thumbnail';
            imgElement.addEventListener('click', () => {
                mainImage.src = imgSrc;
            });
            additionalImagesContainer.appendChild(imgElement);
        });
        
        // Add main image as thumbnail too
        const mainThumbnail = document.createElement('img');
        mainThumbnail.src = product.mainImage;
        mainThumbnail.alt = product.name;
        mainThumbnail.className = 'thumbnail';
        mainThumbnail.addEventListener('click', () => {
            mainImage.src = product.mainImage;
        });
        additionalImagesContainer.appendChild(mainThumbnail);
    }
    
    // Set product description if available
    const descriptionContainer = document.getElementById('product-description');
    if (product.description) {
        descriptionContainer.textContent = product.description;
        descriptionContainer.style.display = 'block';
    } else {
        descriptionContainer.style.display = 'none';
    }
    
    // Set ratings and reviews
    const ratingStarsContainer = document.getElementById('rating-stars');
    ratingStarsContainer.innerHTML = ''; // Clear existing stars
    
    for (let i = 1; i <= 5; i++) {
        const starIcon = document.createElement('i');
        if (i <= product.reviews.averageRating) {
            starIcon.className = 'fas fa-star'; // Filled star
        } else if (i - 0.5 <= product.reviews.averageRating) {
            starIcon.className = 'fas fa-star-half-alt'; // Half star
        } else {
            starIcon.className = 'far fa-star'; // Empty star
        }
        ratingStarsContainer.appendChild(starIcon);
    }
    
    document.getElementById('review-count').textContent = 
        `${product.reviews.averageRating.toFixed(1)} (${product.reviews.count} Reviews)`;
    
    // Handle color options section
    const colorOptionsContainer = document.getElementById('color-options');
    const colorOptionsSection = document.querySelector('.color-options-section');
    colorOptionsContainer.innerHTML = ''; // Clear existing options
    
    // Check if product has colors
    if (product.colors && product.colors.length > 0) {
        // Show color options section
        if (colorOptionsSection) {
            colorOptionsSection.style.display = 'block';
        }
        
        product.colors.forEach(color => {
            const colorOption = document.createElement('div');
            colorOption.className = `color-option ${color.available ? '' : 'unavailable'} ${color.default ? 'selected' : ''}`;
            colorOption.style.backgroundColor = color.code;
            colorOption.title = color.name;
            
            if (color.available) {
                colorOption.addEventListener('click', function() {
                    // Remove selected class from all color options
                    document.querySelectorAll('.color-option').forEach(opt => {
                        opt.classList.remove('selected');
                    });
                    // Add selected class to this option
                    this.classList.add('selected');
                });
            }
            
            colorOptionsContainer.appendChild(colorOption);
        });
    } else {
        // Hide color options section if no colors
        if (colorOptionsSection) {
            colorOptionsSection.style.display = 'none';
        }
    }
    
    // Handle size options section
    const sizeOptionsContainer = document.getElementById('size-options');
    const sizeOptionsSection = document.querySelector('.size-options-section');
    sizeOptionsContainer.innerHTML = ''; // Clear existing options
    
    // Check if product has sizes
    if (product.sizes && product.sizes.length > 0) {
        // Show size options section
        if (sizeOptionsSection) {
            sizeOptionsSection.style.display = 'block';
        }
        
        product.sizes.forEach(sizeData => {
            const sizeOption = document.createElement('div');
            sizeOption.className = `size-option ${sizeData.available ? '' : 'unavailable'}`;
            sizeOption.textContent = sizeData.size;
            
            if (sizeData.available) {
                sizeOption.addEventListener('click', function() {
                    // Remove selected class from all size options
                    document.querySelectorAll('.size-option').forEach(opt => {
                        opt.classList.remove('selected');
                    });
                    // Add selected class to this option
                    this.classList.add('selected');
                });
            }
            
            sizeOptionsContainer.appendChild(sizeOption);
        });
        
        // Select first available size by default
        const firstAvailableSize = sizeOptionsContainer.querySelector('.size-option:not(.unavailable)');
        if (firstAvailableSize) {
            firstAvailableSize.classList.add('selected');
        }
    } else {
        // Hide size options section if no sizes
        if (sizeOptionsSection) {
            sizeOptionsSection.style.display = 'none';
        }
    }
    
    // Set pickup information
    document.getElementById('pickup-location').textContent = product.pickupLocation || 'Motoworld E-commerce Warehouse';
    document.getElementById('pickup-time').textContent = product.pickupTime || 'Usually ready in 2-4 days';
}

function showProductNotFound() {
    document.querySelector('.product-container').innerHTML = `
        <div class="product-not-found">
            <h2>Product Not Found</h2>
            <p>Sorry, the product you're looking for is not available.</p>
            <a href="shop.html" class="back-to-shop-btn">Back to Shop</a>
        </div>
    `;
}

function setupQuantityControls() {
    const decreaseBtn = document.querySelector('.quantity-btn.decrease');
    const increaseBtn = document.querySelector('.quantity-btn.increase');
    const quantityInput = document.querySelector('.quantity-input');
    
    decreaseBtn.addEventListener('click', () => {
        let quantity = parseInt(quantityInput.value);
        if (quantity > 1) {
            quantityInput.value = quantity - 1;
        }
    });
    
    increaseBtn.addEventListener('click', () => {
        let quantity = parseInt(quantityInput.value);
        quantityInput.value = quantity + 1;
    });
}

function setupAddToCartButton() {
    const addToCartBtn = document.querySelector('.add-to-cart-btn');
    
    addToCartBtn.addEventListener('click', () => {
        if (addProductToCart()) {
            showSuccessMessage('Product added to cart successfully!');
        }
    });
}

function setupBuyNowButton() {
    const buyNowBtn = document.querySelector('.buy-now-btn');
    
    buyNowBtn.addEventListener('click', () => {
        if (addProductToCart()) {
            // Redirect to cart page for checkout
            window.location.href = 'cart.html';
        }
    });
}

function addProductToCart() {
    const quantity = parseInt(document.querySelector('.quantity-input').value);
    const selectedColor = document.querySelector('.color-option.selected');
    const selectedSize = document.querySelector('.size-option.selected');
    const colorOptionsExist = document.querySelector('.color-option') !== null;
    const sizeOptionsExist = document.querySelector('.size-option') !== null;
    
    // Only validate color selection if color options exist
    if (colorOptionsExist && !selectedColor) {
        alert('Please select a color');
        return false;
    }
    
    // Only validate size selection if size options exist
    if (sizeOptionsExist && !selectedSize) {
        alert('Please select a size');
        return false;
    }
    
    // Get the product ID from URL
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get('id') || 'backflip-strike';
    
    // Get product details
    const product = getProductById(productId);
    if (!product) {
        alert('Error: Product not found');
        return false;
    }
    
    // Create cart item object
    const cartItem = {
        id: productId,
        name: product.name,
        price: product.currentPrice,
        color: selectedColor ? selectedColor.title : null,
        size: selectedSize ? selectedSize.textContent : null,
        quantity: quantity,
        image: product.mainImage
    };
    
    // Get existing cart from localStorage or initialize empty array
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    
    // Check if product with same variant already exists in cart
    const existingItemIndex = cart.findIndex(item => {
        // For products with variants, check all variant properties
        if (cartItem.color !== null && cartItem.size !== null) {
            return item.id === cartItem.id && 
                   item.color === cartItem.color && 
                   item.size === cartItem.size;
        } 
        // For products with only color
        else if (cartItem.color !== null && cartItem.size === null) {
            return item.id === cartItem.id && 
                   item.color === cartItem.color;
        }
        // For products with only size
        else if (cartItem.color === null && cartItem.size !== null) {
            return item.id === cartItem.id && 
                   item.size === cartItem.size;
        }
        // For products with no variants
        else {
            return item.id === cartItem.id;
        }
    });
    
    if (existingItemIndex !== -1) {
        // Update quantity of existing item
        cart[existingItemIndex].quantity += quantity;
    } else {
        // Add new item to cart
        cart.push(cartItem);
    }
    
    // Save updated cart to localStorage
    localStorage.setItem('cart', JSON.stringify(cart));
    
    // Update cart counter in header if it exists
    updateCartCounter();
    
    return true;
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

function showSuccessMessage(message) {
    // Check if a success message already exists
    let successMessage = document.querySelector('.success-message');
    
    // If not, create a new one
    if (!successMessage) {
        successMessage = document.createElement('div');
        successMessage.className = 'success-message';
        document.body.appendChild(successMessage);
    }
    
    // Set message and show
    successMessage.textContent = message;
    successMessage.classList.add('show');
    
    // Add styles if they don't exist
    if (!document.getElementById('success-message-styles')) {
        const styles = document.createElement('style');
        styles.id = 'success-message-styles';
        styles.textContent = `
            .success-message {
                position: fixed;
                top: 20px;
                right: 20px;
                background-color: #4CAF50;
                color: white;
                padding: 16px 24px;
                border-radius: 4px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.2);
                z-index: 1000;
                opacity: 0;
                transform: translateY(-20px);
                transition: opacity 0.3s, transform 0.3s;
                pointer-events: none;
            }
            .success-message.show {
                opacity: 1;
                transform: translateY(0);
            }
        `;
        document.head.appendChild(styles);
    }
    
    // Hide message after 3 seconds
    setTimeout(() => {
        successMessage.classList.remove('show');
    }, 3000);
}