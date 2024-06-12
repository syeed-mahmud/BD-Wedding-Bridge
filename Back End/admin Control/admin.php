<?php
$host = 'localhost';
$db = 'wedding_bridge';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
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
        $update_title = $_POST['update_title'];
        $update_link = $_POST['update_link'];
        $update_content = $_POST['update_content'];
        $update_img = $_POST['update_img'];

        $stmt = $pdo->prepare("UPDATE news SET news_title = ?, news_link = ?, news_content = ?, news_img = ? WHERE news_id = ?");
        $stmt->execute([$update_title, $update_link, $update_content, $update_img, $update_id]);

        echo "<p class='alert alert-success'>News updated successfully!</p>";
    }
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM news WHERE news_id = ?");
    $stmt->execute([$delete_id]);
    header('Location: admin.php');
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
    <title>News Admin</title>
    <link rel="icon" href="../../images/Logo.png" type="image/x-icon">
</head>

<?php include("adminheader.php") ?>

<body class="bg-[url('../../images/bgimg.png')]" style="padding-top: 2px;">
    <div class="container flex-col pl-12 pt-5">
        <div class="flex flex-col gap-10">
            <!-- Add News -->
            <form method="POST" class="w-3/5 mx-auto bg-[#BC5757] rounded-3xl opacity-90 shadow-2xl p-10">
                <p class="text-4xl text-gray-950 font-semibold text-center border-b-2 pb-6">Add News</p>
                <div class="flex justify-between items-center gap-4">
                    <div class="mb-3 flex-1">
                        <label for="news_id" class="form-label text-lg text-gray-900 font-semibold">News ID</label>
                        <input type="text" class="form-control input input-bordered w-full max-w-xs mt-2" id="news_id" name="news_id" required>
                    </div>
                    <div class="mb-3 flex-1">
                        <label for="news_title" class="form-label text-lg text-gray-900 font-semibold">News Title</label>
                        <input type="text" class="form-control input input-bordered w-full max-w-xs mt-2" id="news_title" name="news_title" required>
                    </div>
                </div>
                <div class="flex justify-between items-center gap-4">
                    <div class="mb-3 flex-1">
                        <label for="news_link" class="form-label text-lg text-gray-900 font-semibold">Link</label>
                        <input type="url" class="form-control input input-bordered w-full max-w-xs mt-2" id="news_link" name="news_link" >
                    </div>
                    <div class="mb-3 flex-1">
                        <label for="news_img" class="form-label text-lg text-gray-900 font-semibold">Image URL</label>
                        <input type="url" class="form-control input input-bordered w-full max-w-xs mt-2" id="news_img" name="news_img" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="news_content" class="form-label text-lg text-gray-900 font-semibold">Content</label>
                    <textarea class="form-control input input-bordered w-full mt-2" id="news_content" name="news_content" required></textarea>
                </div>
                <div class="flex justify-center items-center">
                    <button type="submit" class="btn btn-outline-light w-2/5 mx-auto fs-5">Add News</button>
                </div>
            </form>

            <!-- Update news -->
            <form method="POST" class="w-3/5 mx-auto bg-[#BC5757] rounded-3xl opacity-90 shadow-2xl p-10">
                <p class="text-4xl text-[#251616] font-semibold text-center border-b-2 pb-6">Update News</p>
                <div class="flex justify-between items-center gap-4">
                    <div class="mb-3 flex-1">
                        <label for="update_id" class="form-label text-lg text-gray-900 font-semibold">News ID to Update</label>
                        <input type="text" class="form-control input input-bordered w-full max-w-xs mt-2" id="update_id" name="update_id" required>
                    </div>
                    <div class="mb-3 flex-1">
                        <label for="update_title" class="form-label text-lg text-gray-900 font-semibold">New News Title</label>
                        <input type="text" class="form-control input input-bordered w-full max-w-xs mt-2" id="update_title" name="update_title" required>
                    </div>
                </div>
                <div class="flex justify-between items-center gap-4">
                    <div class="mb-3 flex-1">
                        <label for="update_link" class="form-label text-lg text-gray-900 font-semibold">New Link</label>
                        <input type="url" class="form-control input input-bordered w-full max-w-xs mt-2" id="update_link" name="update_link" >
                    </div>
                    <div class="mb-3 flex-1">
                        <label for="update_img" class="form-label text-lg text-gray-900 font-semibold">New Image URL</label>
                        <input type="url" class="form-control input input-bordered w-full max-w-xs mt-2" id="update_img" name="update_img" >
                    </div>
                </div>
                <div class="mb-3">
                    <label for="update_content" class="form-label text-lg text-gray-900 font-semibold">New Content</label>
                    <textarea class="form-control input input-bordered w-full mt-2" id="update_content" name="update_content" ></textarea>
                </div>
                <div class="flex justify-center items-center">
                    <button type="submit" class="btn btn-outline-light w-2/5 mx-auto fs-5">Update News</button>
                </div>
            </form>

            <!-- Delete news -->
            <form method="POST" class="w-3/5 mx-auto bg-[#BC5757] rounded-3xl opacity-90 shadow-2xl p-10">
                <p class="text-4xl text-[#251616] font-semibold text-center border-b-2 pb-6">Delete News</p>
                <div class="mb-3">
                    <label for="delete_id" class="form-label text-lg text-gray-900 font-semibold">News ID to Delete</label>
                    <input type="text" class="form-control input input-bordered w-full mt-2" id="delete_id" name="delete_id" required>
                </div>
                <div class="flex justify-end items-center">
                    <button type="submit" class="btn btn-outline-light mx-auto fs-5">Delete News</button>
                </div>
            </form>
        </div>
    </div>

    <div class="cards-container flex gap-3 m-10">
        <?php
        $select_news = $pdo->prepare("SELECT * FROM news");
        $select_news->execute();
        $result = $select_news->fetchAll();
        ?>
        <?php if (count($result) > 0): ?>
            <?php foreach ($result as $row): ?>
                <div class="card w-96 h-[600px] bg-base-100 shadow-xl">
                    <figure class="h-1/2">
                        <img src="<?= $row['news_img'] ?>" class="card-img-top object-cover w-full h-full" alt="<?= $row['news_title'] ?>">
                    </figure>
                    <div class="card-body w-full h-1/2">
                        <h2 class="card-title"><?= $row['news_title'] ?></h2>
                        <p class="overflow-y-scroll"><?= $row['news_content'] ?></p>
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

<?php include("adminfooter.php") ?>

</html>
