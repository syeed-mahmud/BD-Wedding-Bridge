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

if (!isset($_SESSION['user_id'])) {
    header("Location: ../Front End/login.html");
    exit();
}

$user_id = $_SESSION['user_id'];


$query = $conn->prepare("SELECT name, email, phone, address, profile_img FROM users WHERE id = ?");
$query->bind_param("i", $user_id);
$query->execute();
$query->bind_result($name, $email, $phone, $address, $Profile_img);
$query->fetch();
$query->close();


if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    // Prepare and execute delete statements with error checking
    $stmt = $conn->prepare("DELETE FROM `regesterd_wedding` WHERE `Wed_id` = ? and user_id = ?");
    $stmt->bind_param("si", $delete_id, $user_id);
    if (!$stmt->execute()) {
        echo "Error deleting from `regesterd_wedding`: " . $stmt->error;
    }

    header('location: profile.php');
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Profile</title>
    <link rel="icon" href="../images/Logo.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../profile.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.2/dist/full.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
</head>
<?php
    include ("header.php")
        ?>
<body class="">
    <div class="grid grid-cols-5 ">
        <div
            class="flex flex-col justify-start pt-10 items-center bg-gradient-to-r from-green-100 to-blue-100 hover:from-pink-100 hover:to-yellow-100">
            <img src="<?php echo htmlspecialchars($Profile_img); ?>" alt="Profile Picture" class="profile-pic">
            <div>
                <h1 class="text-2xl"> <?php echo htmlspecialchars($name); ?></h1>
            </div>
            <!-- <button class="btn  flex justify-center items-center gap-1">
                <img class=" w-10" src="../images/settingslogo.png" alt="">
                <p class="btn text-lg hover:text-xl">Settings</p>
            </button> -->
        </div>
        <div class="col-span-4 pb-10 bg-pink-50">
            <div class="profile-header flex justify-center items-center">
                <h2 class="label fs-1 border-b-4 border-dashed fw-5">Personal Profile</h2>


            </div>

            <div class=" flex flex-row justify-around">
                <div class="profile-info">
                    <div class="info-item flex flex-col justify-center items-start">
                        <span class=" fs-4">Name</span>
                        <div class=" flex gap-2">
                            <span class="value"><?php echo htmlspecialchars($name); ?></span>
                        </div>
                    </div>
                    <div class="info-item flex flex-col justify-center items-start">
                        <span class=" info-item  fs-4">Phone Number</span>
                        <div class=" flex gap-2">
                            <span class="value"><?php echo htmlspecialchars($phone); ?></span>

                        </div>
                    </div>
                    <div class="info-item flex flex-col justify-center items-start">
                        <span class=" info-item  fs-4">Address</span>
                        <div class=" flex gap-2">
                            <span class="value"><?php echo htmlspecialchars($address); ?></span>

                        </div>
                    </div>
                    <div class="info-item flex flex-col justify-center items-start">
                        <span class=" fs-4">Email</span>
                        <div>
                            <span class="value"><?php echo htmlspecialchars($email); ?></span>

                        </div>
                    </div>

                    <div class="info-item flex flex-col justify-center items-start">
                        <p class="text-black fs-4">Linked Accounts</p>
                        <div class="linked-accounts flex">
                            <img src="../images/google.png" alt="Google">
                            <img src="../images/fb.png" alt="Facebook">
                            <img src="../images/LinkedIn_icon.png" alt="LinkedIn">
                        </div>
                    </div>
                    <div class="info-item flex flex-col items-start">
                        <a href="#" class="delete-account">Delete Account</a>
                        <p class="">This Account Will No Longer Be Available, And All Your Saved Data Will Be
                            Permanently
                            Deleted.</p>
                    </div>
                </div>
                <div class="flex flex-col ite">
                    <img class=" w-[200px]" src="../images/Logo.png" alt="">
                </div>
            </div>

            <hr class=" border-2 my-20">

            <!-- Registered weddings -->

            <div class="profile-header flex justify-center mt-20 mb-10 items-center">
                <h2 class="label fs-1 border-b-4 border-dashed fw-5">Registered Wedding</h2>
            </div>

            <div class="grid grid-cols-4 gap-4 px-10">
            <?php
// Query to retrieve all weddings registered
$sql = "SELECT `bride-groom`.WedReg_Id, G_first_name, B_first_name, event_start_date, event_end_date, event_location, wedding_image 
FROM `bride-groom` 
JOIN weddingevent ON `bride-groom`.WedReg_Id = weddingevent.WedReg_Id
JOIN regesterd_wedding ON `bride-groom`.WedReg_Id = regesterd_wedding.Wed_id
JOIN users ON users.id = regesterd_wedding.user_id
WHERE users.id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $WedReg_Id = $row["WedReg_Id"];
        $BrideName = $row["B_first_name"];
        $GroomName = $row["G_first_name"];
        $StartDate = $row["event_start_date"];
        $EndDate = $row["event_end_date"];
        $Location = $row["event_location"];
        $Image = $row["wedding_image"];

        // Create a new card for each wedding
        echo '
            <div class="card">
                <img src="'. $Image . '" class="card-img-top" style=" height: 150px;" alt="...">
                <div class="card-body">
                    <h5 class="card-title">' . $BrideName . ' & ' . $GroomName . '  Wedding</h5>
                    <p class="card-text text-wrapper">Date: ' . $StartDate . ' to ' . $EndDate . '</p>
                    <p class="card-text text-wrapper">Location: ' . $Location . '</p>
                    <a href="profile.php?delete=' . $WedReg_Id . '" class="btn btn-primary">Delete</a>
                </div>
            </div>
        ';
    }
} else {
    echo "No weddings found.";
}
?>
            
            </div>

            <!-- <hr class=" border-2 my-20"> -->

            <!-- Hosted Wedding -->

            <!-- <div class="profile-header flex justify-center mt-20 mb-10 items-center">
                <h2 class="label fs-1 border-b-4 border-dashed fw-5">Hosted Wedding</h2>
            </div>

            <div class="grid grid-cols-4 gap-4 px-10">
                <div class="card">
                    <img src="../images/10.jpg" class="card-img-top" alt="...">
                    <div class="card-body flex flex-col justify-center items-center">
                        <h5 class="card-title pb-0 mb-0">Wedding</h5>
                        <p class="card-text my-0">Name Of The Location</p>
                        <p>Date : 23 Feb, 2024</p>
                        
                        <a href="#" class="btn btn-primary">Cancel</a>
                        
                      
                    </div>
                </div>
              
            </div> -->




        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    
    <?php
    include ("footer.php") ?>
</body>

</html>