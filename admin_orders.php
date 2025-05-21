<?php
// Start the session
session_start();

// Check if admin is logged in (implement proper authentication in production)
// For testing, we'll use a simple flag
$is_admin = true; // In production, use proper authentication

if (!$is_admin) {
    header("Location: login.php"); // Redirect to login page if not admin
    exit();
}

// Database connection
$conn = new mysqli("localhost", "root", "", "stmoto_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle order status update
if (isset($_POST['update_status'])) {
    $order_id = (int)$_POST['order_id'];
    $new_status = $_POST['new_status'];
    
    $update_sql = "UPDATE orders SET status = ? WHERE order_id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("si", $new_status, $order_id);
    
    if ($stmt->execute()) {
        $status_message = "Order #$order_id status updated to $new_status";
    } else {
        $status_message = "Error updating order status: " . $conn->error;
    }
    $stmt->close();
}

// Handle order deletion
if (isset($_POST['delete_order'])) {
    $order_id = (int)$_POST['order_id'];
    
    // Start transaction
    $conn->begin_transaction();
    
    try {
        // Delete order items first (foreign key constraint)
        $delete_items_sql = "DELETE FROM order_items WHERE order_id = ?";
        $stmt = $conn->prepare($delete_items_sql);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $stmt->close();
        
        // Then delete the order
        $delete_order_sql = "DELETE FROM orders WHERE order_id = ?";
        $stmt = $conn->prepare($delete_order_sql);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $stmt->close();
        
        // Commit transaction
        $conn->commit();
        $status_message = "Order #$order_id deleted successfully";
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        $status_message = "Error deleting order: " . $e->getMessage();
    }
}

// Filter and search functionality
$search = isset($_GET['search']) ? $_GET['search'] : '';
$status_filter = isset($_GET['status_filter']) ? $_GET['status_filter'] : 'all';
$date_from = isset($_GET['date_from']) ? $_GET['date_from'] : '';
$date_to = isset($_GET['date_to']) ? $_GET['date_to'] : '';

// First get all order items
$items_query = "SELECT oi.order_id, oi.product_id, p.product_name, oi.quantity, oi.price 
                FROM order_items oi 
                JOIN products p ON oi.product_id = p.product_id 
                ORDER BY oi.order_id";
$items_result = $conn->query($items_query);

// Store items by order_id
$order_items = [];
if ($items_result && $items_result->num_rows > 0) {
    while ($item = $items_result->fetch_assoc()) {
        $order_id = $item['order_id'];
        if (!isset($order_items[$order_id])) {
            $order_items[$order_id] = [];
        }
        $order_items[$order_id][] = $item;
    }
}

// Build the query with filters
$query = "SELECT o.order_id, o.order_date, o.total_amount, o.shipping_fee, o.status 
          FROM orders o WHERE 1=1";

// Apply search filter if provided
if (!empty($search)) {
    $query .= " AND o.order_id LIKE '%" . $conn->real_escape_string($search) . "%'";
}

// Apply status filter if provided
if (!empty($status_filter) && $status_filter != 'all') {
    $query .= " AND o.status = '" . $conn->real_escape_string($status_filter) . "'";
}

// Apply date range filter if provided
if (!empty($date_from)) {
    $query .= " AND o.order_date >= '" . $conn->real_escape_string($date_from) . "'";
}
if (!empty($date_to)) {
    $query .= " AND o.order_date <= '" . $conn->real_escape_string($date_to) . " 23:59:59'";
}

// Add sorting
$query .= " ORDER BY o.order_date DESC";

// Execute the query
$result = $conn->query($query);

// Get list of statuses for filter dropdown
$statuses_query = "SELECT DISTINCT status FROM orders ORDER BY status";
$statuses_result = $conn->query($statuses_query);
$statuses = [];
while ($status_row = $statuses_result->fetch_assoc()) {
    $statuses[] = $status_row['status'];
}

// Handle export to CSV
if (isset($_POST['export_csv'])) {
    // Set headers for CSV download
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=orders_export_' . date('Y-m-d') . '.csv');
    
    // Create output stream
    $output = fopen('php://output', 'w');
    
    // Add BOM for UTF-8
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
    
    // Add CSV header row
    fputcsv($output, ['Order ID', 'Date', 'Total Amount', 'Shipping Fee', 'Status']);
    
    // Reset result pointer
    $result->data_seek(0);
    
    // Add data rows
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, [
            $row['order_id'],
            $row['order_date'],
            $row['total_amount'],
            $row['shipping_fee'],
            $row['status']
        ]);
    }
    
    fclose($output);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Order Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        
        .admin-container {
            padding: 20px;
        }
        
        .admin-header {
            background-color: #212529;
            color: white;
            padding: 15px 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .filter-section {
            background-color: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .status-pending {
            background-color: #ffeeba;
            color: #856404;
        }
        
        .status-processing {
            background-color: #b8daff;
            color: #004085;
        }
        
        .status-shipped {
            background-color: #c3e6cb;
            color: #155724;
        }
        
        .status-delivered {
            background-color: #d4edda;
            color: #155724;
        }
        
        .status-cancelled {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .order-details-row {
            display: none;
            background-color: #f1f1f1;
        }
        
        .action-buttons {
            white-space: nowrap;
        }
        
        .view-details-btn {
            cursor: pointer;
        }
        
        .table-responsive {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .status-message {
            padding: 10px 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            display: none;
        }
        
        .status-message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            display: block;
        }
        
        .status-message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            display: block;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1><i class="fas fa-shopping-cart"></i> Order Management</h1>
            <div>
                <a href="admin_dashboard.php" class="btn btn-outline-light me-2">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="homepage.php" class="btn btn-outline-light">
                    <i class="fas fa-home"></i> Main Site
                </a>
            </div>
        </div>
        
        <?php if(isset($status_message)): ?>
        <div class="status-message success">
            <?php echo $status_message; ?>
        </div>
        <?php endif; ?>

        <div class="filter-section">
            <form action="" method="GET" class="row g-3">
                <div class="col-md-3">
                    <label for="search" class="form-label">Search Order ID</label>
                    <input type="text" class="form-control" id="search" name="search" placeholder="Order ID" value="<?php echo htmlspecialchars($search); ?>">
                </div>
                <div class="col-md-2">
                    <label for="status_filter" class="form-label">Status</label>
                    <select class="form-select" id="status_filter" name="status_filter">
                        <option value="all" <?php echo ($status_filter == 'all') ? 'selected' : ''; ?>>All Statuses</option>
                        <?php foreach($statuses as $status): ?>
                        <option value="<?php echo htmlspecialchars($status); ?>" <?php echo ($status_filter == $status) ? 'selected' : ''; ?>>
                            <?php echo ucfirst(htmlspecialchars($status)); ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="date_from" class="form-label">Date From</label>
                    <input type="date" class="form-control" id="date_from" name="date_from" value="<?php echo htmlspecialchars($date_from); ?>">
                </div>
                <div class="col-md-2">
                    <label for="date_to" class="form-label">Date To</label>
                    <input type="date" class="form-control" id="date_to" name="date_to" value="<?php echo htmlspecialchars($date_to); ?>">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">
                        <i class="fas fa-search"></i> Filter
                    </button>
                    <a href="admin_orders.php" class="btn btn-secondary me-2">Reset</a>
                    <form method="post" class="d-inline">
                        <button type="submit" name="export_csv" class="btn btn-success">
                            <i class="fas fa-file-export"></i> Export CSV
                        </button>
                    </form>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Total Amount</th>
                        <th>Shipping Fee</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['order_id']; ?></td>
                                <td><?php echo date('M d, Y', strtotime($row['order_date'])); ?></td>
                                <td>₱<?php echo number_format($row['total_amount'], 2); ?></td>
                                <td>₱<?php echo number_format($row['shipping_fee'], 2); ?></td>
                                <td>
                                    <span class="status-badge status-<?php echo strtolower($row['status']); ?>">
                                        <?php echo ucfirst($row['status']); ?>
                                    </span>
                                </td>
                                <td class="action-buttons">
                                    <button class="btn btn-sm btn-primary view-details-btn" 
                                            data-order-id="<?php echo $row['order_id']; ?>">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" 
                                            data-bs-target="#updateStatusModal<?php echo $row['order_id']; ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" 
                                            data-bs-target="#deleteOrderModal<?php echo $row['order_id']; ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    
                                    <!-- Update Status Modal -->
                                    <div class="modal fade" id="updateStatusModal<?php echo $row['order_id']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Update Order Status</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                                        <div class="mb-3">
                                                            <label for="new_status" class="form-label">Status</label>
                                                            <select class="form-select" name="new_status" id="new_status">
                                                                <option value="pending" <?php echo ($row['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                                                                <option value="processing" <?php echo ($row['status'] == 'processing') ? 'selected' : ''; ?>>Processing</option>
                                                                <option value="shipped" <?php echo ($row['status'] == 'shipped') ? 'selected' : ''; ?>>Shipped</option>
                                                                <option value="delivered" <?php echo ($row['status'] == 'delivered') ? 'selected' : ''; ?>>Delivered</option>
                                                                <option value="cancelled" <?php echo ($row['status'] == 'cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="update_status" class="btn btn-primary">Update Status</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Delete Order Modal -->
                                    <div class="modal fade" id="deleteOrderModal<?php echo $row['order_id']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Confirm Deletion</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete Order #<?php echo $row['order_id']; ?>? This action cannot be undone.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <form method="post">
                                                        <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                                        <button type="submit" name="delete_order" class="btn btn-danger">Delete Order</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="order-details-row" id="details-<?php echo $row['order_id']; ?>">
                                <td colspan="6">
                                    <div class="p-3">
                                        <h5>Order Items</h5>
                                        <div class="table-responsive">
                                            <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Product ID</th>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="order-items-container">
                                                    <?php 
                                                    $order_id = $row['order_id'];
                                                    if (isset($order_items[$order_id]) && !empty($order_items[$order_id])): 
                                                    ?>
                                                        <?php foreach($order_items[$order_id] as $item): ?>
                                                        <tr>
                                                            <td><?php echo $item['product_id']; ?></td>
                                                            <td><?php echo $item['product_name']; ?></td>
                                                            <td><?php echo $item['quantity']; ?></td>
                                                            <td>₱<?php echo number_format($item['price'], 2); ?></td>
                                                            <td>₱<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td colspan="5" class="text-center">No items found for this order</td>
                                                        </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-4">No orders found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle view details buttons
            document.querySelectorAll('.view-details-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const orderId = this.getAttribute('data-order-id');
                    const detailsRow = document.getElementById('details-' + orderId);
                    
                    // Toggle visibility
                    if (detailsRow.style.display === 'table-row') {
                        detailsRow.style.display = 'none';
                    } else {
                        detailsRow.style.display = 'table-row';
                    }
                });
            });
            
            // Auto-hide status messages after 5 seconds
            setTimeout(function() {
                const statusMessages = document.querySelectorAll('.status-message');
                statusMessages.forEach(message => {
                    message.style.display = 'none';
                });
            }, 5000);
        });
    </script>
</body>
</html>
<?php $conn->close(); ?>