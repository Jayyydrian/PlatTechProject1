// Import products data
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

function loadProductData(productId) {
    const product = products[productId];
    
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
    
    // Set color options
    const colorOptionsContainer = document.getElementById('color-options');
    colorOptionsContainer.innerHTML = ''; // Clear existing options
    
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
    
    // Set size options
    const sizeOptionsContainer = document.getElementById('size-options');
    sizeOptionsContainer.innerHTML = ''; // Clear existing options
    
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
        const quantity = document.querySelector('.quantity-input').value;
        const selectedColor = document.querySelector('.color-option.selected');
        const selectedSize = document.querySelector('.size-option.selected');
        
        if (!selectedColor) {
            alert('Please select a color');
            return;
        }
        
        if (!selectedSize) {
            alert('Please select a size');
            return;
        }
        
        // Get the product ID from URL
        const urlParams = new URLSearchParams(window.location.search);
        const productId = urlParams.get('id') || 'backflip-strike';
        
        // Add to cart logic here
        console.log(`Added ${quantity} of product ${productId} to cart`);
        console.log(`Color: ${selectedColor.title}, Size: ${selectedSize.textContent}`);
        
        // Show success message
        alert('Product added to cart successfully!');
    });
}

function setupBuyNowButton() {
    const buyNowBtn = document.querySelector('.buy-now-btn');
    
    buyNowBtn.addEventListener('click', () => {
        const quantity = document.querySelector('.quantity-input').value;
        const selectedColor = document.querySelector('.color-option.selected');
        const selectedSize = document.querySelector('.size-option.selected');
        
        if (!selectedColor) {
            alert('Please select a color');
            return;
        }
        
        if (!selectedSize) {
            alert('Please select a size');
            return;
        }
        
        // Get the product ID from URL
        const urlParams = new URLSearchParams(window.location.search);
        const productId = urlParams.get('id') || 'backflip-strike';
        
        // Buy now logic here - normally this would redirect to checkout
        console.log(`Buy now: ${quantity} of product ${productId}`);
        console.log(`Color: ${selectedColor.title}, Size: ${selectedSize.textContent}`);
        
        // Redirect to checkout page (this is just a placeholder)
        alert('Redirecting to checkout...');
        // window.location.href = 'checkout.html';
    });
}