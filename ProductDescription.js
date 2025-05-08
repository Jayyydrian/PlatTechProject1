// JavaScript for Product Page Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Quantity controls
    const decreaseBtn = document.querySelector('.decrease');
    const increaseBtn = document.querySelector('.increase');
    const quantityInput = document.querySelector('.quantity-input');

    decreaseBtn.addEventListener('click', function() {
        let currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    });

    increaseBtn.addEventListener('click', function() {
        let currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
    });

    // Color selection
    const colorOptions = document.querySelectorAll('.color-option');
    colorOptions.forEach(option => {
        option.addEventListener('click', function() {
            colorOptions.forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');
        });
    });

    // Size selection
    const sizeOptions = document.querySelectorAll('.size-option:not(.unavailable)');
    sizeOptions.forEach(option => {
        option.addEventListener('click', function() {
            sizeOptions.forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');
        });
    });

    // Carousel controls
    const prevBtn = document.querySelector('.carousel-control.prev');
    const nextBtn = document.querySelector('.carousel-control.next');
    const imageCounter = document.querySelector('.image-counter');
    let currentImage = 7;
    const totalImages = 18;

    prevBtn.addEventListener('click', function() {
        if (currentImage > 1) {
            currentImage--;
            updateImageCounter();
        }
    });

    nextBtn.addEventListener('click', function() {
        if (currentImage < totalImages) {
            currentImage++;
            updateImageCounter();
        }
    });

    function updateImageCounter() {
        imageCounter.textContent = `${currentImage} / ${totalImages}`;
    }

    // Thumbnail gallery
    const thumbnails = document.querySelectorAll('.thumbnail');
    thumbnails.forEach((thumbnail, index) => {
        thumbnail.addEventListener('click', function() {
            currentImage = index + 1;
            updateImageCounter();
            // In a real implementation, this would also change the main image
        });
    });

    // Add to cart button
    const addToCartBtn = document.querySelector('.add-to-cart-btn');
    addToCartBtn.addEventListener('click', function() {
        alert('Item added to cart!');
    });

    // Buy now button
    const buyNowBtn = document.querySelector('.buy-now-btn');
    buyNowBtn.addEventListener('click', function() {
        alert('Proceeding to checkout...');
    });
});