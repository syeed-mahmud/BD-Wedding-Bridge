<?php
$host = 'localhost';
$db = 'wedding_bridge';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['news_id']) && isset($_POST['news_title']) && isset($_POST['news_link']) && isset($_POST['news_content']) && isset($_POST['news_img'])) {
        $news_id = $_POST['news_id'];
        $news_title = $_POST['news_title'];
        $news_link = $_POST['news_link'];
        $news_content = $_POST['news_content'];
        $news_img = $_POST['news_img'];

        $stmt = $pdo->prepare("INSERT INTO news (news_id, news_title, news_link, news_content, news_img) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$news_id, $news_title, $news_link, $news_content, $news_img]);

        echo "<p class='alert alert-success'>News added successfully!</p>";
    } elseif (isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];

        $stmt = $pdo->prepare("DELETE FROM news WHERE news_id = ?");
        $stmt->execute([$delete_id]);

        echo "<p class='alert alert-success'>News deleted successfully!</p>";
    } elseif (isset($_POST['update_id']) && isset($_POST['update_title']) && isset($_POST['update_link']) && isset($_POST['update_content']) && isset($_POST['update_img'])) {
        $update_id = $_POST['update_id'];
        $news_title = $_POST['update_title'];
        $news_link = $_POST['update_link'];
        $news_content = $_POST['update_content'];
        $news_img = $_POST['update_img'];

        $stmt = $pdo->prepare("UPDATE news SET news_title = ?, news_link = ?, news_content = ?, news_img = ? WHERE news_id = ?");
        $stmt->execute([$news_title, $news_link, $news_content, $news_img, $update_id]);

        echo "<p class='alert alert-success'>News updated successfully!</p>";
    }
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM news WHERE news_id = ?");
    $stmt->execute([$delete_id]);
    header('location:admin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin</title>
</head>


<body style="padding-top: 2px;">

<div class="container flex-col pl-12 pt-5">
    <div class="flex gap-10">
        <form method="POST" class="card bg-base-100 shadow-xl p-10">
            <p class="text-4xl pb-10">Add News</p>
            <div class="flex gap-5">
                <div class="mb-3">
                    <label for="news_id" class="form-label">News ID</label>
                    <input type="text" class="form-control input input-bordered w-full max-w-xs mt-2" id="news_id" name="news_id" required>
                </div>
                <div class="mb-5">
                    <label for="news_title" class="form-label">News Title</label>
                    <input type="text" class="form-control input input-bordered w-full max-w-xs mt-2" id="news_title" name="news_title" required>
                </div>
            </div>
            <div class="flex gap-9">
                <div class="mb-3">
                    <label for="news_link" class="form-label">Link</label>
                    <input type="url" class="form-control input input-bordered w-full max-w-xs mt-2" id="news_link" name="news_link" required>
                </div>
                <div class="mb-3">
                    <label for="news_content" class="form-label">Content</label>
                    <textarea class="form-control input input-bordered w-full max-w-xs mt-2" id="news_content" name="news_content" required></textarea>
                </div>
            </div>
            <div class="flex gap-5">
                <div class="mb-3">
                    <label for="news_img" class="form-label">Image URL</label>
                    <input type="url" class="form-control input input-bordered w-full max-w-xs mt-2" id="news_img" name="news_img" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add News</button>
        </form>

        <!-- Update news -->
        <form method="POST" class="card bg-base-100 shadow-xl p-10">
            <p class="text-4xl pb-10">Update News</p>
            <div class="flex gap-5">
                <div class="mb-3">
                    <label for="update_id" class="form-label">News ID to Update</label>
                    <input type="text" class="form-control input input-bordered w-full max-w-xs mt-2" id="update_id" name="update_id" required>
                </div>
                <div class="mb-3">
                    <label for="update_title" class="form-label">New News Title</label>
                    <input type="text" class="form-control input input-bordered w-full max-w-xs mt-2" id="update_title" name="update_title" required>
                </div>
            </div>
            <div class="flex gap-9">
                <div class="mb-3">
                    <label for="update_link" class="form-label">New Link</label>
                    <input type="url" class="form-control input input-bordered w-full max-w-xs mt-2" id="update_link" name="update_link" required>
                </div>
                <div class="mb-3">
                    <label for="update_content" class="form-label">New Content</label>
                    <textarea class="form-control input input-bordered w-full max-w-xs mt-2" id="update_content" name="update_content" required></textarea>
                </div>
            </div>
            <div class="flex gap-5">
                <div class="mb-3">
                    <label for="update_img" class="form-label">New Image URL</label>
                    <input type="url" class="form-control input input-bordered w-full max-w-xs mt-2" id="update_img" name="update_img" required>
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Update News</button>
        </form>

        <!-- Delete news -->
        <form method="POST" class="card bg-base-100 shadow-xl p-10">
            <p class="text-4xl pb-10">Delete News</p>
            <div class="mb-3">
                <label for="delete_id" class="form-label">News ID to Delete</label>
                <input type="text" class="form-control input input-bordered w-full max-w-xs mt-2" id="delete_id" name="delete_id" required>
            </div>
            <button type="submit" class="btn btn-error mb-5">Delete News</button>
        </form>
    </div>
</div>




<div class="cards-container flex gap-3 m-10">
    <?php
    $select_news = $pdo->prepare("SELECT * FROM news");
    $select_news->execute();
    $result = $select_news->fetchAll();
    ?>
    <?php if(count($result) > 0): ?>
        <?php foreach ($result as $row): ?>
            <div class="card w-96 bg-base-100 shadow-xl">
                <figure>
                    <img src="<?= $row['news_img'] ?>" class="card-img-top" alt="<?= $row['news_title'] ?>">
                </figure>
                <div class="card-body">
                    <h2 class="card-title"><?= $row['news_title'] ?></h2>
                    <p><?= $row['news_content'] ?></p>
                    <div class="card-actions flex items-center justify-between">
                        <p class="text-2xl"><strong><?= $row['news_id'] ?></strong></p>
                        <a href="admin.php?delete=<?= $row['news_id']; ?>" class="btn btn-error">delete</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<?php
include("footer.php")
?>

</html>
