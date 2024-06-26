<?php
session_start();
require 'db.php'; 
require 'security_config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || !validateCsrfToken($_POST['csrf_token'])) {
        die('CSRF token validation failed.');
    }

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    if (!preg_match("/^[a-zA-Z0-9]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+$/", $email)) {
        die("Please enter a valid email address.");
    }
    if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}$/", $password)) {
        die("Please enter a valid password. Password must have at least 8 characters, including 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character (!, @, #, $, %, ^, &, or *).");
    }

    $email = htmlspecialchars($email);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO auth (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $hashed_password);
    
    if ($stmt->execute()) {
        echo "Registration successful!";
        
        header("Location: index.php"); // Redirect to the login page
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // If not a POST request, invoke CSRF token generation
    generateCsrfToken();
}

