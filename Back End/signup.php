<?php
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
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);

    $target_dir = "../Profile Images/";
$target_file = $target_dir . basename($_FILES["Profilepic"]["name"]);
if (move_uploaded_file($_FILES["Profilepic"]["tmp_name"], $target_file)) {
    // File uploaded successfully
} else {
    echo "Sorry, there was an error uploading your file.";
}

    // Validate input
    if (empty($name) || empty($email) || empty($phone) || empty($password) || empty($confirm_password) || empty($target_file)) {
        echo "All fields are required.";
    } elseif ($password !== $confirm_password) {
        echo "Passwords do not match.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert into database
        $sql = "INSERT INTO users (name, email, phone, address, password, profile_img) VALUES ('$name', '$email', '$phone', '$address', '$hashed_password', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Registration Successful.'); window.location.href = '../Front End/login.html';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}


$conn->close();
?>
