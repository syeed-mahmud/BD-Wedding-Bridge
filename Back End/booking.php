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

if (!isset($_SESSION['user_id']) && ($_SESSION['selected_wedid'])) {
    header("Location: ../Front End/login.html");
    exit();
}

$selected_wedid = $_SESSION['selected_wedid'];
$user_id = $_SESSION['user_id'];


$query = $conn->prepare("SELECT 
    bg.WedReg_id, bg.G_first_name, bg.G_last_name, bg.G_email, bg.G_contact, bg.B_first_name, bg.B_last_name, bg.B_email, bg.B_contact, bg.wedding_image, 
    b.Entry_Price, b.Bank_name, b.Bank_Acc_Name, b.Bank_Acc_no, b.Branch, b.Routing_no,
    w.event_location, w.event_start_date, w.event_end_date, w.event_program_list, w.Food, w.Accommodation
FROM `bride-groom` AS bg 
JOIN bank AS b ON bg.WedReg_id = b.WedReg_id 
JOIN weddingevent AS w ON bg.WedReg_id = w.WedReg_id 
WHERE bg.WedReg_id = ?");
$query->bind_param("s", $selected_wedid);
$query->execute();
$query->bind_result(
    $bg_WedReg_id, $G_first_name, $G_last_name, $G_email, $G_contact, $B_first_name, $B_last_name, $B_email, $B_contact, $wedding_image, 
    $Entry_Price, $Bank_name, $Bank_Acc_Name, $Bank_Acc_no, $Branch, $Routing_no,
    $event_location, $event_start_date, $event_end_date, $event_program_list, $Food, $Accommodation
);

$query->fetch();
$query->close();

$query = $conn->prepare("SELECT name, email, phone, address, profile_img FROM users WHERE id = ?");
$query->bind_param("i", $user_id);
$query->execute();
$query->bind_result($name, $email, $phone, $address, $Profile_img);
$query->fetch();
$query->close();


if (isset($_POST['confirm'])) {
    $stmt = $conn->prepare("INSERT INTO regesterd_wedding (user_id, Wed_id) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $selected_wedid);

    if ($stmt->execute()) {
        echo "<script>alert('Booking successful.'); window.location.href = '../Front End/WeddingCardDesign.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.2/dist/full.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
</head>
<?php
include("header.php");
?>
<body class="w-screen bg-[url('../images/bgimg.png')] py-20">
    <section>

        <div class=" w-1/4 mx-auto my-10">
            <img src="<?php echo htmlspecialchars($wedding_image) ?>" alt="Wedding photo" class="rounded-3xl shadow-lg h-full w-full">
        </div>

        <div class=" p-6  ">

            <h1 class="text-5xl mx-auto w-[600px] text-center text-black font-bold mb-2"><?php echo htmlspecialchars($G_first_name) . " & " . htmlspecialchars($B_first_name); ?>'s Wedding
            </h1>

            <div class="flex items-center justify-center ">
                <div class="w-4 h-4 bg-black rounded-full "></div>
                <div class=" min-w-[600px] border-t-2 border-black"></div>
                <div class="w-4 h-4 bg-black rounded-full "></div>
            </div>
        </div>

    </section>

    <!-- Event information section -->
    <section>
      <div class="ml-20 my-10 border-2 w-fit rounded-3xl p-5 bg-[#21C1BC66]">
        <h1 class="text-6xl underline decoration-double font-light text-black">
          Event Information
        </h1>
        <ul class="list-disc text-3xl font-semibold mt-9 ml-10">
          <li>
            Event Location :
            <span class="text-gray-700"><?php echo htmlspecialchars($event_location) ?></span>
          </li>

          <li>
            Event Start Date : <span class="text-gray-700"><?php echo htmlspecialchars($event_start_date) ?> </span>
          </li>
          <li>
            Event End Date : <span class="text-gray-700"> <?php echo htmlspecialchars($event_end_date) ?></span>
          </li>

          <li>
            Event Function List:
            <span class="text-gray-700"><?php echo htmlspecialchars($event_program_list) ?></span>
          </li>
          <li>
            Food :
            <span class="text-gray-700">
            <?php echo htmlspecialchars($Food) ?>
            </span>
          </li>
          <li>
            Accommodation: <span class="text-gray-700"><?php echo htmlspecialchars($Accommodation) ?> </span>
          </li>
        </ul>
      </div>
    </section>
    <div class="flex items-center my-5 justify-center">
      <div class="w-4 h-4 bg-black rounded-full"></div>
      <div class="min-w-[800px] border-t-4 border-black"></div>
      <div class="w-4 h-4 bg-black rounded-full"></div>
    </div>
    

    <!-- payment option section -->
    <section>
      <div class="mr-20 text-right my-20 border-2 w-fit rounded-3xl p-5 bg-[#21C1BC66] ml-auto">
        <h1 class="text-6xl underline decoration-double font-light text-black">
          Payment Option
        </h1>
        <p class="text-3xl font-semibold mt-9 ml-10">
          Bank Name : <span class="text-gray-700"><?php echo htmlspecialchars($Bank_name) ?></span>
          <br />Acc Name :
          <span class="text-gray-700"><?php echo htmlspecialchars($Bank_Acc_Name) ?></span> <br />
          Bank Acc : <span class="text-gray-700"> <?php echo htmlspecialchars($Bank_Acc_no) ?></span>

          <br />
          Branch Name : <span class="text-gray-700"><?php echo htmlspecialchars($Branch) ?></span>

          <br />Routing No : <span class="text-gray-700"><?php echo htmlspecialchars($Routing_no) ?> </span>
        </p>
      </div>
      <div class="flex items-center my-5 justify-center">
      <div class="w-4 h-4 bg-black rounded-full"></div>
      <div class="min-w-[800px] border-t-4 border-black"></div>
      <div class="w-4 h-4 bg-black rounded-full"></div>
    </div>
    </section>

    <!-- User Information -->
    <div class="my-10">
        <h1
            class="text-5xl text-center font-semibold w-fit mx-auto pb-2 border-b-2 border-black border-dashed  text-black">
            Your Information</h1>

        <div class="flex justify-center items-center mt-10 gap-5">
            <img class="w-40 h-40 border-4 border-blue-600 rounded-full" src="<?php echo htmlspecialchars($Profile_img); ?>" alt="Profile Picture" onerror="this.onerror=null;this.src='../images/unknown.jpg';">

            <div class="">

                <p class=" text-2xl font-semibold ">
                    Name : <span class="text-gray-700"><?php echo htmlspecialchars($name); ?></span>
                    <br>Email: <span class="text-gray-700"><?php echo htmlspecialchars($email); ?></span>
                    <br>Contact : <span class="text-gray-700"><?php echo htmlspecialchars($phone); ?></span>
                </p>
                <div>
                    <label class=" text-2xl font-semibold text-black mt-8" for="">Number Of Person : </label>
                    <input class="w-16 h-10 border border-black" type="number" name="" id="">

                    <button
                        class="btn btn-info w-56 py-2 text-2xl rounded-2xl ml-20 font-semibold bg-[#000000C9] text-white">
                        Pay Now
                    </button>
                </div>
            </div>
        </div>

    </div>
    <form method="post" action="">
        <div class="flex justify-center items-center mt-40">
            <button type="submit" name="confirm" class="btn btn-info w-80 py-2 text-3xl rounded-2xl ml-20 font-semibold bg-[#000000C9] text-white">
                Confirm
            </button>
        </div>
    </form>
</body>
<?php
include("footer.php");
?>
</html>