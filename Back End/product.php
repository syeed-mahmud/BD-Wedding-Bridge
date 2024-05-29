<?php
$host = 'localhost';
$db = 'ecommerce';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.13.0/dist/full.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
    <title>E-commerce Project</title>
</head>
<body style="padding-top: 56px;">

<div class="container"></div>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];
    $id = $_POST['id'];

    $stmt = $conn->prepare("INSERT INTO products (name, description, price, image_url) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $name, $description, $price, $image_url);
    $stmt->execute();
    $stmt->close();

    echo "<p class='alert alert-success'>Product added successfully!</p>";
}

$result = $conn->query("SELECT * FROM products ORDER BY created_at DESC");
?>

<h2>Products</h2>

<form method="POST" class="mb-5">
    <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" required>
    </div>
    <div class="mb-3">
        <label for="Productid" class="form-label">ID</label>
        <input type="number" step="0.01" class="form-control" id="Productid" name="id" required>
    </div>
    <div class="mb-3">
        <label for="image_url" class="form-label">Image URL</label>
        <input type="url" class="form-control" id="image_url" name="image_url" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Product</button>
</form>

<div class="row">
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="col-md-4 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="<?= $row['image_url'] ?>" class="card-img-top" alt="<?= $row['name'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $row['name'] ?></h5>
                    <p class="card-text"><?= $row['description'] ?></p>
                    <p class="card-text"><strong>$<?= $row['price'] ?></strong></p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>