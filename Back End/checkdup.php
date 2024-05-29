<?php
$host = 'localhost';
$db = 'ecommerce';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id']; // Manually assigned ID
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_description = $_POST['product_description'];

// Check if the product already exists
$sql_check = "SELECT * FROM products WHERE id = ? OR product_name = ?";
$stmt = $conn->prepare($sql_check);
$stmt->bind_param("is", $id, $product_name);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Product with this ID or name already exists!";
} else {
    // Insert the new product
    $sql_insert = "INSERT INTO products (id, product_name, product_price, product_description) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bind_param("isds", $id, $product_name, $product_price, $product_description);

    if ($stmt->execute()) {
        echo "New product added successfully!";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}

$stmt->close();
$conn->close();
?>