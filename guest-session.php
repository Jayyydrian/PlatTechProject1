<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Initialize guest session if not already set
if (!isset($_SESSION['guest_mode'])) {
    $_SESSION['guest_mode'] = true;
    $_SESSION['guest_id'] = uniqid('guest_');
    $_SESSION['cart'] = array();
}

// Function to check if user is a guest
function isGuest() {
    return isset($_SESSION['guest_mode']) && $_SESSION['guest_mode'] === true;
}

// Function to get guest ID
function getGuestId() {
    return $_SESSION['guest_id'] ?? null;
}

// Function to convert guest to registered user
function convertGuestToUser($userId) {
    if (isset($_SESSION['guest_mode'])) {
        // Transfer cart items if any
        if (isset($_SESSION['cart'])) {
            // Here you would typically transfer cart items to the user's account
            // This would require database operations
        }
        
        // Clear guest session
        unset($_SESSION['guest_mode']);
        unset($_SESSION['guest_id']);
        
        // Set user session
        $_SESSION['user_id'] = $userId;
        $_SESSION['logged_in'] = true;
    }
}
?> 