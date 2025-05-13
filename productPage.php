<?php
// Modified product page to properly interact with cart

// Database connection
$conn = new mysqli("localhost", "root", "", "stmoto_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start session for cart functionality
session_start();

// Get product ID from URL parameter
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($product_id <= 0) {
    // Redirect to shop page if no valid product ID is provided
    header("Location: Shop.php");
    exit();
}

// Fetch product details
$sql = "SELECT * FROM products WHERE product_id = $product_id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    // Redirect to shop page if product not found
    header("Location: Shop.php");
    exit();
}

$product = $result->fetch_assoc();

// Get product images (assuming multiple images are stored as comma-separated values or in a related table)
$images = [];
if (!empty($product['images'])) {
    // If images are stored as a comma-separated string
    $images = explode(',', $product['images']);
} else {
    // Default image if none is available
    $images[] = './Assets/placeholder.jpg';
}

// Get product category for breadcrumb
$category = $product['category'];

// Format prices
$current_price = $product['price'];
$original_price = $product['price']; // Adjust if you have a separate field for original price

// Calculate discount if applicable
$discount = 0;
if (isset($product['discount_percent']) && $product['discount_percent'] > 0) {
    $discount = $product['discount_percent'];
    $original_price = $current_price / (1 - ($discount / 100));
}

// Get product colors if available (assuming colors are stored in a related table or as JSON)
$colors = [];
if (isset($product['colors']) && !empty($product['colors'])) {
    // If colors are stored as a comma-separated string
    $colors = explode(',', $product['colors']);
} 

// Get product sizes if available
$sizes = [];
if (isset($product['sizes']) && !empty($product['sizes'])) {
    // If sizes are stored as a comma-separated string
    $sizes = explode(',', $product['sizes']);
}

// Get pickup location and time (these might be store settings or product-specific)
$pickup_location = "ST Moto Main Store";
$pickup_time = "Available today";

// Get product rating (you might want to calculate this from a reviews table)
$rating = isset($product['rating']) ? $product['rating'] : 0;
$review_count = isset($product['review_count']) ? $product['review_count'] : 0;

