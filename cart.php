<?php
// Start the session to maintain cart data
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "stmoto_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle add to cart from product page
if (isset($_POST['add_to_cart'])) {
    $product_id = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
    $color = isset($_POST['color']) ? $_POST['color'] : '';
    $size = isset($_POST['size']) ? $_POST['size'] : '';
    
    if ($product_id > 0) {
        // Check if product exists in database
        $sql = "SELECT * FROM products WHERE product_id = $product_id";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            
            // Generate a unique cart item ID based on product ID and options
            $cart_item_id = $product_id;
            if (!empty($color)) $cart_item_id .= "_" . $color;
            if (!empty($size)) $cart_item_id .= "_" . $size;
            
            // Check if this item is already in cart
            if (isset($_SESSION['cart'][$cart_item_id])) {
                // Update quantity
                $_SESSION['cart'][$cart_item_id]['quantity'] += $quantity;
            } else {
                // Add new item to cart
                $_SESSION['cart'][$cart_item_id] = [
                    'product_id' => $product_id,
                    'name' => $product['product_name'],
                    'price' => $product['price'],
                    'quantity' => $quantity,
                    'image' => !empty($product['images']) ? explode(',', $product['images'])[0] : './Assets/placeholder.jpg',
                    'color' => $color,
                    'size' => $size
                ];
            }
            
            // Redirect back to product page with success message
            header("Location: productPage.php?id=$product_id&added=true");
            exit();
        }
    }
}

// Handle remove from cart
if (isset($_POST['remove_item'])) {
    $cart_item_id = $_POST['cart_item_id'];
    if (isset($_SESSION['cart'][$cart_item_id])) {
        unset($_SESSION['cart'][$cart_item_id]);
    }
    // Redirect back to cart
    header("Location: cart.php");
    exit();
}

// Handle update quantity
if (isset($_POST['update_quantity'])) {
    $cart_item_id = $_POST['cart_item_id'];
    $new_quantity = (int)$_POST['quantity'];
    
    if (isset($_SESSION['cart'][$cart_item_id]) && $new_quantity > 0) {
        $_SESSION['cart'][$cart_item_id]['quantity'] = $new_quantity;
    }
    
    // Redirect back to cart
    header("Location: cart.php");
    exit();
}

// Calculate cart totals
$subtotal = 0;
$shipping = 0;
foreach ($_SESSION['cart'] as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}

// Set shipping fee (can be adjusted based on your business logic)
if ($subtotal > 0) {
    $shipping = 150; // Standard shipping fee
    
    // Apply free shipping for orders over PHP 1500
    if ($subtotal >= 1500) {
        $shipping = 0;
    }
}

