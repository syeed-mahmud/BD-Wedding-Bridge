<?php
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

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    // Prepare and execute delete statements with error checking
    $stmt = $conn->prepare("DELETE FROM `users` WHERE `id` = ?");
    $stmt->bind_param("i", $delete_id);
    if (!$stmt->execute()) {
        echo "Error deleting from `users`: " . $stmt->error;
    }

    header('location:userlist.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<?php
include ("adminheader.php");
?>

<body class="bg-[url('../../images/bgimg.png')] ">
    <h1 class="text-5xl border-b-4 mx-auto my-10 border-gray-400 border-dashed w-fit font-bold text-black">User List
    </h1>

    <div class="min-h-[50vh]">
        <table class=" table container mx-auto table-success border-4 mb-0 table-striped-columns ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contract</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                // Query to retrieve all users
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $userid = $row["id"];
                        $UserName = $row["name"];
                        $UserEmail = $row["email"];
                        $UserPhone = $row["phone"];
                        echo '
                    <tr>
                        <th scope="row">' . $userid . '</th>
                        <td>' . $UserName . '</td>
                        <td>' . $UserEmail . '</td>
                        <td>' . $UserPhone . '</td>
                        <td>
                            <a class="btn bg-slate-500 hover:bg-red-500 text-white" href="userlist.php?delete=' . $userid . '">Delete</a>
                        </td>
                    </tr>
                ';
                    }
                } else {
                    echo "No User found.";
                }
                ?>

            </tbody>
        </table>

    </div>


</body>

<?php
include ("adminfooter.php")
    ?>

</html>