<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wedding_bridge";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Validate input
    if (empty($username) || empty($password)) {
        echo "<script>alert('All fields are required.'); window.location.href = '../Front End/adminlogin.php';</script>";
    } else {
        // Check the database for the email
        $sql = "SELECT * FROM super_users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User found, verify password
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                echo "<script>window.location.href = '../admin Control/admin.php';</script>";
            } else {
                echo "<script>alert('Wrong email or password.'); window.location.href = '../../Front End/adminlogin.php';</script>";
            }
        } else {
            echo "<script>alert('Wrong email or password.'); window.location.href = '../../Front End/adminlogin.php';</script>";
        }
    }
}

$conn->close();
?>
