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
    header("Location: ../Back End/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];


$query = $conn->prepare("SELECT name, email, phone, address FROM users WHERE id = ?");
$query->bind_param("i", $user_id);
$query->execute();
$query->bind_result($name, $email, $phone, $address);
$query->fetch();
$query->close();
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
    <link rel="stylesheet" href="../Back End/login.php">
</head>

<body class="">
    <?php
    include ("../Back End/header.php")
        ?>

    <div class="grid grid-cols-5 ">
        <div
            class="flex flex-col justify-start pt-10 items-center bg-gradient-to-r from-green-100 to-blue-100 hover:from-pink-100 hover:to-yellow-100">
            <img src="../images/syeed.jpg" alt="Profile Picture" class="profile-pic">
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
                <div class="card">
                    <img src="../images/10.jpg" class="card-img-top" alt="...">
                    <div class="card-body flex flex-col justify-center items-center">
                        <h5 class="card-title pb-0 mb-0">Wedding</h5>
                        <p class="card-text my-0">Name Of The Location</p>
                        <p>Date : 23 Feb, 2024</p>
                        <a href="#" class="btn btn-primary">Cancel</a>
                    </div>
                </div>
            
            </div>

            <hr class=" border-2 my-20">

            <!-- Hosted Wedding -->

            <div class="profile-header flex justify-center mt-20 mb-10 items-center">
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
              
            </div>




        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    
    <?php
    include ("../Back End/footer.php")
        ?>
</body>

</html>