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
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Validate input
    if (empty($email) || empty($password)) {
        echo "<script>alert('All fields are required.'); window.location.href = '../Front End/login.html';</script>";
    } else {
        // Check the database for the email
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // User found, verify password
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // Password is correct, set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                echo "<script>alert('Login successful.'); window.location.href = '../Back End/welcome.php';</script>";
            } else {
                echo "<script>alert('Wrong email or password.'); window.location.href = '../Front End/login.html';</script>";
            }
        } else {
            echo "<script>alert('Wrong email or password.'); window.location.href = '../Front End/login.html';</script>";
        }
    }
}

$conn->close();
?>