$total = $subtotal + $shipping;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="./includes/footer.css">
    <link rel="stylesheet" href="./includes/navbar.css">
    <style>
        /* Cart container styles */
        .cart-container {
            padding: 20px;
        }
        
        .cart-content {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        
        .cart-items {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        
        /* Additional style to ensure images are consistent */
        .item-image {
            width: 300px;
            height: 300px;
            min-width: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-right: 20px;
            border: 2px solid #f0f0f0;
            border-radius: 6px;
        }
        
        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        /* Improved layout for cart items */
        .cart-item {
            display: flex;
            align-items: center;
            padding: 20px;
            position: relative;
            border-bottom: 2px solid #e0e0e0;
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }
        
        .cart-item:last-child {
            border-bottom: none;
        }
        
        .item-details {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 10px;
        }
        
        .item-info {
            margin-bottom: 15px;
        }
        
        .item-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 15px 0;
            padding: 10px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        
        .quantity-form {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .quantity-controls {
            display: flex;
            align-items: center;
            border: 2px solid #ddd;
            border-radius: 4px;
            overflow: hidden;
        }
        
        .quantity-btn {
            width: 34px;
            height: 34px;
            border: none;
            background: #f0f0f0;
            cursor: pointer;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.2s;
        }
        
        .quantity-btn:hover {
            background: #e0e0e0;
        }
        
        .quantity-input {
            width: 46px;
            height: 34px;
            text-align: center;
            border: none;
            border-left: 2px solid #ddd;
            border-right: 2px solid #ddd;
            font-weight: bold;
        }
        
        .update-btn {
            padding: 8px 18px;
            background: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.2s;
        }
        
        .update-btn:hover {
            background: #555;
        }
        
        .remove-form {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        
        .remove-btn {
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: color 0.2s;
        }
        
        .remove-btn:hover {
            color: #e74c3c;
        }
        
        .item-total {
            min-width: 100px;
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-left: 20px;
            align-self: center;
            padding: 10px 15px;
            border-left: 2px solid #e0e0e0;
        }
        
        /* Mobile adjustments */
        @media (max-width: 768px) {
            .cart-item {
                flex-direction: column;
                align-items: flex-start;
                padding-top: 40px; /* Space for the remove button */
            }
            
            .item-image {
                margin: 0 auto 15px;
                width: 250px;
                height: 250px;
                min-width: 250px;
            }
            
            .remove-form {
                top: 10px;
                right: 10px;
            }
            
            .item-actions {
                width: 100%;
            }
            
            .quantity-form {
                width: 100%;
                justify-content: space-between;
            }
            
            .item-total {
                margin-left: 0;
                margin-top: 15px;
                align-self: flex-start;
                border-left: none;
                border-top: 2px solid #e0e0e0;
                padding-top: 15px;
                width: 100%;
                text-align: center;
            }
        }
        
        /* Summary styles */
        .cart-summary {
            background: #fff;
            padding: 20px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }
        
        .summary-row.total {
            font-size: 20px;
            font-weight: bold;
            border-top: 2px solid #e0e0e0;
            border-bottom: none;
            margin-top: 10px;
            padding-top: 15px;
        }
        
        .promo-code {
            margin: 20px 0;
            display: flex;
            gap: 10px;
        }
        
        .promo-code input {
            flex: 1;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 4px;
        }
        
        .promo-code button {
            padding: 10px 20px;
            background: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .buttons-container {
            margin: 20px 0;
        }
        
        .checkout-btn {
            display: block;
            width: 100%;
            padding: 15px;
            background: #2ecc71;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 10px;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(46, 204, 113, 0.2);
            transition: background-color 0.2s;
        }
        
        .checkout-btn:hover {
            background: #27ae60;
        }
        
        .continue-shopping {
            display: block;
            width: 100%;
            padding: 12px;
            background: #f8f8f8;
            color: #333;
            text-align: center;
            text-decoration: none;
            border: 2px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: background-color 0.2s;
        }
        
        .continue-shopping:hover {
            background: #eee;
        }
        
        .payment-methods {
            margin-top: 20px;
            text-align: center;
        }
        
        .payment-icons {
            margin-top: 10px;
            font-size: 24px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        
        /* Empty cart styles */
        .empty-cart {
            text-align: center;
            padding: 40px 20px;
            background: #fff;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .empty-cart i {
            font-size: 48px;
            color: #ddd;
            margin-bottom: 20px;
        }
        
        .empty-cart p {
            font-size: 18px;
            color: #777;
            margin-bottom: 20px;
        }
        
        .continue-shopping-btn {
            display: inline-block;
            padding: 12px 24px;
            background: #333;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.2s;
        }
        
        .continue-shopping-btn:hover {
            background: #555;
        }
    </style>
</head>
<body>

    <div id="navbar"></div>

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="homepage.php">Home</a><span>></span>
        <span>Shopping Cart</span>
    </div>

    <div class="cart-container">
        <h1>Your Cart</h1>
        
        <div class="cart-content">
            <div class="cart-items" id="cart-items">
                <?php if (count($_SESSION['cart']) > 0): ?>
                    <?php foreach ($_SESSION['cart'] as $cart_item_id => $item): ?>
                        <div class="cart-item">
                            <div class="item-image">
                                <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                            </div>
                            <div class="item-details">
                                <div class="item-info">
                                    <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                                    <?php if (!empty($item['color'])): ?>
                                        <p class="item-option">Color: <?php echo htmlspecialchars($item['color']); ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($item['size'])): ?>
                                        <p class="item-option">Size: <?php echo htmlspecialchars($item['size']); ?></p>
                                    <?php endif; ?>
                                    <p class="item-price">₱<?php echo number_format($item['price'], 2); ?></p>
                                </div>
                                
                                <div class="item-actions">
                                    <form method="post" class="quantity-form">
                                        <input type="hidden" name="cart_item_id" value="<?php echo $cart_item_id; ?>">
                                        <div class="quantity-controls">
                                            <button type="button" class="quantity-btn decrease">-</button>
                                            <input type="text" name="quantity" class="quantity-input" value="<?php echo $item['quantity']; ?>" readonly>
                                            <button type="button" class="quantity-btn increase">+</button>
                                        </div>
                                        <button type="submit" name="update_quantity" class="update-btn">Update</button>
                                    </form>
                                </div>
                            </div>
                            
                            <form method="post" class="remove-form">
                                <input type="hidden" name="cart_item_id" value="<?php echo $cart_item_id; ?>">
                                <button type="submit" name="remove_item" class="remove-btn">
                                    <i class="fas fa-trash"></i> Remove
                                </button>
                            </form>
                            
                            <div class="item-total">
                                <span>₱<?php echo number_format($item['price'] * $item['quantity'], 2); ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <!-- Empty cart message -->
            <?php if (count($_SESSION['cart']) == 0): ?>
                <div class="empty-cart" id="cart-empty-message">
                    <i class="fas fa-shopping-cart"></i>
                    <p>Your cart is empty</p>
                    <a href="shop.php" class="continue-shopping-btn">Continue Shopping</a>
                </div>
            <?php endif; ?>
            
            <?php if (count($_SESSION['cart']) > 0): ?>
                <div class="cart-summary" id="cart-summary-section">
                    <h2>Order Summary</h2>
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span id="cart-subtotal">₱<?php echo number_format($subtotal, 2); ?></span>
                    </div>
                    <div class="summary-row">
                        <span>Shipping</span>
                        <span id="cart-shipping">₱<?php echo number_format($shipping, 2); ?></span>
                    </div>
                    <div class="summary-row total">
                        <span>Total</span>
                        <span id="cart-total">₱<?php echo number_format($total, 2); ?></span>
                    </div>
                    
                    <div class="promo-code">
                        <input type="text" placeholder="Promo Code">
                        <button>Apply</button>
                    </div>
                    
                    <div class="buttons-container">
                        <a href="checkout.php" id="checkout-btn" class="checkout-btn">Proceed to Checkout</a>
                        <a href="shop.php" class="continue-shopping">Continue Shopping</a>
                    </div>
                    
                    <div class="payment-methods">
                        <p>We accept:</p>
                        <div class="payment-icons">
                            <i class="fab fa-cc-visa"></i>
                            <i class="fab fa-cc-mastercard"></i>
                            <i class="fab fa-cc-amex"></i>
                            <i class="fab fa-cc-paypal"></i>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
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
          
        // Quantity controls for cart items
        document.querySelectorAll('.quantity-btn.decrease').forEach(btn => {
            btn.addEventListener('click', function() {
                let input = this.parentElement.querySelector('.quantity-input');
                let value = parseInt(input.value);
                if (value > 1) {
                    input.value = value - 1;
                }
            });
        });
        
        document.querySelectorAll('.quantity-btn.increase').forEach(btn => {
            btn.addEventListener('click', function() {
                let input = this.parentElement.querySelector('.quantity-input');
                let value = parseInt(input.value);
                input.value = value + 1;
            });
        });
    </script>
</body>
</html>
<?php $conn->close(); ?>