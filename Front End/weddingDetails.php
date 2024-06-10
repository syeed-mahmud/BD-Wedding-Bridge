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

if (!isset($_SESSION['selected_wedid'])) {
    header("Location: wedding.php");
    exit();
}
$selected_wedid = $_SESSION['selected_wedid'];


$query = $conn->prepare("SELECT 
    bg.WedReg_id, bg.G_first_name, bg.G_last_name, bg.G_email, bg.G_contact, bg.B_first_name, bg.B_last_name, bg.B_email, bg.B_contact, bg.wedding_image, 
    b.Entry_Price,
    w.event_location, w.event_start_date, w.event_end_date, w.event_program_list, w.Food, w.Accommodation
FROM `bride-groom` AS bg 
JOIN bank AS b ON bg.WedReg_id = b.WedReg_id 
JOIN weddingevent AS w ON bg.WedReg_id = w.WedReg_id 
WHERE bg.WedReg_id = ?");
$query->bind_param("s", $selected_wedid);
$query->execute();
$query->bind_result(
    $bg_WedReg_id, $G_first_name, $G_last_name, $G_email, $G_contact, $B_first_name, $B_last_name, $B_email, $B_contact, $wedding_image, 
    $Entry_Price,
    $event_location, $event_start_date, $event_end_date, $event_program_list, $Food, $Accommodation
);

$query->fetch();
$query->close();
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wedding Details</title>
    <!-- <link rel="stylesheet" href="../style.css"> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.2/dist/full.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
  </head><?php
      include("header.php")
      ?>
  <body class="w-screen bg-[url('../images/bgimg.png')] py-20">
  
    <section>
      <div class="w-1/4 mx-auto my-10">
        <img src="<?php echo htmlspecialchars($wedding_image) ?>" alt="Wedding Photo" class="rounded-3xl shadow-lg h-full w-full" />
      </div>

      <div class="p-6">
        <h1 class="text-5xl mx-auto w-[600px] text-center text-black font-bold mb-2">
          <?php echo htmlspecialchars($G_first_name) . " & " . htmlspecialchars($B_first_name); ?>'s Wedding
        </h1>

        <div class="flex items-center justify-center">
          <div class="w-4 h-4 bg-black rounded-full"></div>
          <div class="min-w-[600px] border-t-2 border-black"></div>
          <div class="w-4 h-4 bg-black rounded-full"></div>
        </div>
      </div>
    </section>

    <!-- Bride and groom info -->
    <section class="my-10">
      <div class="flex justify-center items-center gap-5">
        <div class="flex flex-col justify-center items-center">
          <div class="bg-[#BC5757] w-[400px] rounded-3xl">
            <h1 class="text-center text-3xl font-bold py-2 text-white">
              GROOM
            </h1>
          </div>
          <div
            class="bg-[#21C1BC] text-black rounded-b-3xl text-center py-3 font-bold w-[360px]"
          >
            <p class="text-2xl"><?php echo htmlspecialchars($G_first_name . " " . $G_last_name); ?></p>
            <div>
              <p class="my-0 text-lg"><?php echo htmlspecialchars($G_contact) ?></p>
              <p class="my-0 text-lg"><?php echo htmlspecialchars($G_email) ?></p>
            </div>
          </div>
        </div>
        <div class="flex flex-col justify-center items-center">
          <div class="bg-[#BC5757] w-[400px] rounded-3xl">
            <h1 class="text-center text-3xl font-bold py-2 text-white">
              BRIDE
            </h1>
          </div>
          <div class="bg-[#21C1BC] text-black rounded-b-3xl text-center py-3 font-bold w-[360px]">
            <p class="text-2xl"><?php echo htmlspecialchars($B_first_name . " " . $B_last_name); ?></p>
            <div>
              <p class="my-0 text-lg"><?php echo htmlspecialchars($B_contact) ?></p>
              <p class="my-0 text-lg"><?php echo htmlspecialchars($B_email) ?></p>
            </div>
          </div>
        </div>
      </div>

      <div class="my-10 flex justify-end items-center">
        <div class="relative bg-[#444242] text-white text-center py-3 font-semibold w-[380px]">
          <p class="text-4xl"><?php echo htmlspecialchars($Entry_Price." ") ?> <span>USD</span></p>
          <p class="text-xl">Per Person</p>
          <div class="absolute top-1 -left-9">
            <img src="../images/Polygon 10.png" class="w-24" alt="" />
          </div>
        </div>
      </div>
    </section>

    <!-- Event details section -->
    <section>
      <div class="ml-20 my-10 border-2 w-fit rounded-3xl p-5 bg-[#21C1BC66]">
        <h1 class="text-6xl underline decoration-double font-light text-black">
          Event Details
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
      <button id="registerButton"class="btn btn-info w-80 py-2 text-3xl rounded-2xl ml-20 font-semibold bg-[#000000C9] text-white">
        Register
      </button>
    </section>
    
  </body>
  <?php
      include("footer.php")
      ?>
</html>

<script>
document.getElementById('registerButton').addEventListener('click', function() {
    window.location.href = `../Back End/booking.php`;
});
</script>
