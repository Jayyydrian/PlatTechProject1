<?php
// This file serves as an AJAX endpoint to retrieve order items

// Start the session
session_start();

// Check if admin is logged in (implement proper authentication in production)
// For testing, we'll use a simple flag
$is_admin = true; // In production, use proper authentication

if (!$is_admin) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Unauthorized access']);
    exit();
}

// Database connection
$conn = new mysqli("localhost", "root", "", "stmoto_db");

// Check connection
if ($conn->connect_error) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Database connection failed']);
    exit();
}

// Get order ID from request
$order_id = isset($_GET['order_id']) ? (int)$_GET['order_id'] : 0;

if ($order_id <= 0) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Invalid order ID']);
    exit();
}

// Prepare the query to get order items with product details
$sql = "SELECT oi.order_item_id, oi.product_id, oi.quantity, oi.price, 
               p.product_name
        FROM order_items oi
        LEFT JOIN products p ON oi.product_id = p.product_id
        WHERE oi.order_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();

$items = [];
while ($row = $result->fetch_assoc()) {
    // Handle null product name (in case product was deleted)
    if ($row['product_name'] === null) {
        $row['product_name'] = 'Product ID: ' . $row['product_id'] . ' (deleted)';
    }
    
    $items[] = [
        'order_item_id' => $row['order_item_id'],
        'product_id' => $row['product_id'],
        'product_name' => htmlspecialchars($row['product_name']),
        'quantity' => $row['quantity'],
        'price' => $row['price']
    ];
}

// Send response
header('Content-Type: application/json');
echo json_encode([
    'order_id' => $order_id,
    'items' => $items
]);

$stmt->close();
$conn->close();
?>