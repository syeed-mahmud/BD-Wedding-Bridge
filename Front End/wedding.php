<?php
session_start();

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

if (isset($_GET['view'])) {
    $_SESSION['selected_wedid'] = $_GET['view'];
    header('location: weddingDetails.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Wedding</title>
    <link rel="icon" href="../images/Logo.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="../style.css">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

     <!-- tailwind & daisyui cdn -->
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.0/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  </head>

<body class="sidepage">

<?php
include("../Back End/header.php");
?>
<div class="container grid grid-cols-4 gap-4">
<?php
// Query to retrieve all weddings
$sql = "SELECT `bride-groom`.WedReg_Id, G_first_name, B_first_name, event_start_date, event_end_date, event_location, wedding_image 
        FROM `bride-groom`
        JOIN weddingevent ON `bride-groom`.WedReg_Id = weddingevent.WedReg_Id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $WedReg_id = $row["WedReg_Id"];
        $BrideName = $row["B_first_name"];
        $GroomName = $row["G_first_name"];
        $StartDate = $row["event_start_date"];
        $EndDate = $row["event_end_date"];
        $Location = $row["event_location"];
        $Image = $row["wedding_image"];

        // Create a new card for each wedding
        echo '
        <div class="card" >
            <img src="../images/' . $Image . '" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">' . $BrideName . ' & ' . $GroomName . ' Wedding</h5>
                <p class="card-text text-wrapper">Date : ' . $StartDate . ' to ' . $EndDate . ' </p>
                <p class="card-text text-wrapper">Location : ' . $Location . '</p>
                <a href="wedding.php?view=' . $WedReg_id . '" class="btn btn-primary">View Details</a>
            </div>
        </div>
        ';
    }
} else {
    echo "No weddings found.";
}
?>
</div>
<?php
include("../Back End/footer.php");
?>

</body>
</html>
<?php
// Close the database connection
mysqli_close($conn);
?>