// Check for added to cart success message
$added_to_cart = isset($_GET['added']) && $_GET['added'] == 'true';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['product_name']); ?> - ST Moto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="ProductDescription.css">
    <link rel="stylesheet" href="./includes/footer.css">
    <link rel="stylesheet" href="./includes/navbar.css">
    <style>
        /* Added styles for success message */
        .success-message {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            margin: 10px 0;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .success-message i {
            margin-right: 10px;
        }
        .success-message .close-btn {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 18px;
        }
    </style>
</head>
<body>

    <div id="navbar"></div>

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="Shop.php">Shop</a><span>></span>
        <a href="Shop.php?category=<?php echo urlencode($category); ?>"><?php echo htmlspecialchars($category); ?></a><span>></span>
        <span><?php echo htmlspecialchars($product['product_name']); ?></span>
    </div>

    <!-- Success Message (shown only when item added to cart) -->
    <?php if ($added_to_cart): ?>
    <div class="success-message" id="success-message">
        <div>
            <i class="fas fa-check-circle"></i>
            Item successfully added to your cart!
            <a href="cart.php" style="color: white; text-decoration: underline; margin-left: 10px;">View Cart</a>
        </div>
        <button class="close-btn" onclick="document.getElementById('success-message').style.display='none'">×</button>
    </div>
    <?php endif; ?>

    <!-- Product Container -->
    <div class="product-container">
        <!-- Product Images Section -->
        <div class="product-images">
            <div class="main-image">
                <img id="main-product-image" src="<?php echo htmlspecialchars($images[0]); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                <?php if ($discount > 0): ?>
                <div class="discount-badge"><?php echo $discount; ?>% OFF</div>
                <?php endif; ?>
            </div>
            <div class="additional-images" id="additional-images">
                <?php foreach ($images as $index => $image): ?>
                    <img src="<?php echo htmlspecialchars($image); ?>" alt="Product Image <?php echo $index + 1; ?>" onclick="changeMainImage('<?php echo htmlspecialchars($image); ?>')">
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Product Details Section -->
        <div class="product-details">
            <div class="contact-info">
                <h3>Speak to one of our Agents:</h3>
                <a href="tel:09178842345"><i class="fas fa-phone"></i> 09178842345</a>
                <a href="mailto:email@stmoto.com"><i class="fas fa-envelope"></i> Email Us</a>
            </div>

            <h1 class="product-title"><?php echo htmlspecialchars($product['product_name']); ?></h1>
            
            <div class="price-container">
                <span class="current-price">₱<?php echo number_format($current_price, 2); ?></span>
                <?php if ($discount > 0): ?>
                <span class="original-price">₱<?php echo number_format($original_price, 2); ?></span>
                <?php endif; ?>
            </div>

            <div class="rating">
                <div class="stars">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <?php if ($i <= $rating): ?>
                            <i class="fas fa-star"></i>
                        <?php elseif ($i <= $rating + 0.5): ?>
                            <i class="fas fa-star-half-alt"></i>
                        <?php else: ?>
                            <i class="far fa-star"></i>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
                <span class="review-count"><?php echo $rating; ?> (<?php echo $review_count; ?> Reviews)</span>
            </div>

            <div class="product-description">
                <?php echo nl2br(htmlspecialchars($product['description'] ?? 'No description available.')); ?>
            </div>

            <!-- Add to cart form -->
            <form method="post" action="cart.php" id="add-to-cart-form">
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                <input type="hidden" name="add_to_cart" value="1">
                
                <?php if (!empty($colors)): ?>
                <div class="options-section">
                    <h3>Color</h3>
                    <div class="color-options">
                        <?php foreach ($colors as $color): ?>
                            <div class="color-option" style="background-color: <?php echo htmlspecialchars($color); ?>" data-color="<?php echo htmlspecialchars($color); ?>" onclick="selectColor('<?php echo htmlspecialchars($color); ?>')"></div>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="color" id="selected_color" value="">
                </div>
                <?php endif; ?>

                <?php if (!empty($sizes)): ?>
                <div class="options-section">
                    <h3>Size</h3>
                    <div class="size-options">
                        <?php foreach ($sizes as $size): ?>
                            <div class="size-option" data-size="<?php echo htmlspecialchars($size); ?>" onclick="selectSize('<?php echo htmlspecialchars($size); ?>')"><?php echo htmlspecialchars($size); ?></div>
                        <?php endforeach; ?>
                    </div>
                    <input type="hidden" name="size" id="selected_size" value="">
                </div>
                <?php endif; ?>

                <div class="quantity-section">
                    <div class="quantity-controls">
                        <button type="button" class="quantity-btn decrease">-</button>
                        <input type="text" name="quantity" class="quantity-input" value="1" readonly>
                        <button type="button" class="quantity-btn increase">+</button>
                    </div>
                    <button type="submit" class="add-to-cart-btn">Add to cart</button>
                </div>
            </form>

            <button onclick="buyNow()" class="buy-now-btn">Buy it now</button>

            <div class="pickup-info">
                <p>
                    <i class="fas fa-check"></i>
                    <span>
                        <span class="pickup-location"><?php echo htmlspecialchars($pickup_location); ?></span><br>
                        <span class="pickup-time"><?php echo htmlspecialchars($pickup_time); ?></span><br>
                        <a href="#" class="store-info-link">View store information</a>
                    </span>
                </p>
            </div>

            <div class="shipping-banner">
                <div class="shipping-icon">
                    <i class="fas fa-motorcycle"></i>
                </div>
                <div class="shipping-info">
                    <h4>Shipping Discount</h4>
                    <p>P150 OFF SHIPPING ON MIN. PURCHASE OF P1500</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Chat Button -->
    <button class="chat-button">
        <i class="fas fa-comment"></i>
    </button>

    <div id="footer"></div>
  
    <!-- JAVASCRIPT -->
    <script>
        // Load the navbar
        fetch('./includes/navbar.html')
          .then(res => res.text())
          .then(data => document.getElementById('navbar').innerHTML = data);
      
        // Load the footer
        fetch('./includes/footer.html')
          .then(res => res.text())
          .then(data => document.getElementById('footer').innerHTML = data);
          
        // Function to change the main image when clicking on thumbnail
        function changeMainImage(src) {
            document.getElementById('main-product-image').src = src;
        }
        
        // Quantity controls
        document.querySelector('.decrease').addEventListener('click', function() {
            let input = document.querySelector('.quantity-input');
            let value = parseInt(input.value);
            if (value > 1) {
                input.value = value - 1;
            }
        });
        
        document.querySelector('.increase').addEventListener('click', function() {
            let input = document.querySelector('.quantity-input');
            let value = parseInt(input.value);
            input.value = value + 1;
        });
        
        // Color selection
        function selectColor(color) {
            // Remove selected class from all options
            document.querySelectorAll('.color-option').forEach(option => {
                option.classList.remove('selected');
            });
            
            // Add selected class to chosen option
            document.querySelector(`.color-option[data-color="${color}"]`).classList.add('selected');
            
            // Update hidden input
            document.getElementById('selected_color').value = color;
        }
        
        // Size selection
        function selectSize(size) {
            // Remove selected class from all options
            document.querySelectorAll('.size-option').forEach(option => {
                option.classList.remove('selected');
            });
            
            // Add selected class to chosen option
            document.querySelector(`.size-option[data-size="${size}"]`).classList.add('selected');
            
            // Update hidden input
            document.getElementById('selected_size').value = size;
        }
        
        // Buy Now functionality
        function buyNow() {
            // Add to cart first
            document.getElementById('add-to-cart-form').submit();
            
            // Then redirect to checkout
            setTimeout(() => {
                window.location.href = 'checkout.php';
            }, 100);
        }
        
        // Auto-hide success message
        if (document.getElementById('success-message')) {
            setTimeout(() => {
                document.getElementById('success-message').style.display = 'none';
            }, 5000);
        }
    </script>
</body>
</html>
<?php $conn->close(); ?>