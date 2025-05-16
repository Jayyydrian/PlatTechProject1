<?php
// Save this as password-debug.php in the same directory
// IMPORTANT: Remove this file after troubleshooting!

session_start();

// Database connection configuration
$host = 'localhost';
$dbname = 'stmoto_db';
$dbuser = 'root';
$dbpass = '';

// Initialize output
$debug_output = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $email = trim($_POST['email']);
        $password = $_POST['password'];

        // Get user from database
        $stmt = $conn->prepare("SELECT * FROM tbl_acc_user WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $debug_output .= "<h3>User found in database</h3>";
            $debug_output .= "<p>Email: " . htmlspecialchars($email) . "</p>";
            $debug_output .= "<p>Password entered: " . htmlspecialchars($password) . "</p>";
            $debug_output .= "<p>Password in DB (first 10 chars): " . htmlspecialchars(substr($user['password'], 0, 10)) . "...</p>";
            $debug_output .= "<p>Password length in DB: " . strlen($user['password']) . " characters</p>";
            
            // Test different hashing methods
            $debug_output .= "<h3>Password verification tests:</h3>";
            $debug_output .= "<ul>";
            
            // Test PHP's password_verify function (for bcrypt/Argon2)
            $result = password_verify($password, $user['password']) ? "MATCH" : "NO MATCH";
            $debug_output .= "<li>password_verify(): " . $result . "</li>";
            
            // Test MD5
            $result = (md5($password) === $user['password']) ? "MATCH" : "NO MATCH";
            $debug_output .= "<li>MD5: " . $result . "</li>";
            
            // Test SHA1
            $result = (sha1($password) === $user['password']) ? "MATCH" : "NO MATCH";
            $debug_output .= "<li>SHA1: " . $result . "</li>";
            
            // Test direct comparison (plain text)
            $result = ($password === $user['password']) ? "MATCH" : "NO MATCH";
            $debug_output .= "<li>Plain text: " . $result . "</li>";
            
            $debug_output .= "</ul>";
            
        } else {
            $debug_output = "<p>No user found with email: " . htmlspecialchars($email) . "</p>";
        }
    } catch(PDOException $e) {
        $debug_output = "<p>Connection failed: " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Debug Tool</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        form { margin: 20px 0; padding: 20px; border: 1px solid #ddd; }
        .results { margin: 20px 0; padding: 20px; border: 1px solid #ddd; background: #f9f9f9; }
        h1 { color: #333; }
        h3 { color: #666; }
        .warning { color: red; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Password Debug Tool</h1>
    <p class="warning">IMPORTANT: Delete this file after troubleshooting!</p>
    
    <form method="POST">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div style="margin-top: 10px;">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div style="margin-top: 10px;">
            <button type="submit">Test Login</button>
        </div>
    </form>
    
    <?php if (!empty($debug_output)): ?>
    <div class="results">
        <h2>Debug Results</h2>
        <?php echo $debug_output; ?>
    </div>
    <?php endif; ?>
</body>
</html>