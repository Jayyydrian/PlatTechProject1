<?php
require_once 'guest-session.php';

// Initialize guest session if not already set
if (!isset($_SESSION['guest_mode'])) {
    $_SESSION['guest_mode'] = true;
    $_SESSION['guest_id'] = uniqid('guest_');
    $_SESSION['cart'] = array();
}

// Redirect to homepage after setting guest session
header("Location: Homepage.php");
exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Account - ST Moto & Gear</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./includes/footer.css">
    <link rel="stylesheet" href="./includes/navbar.css">
    <style>
        .guest-manager-content {
            padding-top: 80px;
            min-height: calc(100vh - 60px);
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            position: relative;
            z-index: 1;
            margin-bottom: 60px;
        }

        .guest-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .guest-header {
            background: #d91f1c;
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .guest-content {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .guest-info {
            margin-bottom: 2rem;
        }

        .guest-info h3 {
            color: #333;
            margin-bottom: 1rem;
        }

        .guest-info p {
            color: #666;
            line-height: 1.6;
        }

        .guest-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .guest-btn {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .guest-btn-primary {
            background: #d91f1c;
            color: white;
            border: none;
        }

        .guest-btn-primary:hover {
            background: #b81a18;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(217, 31, 28, 0.2);
        }

        .guest-btn-outline {
            background: transparent;
            color: #d91f1c;
            border: 2px solid #d91f1c;
        }

        .guest-btn-outline:hover {
            background: #d91f1c;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(217, 31, 28, 0.2);
        }

        @media (max-width: 768px) {
            .guest-manager-content {
                padding-top: 60px;
            }

            .guest-container {
                padding: 1rem;
            }

            .guest-content {
                padding: 1rem;
            }

            .guest-actions {
                flex-direction: column;
            }

            .guest-btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div id="navbar"></div>
    
    <div class="guest-manager-content">
        <div class="guest-container">
            <div class="guest-header">
                <h1>Welcome to ST Moto & Gear</h1>
                <p>Continue shopping as a guest</p>
            </div>

            <div class="guest-content">
                <div class="guest-info">
                    <h3>Guest Shopping Benefits</h3>
                    <p>As a guest, you can:</p>
                    <ul>
                        <li>Browse our entire product catalog</li>
                        <li>Add items to your cart</li>
                        <li>Proceed to checkout</li>
                        <li>Create an account anytime to save your information</li>
                    </ul>
                </div>

                <div class="guest-actions">
                    <a href="Homepage.php" class="guest-btn guest-btn-primary">Start Shopping</a>
                    <a href="register.php" class="guest-btn guest-btn-outline">Create an Account</a>
                </div>
            </div>
        </div>
    </div>

    <div id="footer"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Load the navbar
        fetch('./includes/navbar.php')
            .then(res => res.text())
            .then(data => document.getElementById('navbar').innerHTML = data);
        
        // Load the footer
        fetch('./includes/footer.php')
            .then(res => res.text())
            .then(data => document.getElementById('footer').innerHTML = data);
    </script>
</body>
</html> 