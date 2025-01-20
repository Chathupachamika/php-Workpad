<?php
// File: secure_login.php

// Database connection details
$host = 'localhost';
$dbname = 'demo';
$username = 'root';
$password = '1234';

try {
    // Create PDO instance with error mode set to exception
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Collect and sanitize user input
        $user = $_POST['username'] ?? '';
        $pass = $_POST['password'] ?? '';

        // Use prepared statements to prevent SQL injection
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $stmt->execute([
            ':username' => $user,
            ':password' => $pass,
        ]);

        if ($stmt->rowCount() > 0) {
            echo "Login successful!";
        } else {
            echo "Invalid username or password!";
        }
    }
} catch (PDOException $e) {
    // Handle database connection errors
    echo "Database error: " . $e->getMessage();
}
?>