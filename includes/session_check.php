<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

// Check session timeout (30 minutes)
function checkSessionTimeout() {
    $timeout = 30 * 60; // 30 minutes in seconds
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $timeout)) {
        // Session has expired
        session_unset();
        session_destroy();
        return false;
    }
    // Update last activity time
    $_SESSION['last_activity'] = time();
    return true;
}

// Function to require login
function requireLogin() {
    if (!isLoggedIn() || !checkSessionTimeout()) {
        header("Location: guest-manager.php");
        exit();
    }
}

// Function to get current user data
function getCurrentUser() {
    if (isLoggedIn()) {
        return [
            'id' => $_SESSION['user_id'],
            'username' => $_SESSION['username'],
            'email' => $_SESSION['email'],
            'phone' => $_SESSION['phone'] ?? null,
            'address' => $_SESSION['address'] ?? null
        ];
    }
    return null;
}
?> 