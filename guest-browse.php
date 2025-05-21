<?php
require_once 'guest-session.php';

// Initialize guest session
if (!isset($_SESSION['guest_mode'])) {
    $_SESSION['guest_mode'] = true;
    $_SESSION['guest_id'] = uniqid('guest_');
    $_SESSION['cart'] = array();
}

// Redirect to homepage
header("Location: Homepage.php");
exit();
?> 