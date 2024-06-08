<?php
// Start the session (if needed for further operations)
session_start();

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wedding_bridge";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to hash the password
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Function to insert a new user
function insertUser($conn, $username, $password) {
    $hashedPassword = hashPassword($password);
    $stmt = $conn->prepare("INSERT INTO super_users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {
        echo "New user inserted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Example usage
//$username = "syeed"; // Replace with the actual username
//$password = "syeed"; // Replace with the actual password

insertUser($conn, $username, $password);

// Close the connection
$conn->close();
?>
