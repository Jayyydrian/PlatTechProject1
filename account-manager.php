<?php
require_once 'includes/session_check.php';
requireLogin();

// Database connection configuration
$host = 'localhost';
$dbname = 'stmoto_db';
$dbuser = 'root';
$dbpass = '';

$success_message = '';
$error_message = '';

// Display login success message if it exists
if (isset($_SESSION['login_success'])) {
    $success_message = "Welcome back, " . $_SESSION['username'] . "!";
    unset($_SESSION['login_success']);
}

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get current user data from session
    $user = getCurrentUser();

    // Handle form submissions
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['update_profile'])) {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $phone = trim($_POST['phone']);
            $address = trim($_POST['address']);

            $stmt = $conn->prepare("UPDATE tbl_acc_user SET username = ?, email = ?, phone = ?, address = ? WHERE user_id = ?");
            $stmt->execute([$username, $email, $phone, $address, $_SESSION['user_id']]);
            
            // Update session data
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['address'] = $address;
            
            $success_message = "Profile updated successfully!";
        }
        
        if (isset($_POST['update_password'])) {
            $current_password = $_POST['current_password'];
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];

            // Get current password from database
            $stmt = $conn->prepare("SELECT password FROM tbl_acc_user WHERE user_id = ?");
            $stmt->execute([$_SESSION['user_id']]);
            $current_db_password = $stmt->fetchColumn();

            if ($current_password === $current_db_password) {
                if ($new_password === $confirm_password) {
                    $stmt = $conn->prepare("UPDATE tbl_acc_user SET password = ? WHERE user_id = ?");
                    $stmt->execute([$new_password, $_SESSION['user_id']]);
                    $success_message = "Password updated successfully!";
                } else {
                    $error_message = "New passwords do not match!";
                }
            } else {
                $error_message = "Current password is incorrect!";
            }
        }
    }
} catch (PDOException $e) {
    $error_message = "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Manager - ST Moto & Gear</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./includes/footer.css">
    <link rel="stylesheet" href="./includes/navbar.css">
    <style>
        /* Compact modern styles for account manager content */
        body {
            background-color: #f0f2f5; /* Soft background color */
            font-family: 'Segoe UI', Roboto, "Helvetica Neue", Arial, sans-serif; /* Modern font stack */
            color: #333;
            line-height: 1.6; /* Improved readability */
        }

        .account-manager-content {
            padding-top: 60px; /* Reduced space from top */
            min-height: calc(100vh - 60px);
            background: #f0f2f5; /* Match body background */
            position: relative;
            z-index: 1;
            margin-bottom: 60px;
        }

        .account-manager-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('Assets/Logo/sign1.jpg'); /* Background image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: rgba(0, 0, 0, 0.4); /* Added a dark overlay */
            background-blend-mode: overlay; /* Blend the overlay with the image */
            opacity: 1; /* Set opacity of the combined background and overlay */
            z-index: -1;
        }

        .account-header {
            background: linear-gradient(to right, #e74c3c, #c0392b); /* Gradient red */
            color: white;
            padding: 1.5rem; /* Uniform padding */
            margin-bottom: 2rem; /* Reduced space below header */
            box-shadow: 0 8px 15px rgba(0,0,0,0.15); /* Stronger shadow */
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            border-radius: 8px; /* Slightly smaller rounded corners */
            flex-wrap: wrap; /* Allow items to wrap */
        }

        .account-header h1 {
            font-size: 2rem; /* Slightly smaller font size */
            margin: 0;
            flex-grow: 1;
            font-weight: 700; /* Bolder font */
            margin-right: 1rem; /* Space between title and welcome text */
            min-width: 0; /* Allow text to shrink */
        }

         .account-header p {
             font-size: 1rem; /* Slightly smaller font size */
             opacity: 0.9;
             margin: 0;
             flex-grow: 1;
             padding-top: 0.3rem; /* Reduced space below title */
             margin-right: 8rem; /* Add significant right margin to prevent overlap with absolute button */
             min-width: 0; /* Allow text to shrink */
         }

        .account-logout-btn {
            position: absolute;
            top: 50%; /* Center vertically */
            right: 1.5rem; /* Adjusted position */
            transform: translateY(-50%); /* Adjust for vertical centering */
            background: rgba(255, 255, 255, 0.2); /* Semi-transparent white */
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.5); /* Thinner border */
            padding: 0.6rem 1.2rem;
            border-radius: 20px; /* Slightly smaller pill shape */
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
            text-decoration: none;
            display: inline-block;
            z-index: 2;
            flex-shrink: 0; /* Prevent button from shrinking */
        }

        .account-logout-btn:hover {
            background: rgba(255, 255, 255, 0.3); /* More opaque white */
            border-color: white;
            transform: translateY(-50%) translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            color: white;
        }

        .account-container {
            max-width: 800px; /* Further reduced max width */
            margin: 0 auto;
            padding: 0 1rem; /* Reduced padding */
            position: relative;
        }

        .account-tabs {
            display: flex;
            gap: 1rem; /* Reduced space between tabs */
            margin-bottom: 0; /* Removed space below tabs */
            flex-wrap: wrap;
            justify-content: center; /* Center tabs */
        }

        .account-tab {
            padding: 0.8rem 1.5rem; /* Reduced padding */
            background: #fff; /* White background */
            border: none; /* No border */
            border-bottom: 2px solid transparent; /* Thinner underline effect */
            border-radius: 6px 6px 0 0; /* Slightly smaller rounded top corners */
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600; /* Bolder font */
            color: #555; /* Darker grey text */
            text-decoration: none;
            box-shadow: 0 1px 4px rgba(0,0,0,0.05);
            text-align: center; /* Ensure text is centered */
            flex-grow: 1; /* Allow tabs to grow */
            flex-basis: 0; /* Distribute space evenly */
            min-width: 120px; /* Minimum width for tabs */
        }

        .account-tab:hover {
            color: #d91f1c; /* Red text on hover */
            border-bottom-color: #d91f1c; /* Red underline */
            transform: translateY(-2px); /* Less lift effect */
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }

        .account-tab.active {
            background: #d91f1c; /* Red background for active */
            color: white; /* White text for active */
            border-bottom-color: #d91f1c; /* Red underline */
            box-shadow: 0 3px 10px rgba(217, 31, 28, 0.3);
            transform: translateY(-1px); /* Slight lift for active */
        }

        .account-content {
            background: rgba(255, 255, 255, 0.9); /* Semi-transparent white content background */
            padding: 1.5rem; /* Reduced padding */
            border-radius: 8px; /* Slightly smaller rounded corners */
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1); /* Reduced shadow */
        }

        .account-section {
            display: none;
            animation: fadeIn 0.5s ease-out;
        }

        .account-section.active {
            display: block;
        }

        .account-form-group {
            margin-bottom: 1.2rem; /* Reduced space below form groups */
        }

        .account-form-group label {
            display: block;
            margin-bottom: 0.6rem; /* Reduced space below labels */
            color: #555; /* Darker grey */
            font-weight: 600; /* Bolder font */
            font-size: 1rem; /* Slightly smaller font size */
        }

        .account-form-group input {
            width: 100%;
            padding: 0.8rem 1rem; /* Reduced padding */
            border: 1px solid #ccc; /* Softer border */
            border-radius: 6px; /* Slightly smaller rounded input fields */
            transition: all 0.3s ease;
            font-size: 1rem;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);
        }

        .account-form-group input:focus {
            border-color: #d91f1c; /* Red border on focus */
            box-shadow: 0 0 0 0.2rem rgba(217, 31, 28, 0.25); /* Red outline */
            outline: none;
            background-color: #fff9fa; /* Subtle pink background on focus */
        }

        .account-btn {
            background: linear-gradient(to right, #d91f1c, #b81a18); /* Gradient red button */
            color: white;
            border: none;
            padding: 0.8rem 1.5rem; /* Reduced padding */
            border-radius: 6px; /* Slightly smaller rounded button */
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600; /* Bolder font */
            text-transform: uppercase;
            letter-spacing: 0.8px; /* Slightly less letter spacing */
            box-shadow: 0 3px 12px rgba(217, 31, 28, 0.4);
            margin-top: 1rem; /* Reduced space above button */
        }

        .account-btn:hover {
            background: linear-gradient(to right, #b81a18, #9c1614); /* Darker gradient on hover */
            transform: translateY(-2px); /* Less prominent lift */
            box-shadow: 0 4px 15px rgba(217, 31, 28, 0.5);
        }

        .account-message {
            padding: 1rem; /* Reduced padding */
            border-radius: 6px; /* Slightly smaller rounded corners */
            margin-bottom: 1.5rem; /* Reduced space below messages */
            animation: slideIn 0.3s ease-out;
            font-weight: 500;
            font-size: 0.95rem; /* Slightly smaller font size */
        }

        .account-message.success {
            background: #e9f7ef; /* Lighter green */
            color: #28a745; /* Green text */
            border: 1px solid #c3e6cb;
        }

        .account-message.error {
            background: #fdeded; /* Lighter red */
            color: #dc3545; /* Red text */
            border: 1px solid #f5c6cb;
        }


        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideIn {
            from { transform: translateY(-15px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .account-container {
                max-width: 720px; /* Adjust max width for medium screens */
            }
        }

        @media (max-width: 768px) {
            .account-manager-content {
                padding-top: 50px; /* Adjust padding for smaller screens */
            }

             .account-header {
                flex-direction: column;
                text-align: center;
                padding: 1rem;
            }

            .account-header h1 {
                 font-size: 1.8rem;
                 margin-right: 0; /* Remove right margin on small screens */
            }

            .account-header p {
                 font-size: 0.9rem;
                 padding-top: 0.2rem;
                 margin-right: 0; /* Remove right margin on small screens */
                 margin-bottom: 1rem; /* Add bottom margin below text */
            }

            .account-logout-btn {
                position: static;
                transform: none;
                margin-top: 0; /* Adjust top margin */
                width: auto;
                padding: 0.5rem 1rem;
                font-size: 0.85rem;
            }

            .account-container {
                padding: 0 0.8rem; /* Adjust padding */
            }

            .account-tabs {
                flex-direction: column;
                gap: 0.6rem; /* Adjust gap */
                margin-bottom: 0; /* Removed space below tabs */
            }

            .account-tab {
                width: 100%;
                text-align: center;
                padding: 0.7rem 1.2rem; /* Adjust padding */
            }

            .account-content {
                padding: 1.2rem; /* Adjust padding */
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }

             .account-form-group label {
                 font-size: 0.95rem;
                 margin-bottom: 0.5rem;
             }

             .account-form-group input {
                 padding: 0.7rem 0.8rem; /* Adjust padding */
                 font-size: 0.9rem;
             }

             .account-btn {
                 padding: 0.7rem 1.2rem; /* Adjust padding */
                 font-size: 0.9rem; /* Adjust font size */
                 margin-top: 0.8rem;
             }

             .account-message {
                 padding: 0.8rem;
                 margin-bottom: 1rem;
                 font-size: 0.9rem;
             }
        }

         @media (max-width: 576px) {
             .account-manager-content {
                 padding-top: 40px; /* Adjust padding for very small screens */
             }
             .account-header h1 {
                 font-size: 1.5rem;
             }
             .account-header p {
                 font-size: 0.8rem;
             }
             .account-logout-btn {
                 padding: 0.4rem 0.8rem;
                 font-size: 0.8rem;
             }
             .account-container {
                 padding: 0 0.5rem;
             }
             .account-tab {
                 padding: 0.6rem 1rem;
                 font-size: 0.9rem;
             }
             .account-content {
                 padding: 1rem;
                 border-top-left-radius: 0;
                 border-top-right-radius: 0;
             }
             .account-form-group label {
                 font-size: 0.9rem;
             }
             .account-form-group input {
                 padding: 0.6rem 0.6rem;
                 font-size: 0.85rem;
             }
             .account-btn {
                 padding: 0.6rem 1rem;
                 font-size: 0.85rem;
             }
             .account-message {
                 padding: 0.7rem;
                 font-size: 0.85rem;
             }
         }

        /* Ensure footer stays at bottom */
        .account-manager-content {
            display: flex;
            flex-direction: column;
            min-height: calc(100vh - 60px);
        }

        .account-container {
            flex: 1;
        }

        /* Prevent navbar overlap */
        .navbar {
            z-index: 1030;
        }

        /* Ensure footer stays at bottom */
        #footer {
            position: relative;
            z-index: 1;
            margin-top: auto;
        }
    </style>
</head>
<body>
    <div id="navbar"></div>
    
    <div class="account-manager-content">
        <div class="account-container">
            
            <div class="account-header">
                <h1>Account Manager</h1>
                <p>Welcome, <?php echo htmlspecialchars($user['username']); ?></p>
                <a href="logout.php" class="account-logout-btn">Logout</a>
            </div>

            <?php if ($success_message): ?>
                <div class="account-message success"><?php echo $success_message; ?></div>
            <?php endif; ?>

            <?php if ($error_message): ?>
                <div class="account-message error"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <div class="account-tabs">
                <div class="account-tab active" onclick="switchTab('profile')">Profile Information</div>
                <div class="account-tab" onclick="switchTab('security')">Security Settings</div>
            </div>

            <div class="account-content">
                <div id="profile" class="account-section active">
                    <form method="POST" action="">
                        <div class="account-form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                        </div>

                        <div class="account-form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                        </div>

                        <div class="account-form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone'] ?? ''); ?>">
                        </div>

                        <div class="account-form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($user['address'] ?? ''); ?>">
                        </div>

                        <button type="submit" name="update_profile" class="account-btn">Update Profile</button>
                    </form>
                </div>

                <div id="security" class="account-section">
                    <form method="POST" action="">
                        <div class="account-form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" id="current_password" name="current_password" required>
                        </div>

                        <div class="account-form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" id="new_password" name="new_password" required>
                        </div>

                        <div class="account-form-group">
                            <label for="confirm_password">Confirm New Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" required>
                        </div>

                        <button type="submit" name="update_password" class="account-btn">Update Password</button>
                    </form>
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

        function switchTab(tabId) {
            // Hide all sections
            document.querySelectorAll('.account-section').forEach(section => {
                section.classList.remove('active');
            });
            
            // Remove active class from all tabs
            document.querySelectorAll('.account-tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Show selected section
            document.getElementById(tabId).classList.add('active');
            
            // Add active class to clicked tab
            event.target.classList.add('active');
        }
    </script>
</body>
</html> 