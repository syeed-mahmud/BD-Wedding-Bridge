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


$query = $conn->prepare("SELECT DISTINCT bg.G_first_name, bg.B_first_name, w.event_location, w.event_start_date, u.name
FROM `bride-groom` AS bg 
JOIN weddingevent AS w ON bg.WedReg_id = w.WedReg_id 
JOIN regesterd_wedding AS r ON bg.WedReg_id = r.Wed_id 
JOIN users AS u ON u.id = r.user_id
WHERE bg.WedReg_id = ? AND r.user_id = ?");
$query->bind_param("si", $selected_wedid, $user_id);
$query->execute();
$query->bind_result(
    $G_first_name,$B_first_name, $event_location, $event_start_date,$name);
$query->fetch();
$query->close();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Invitation Card</title>
    <link rel="icon" href="../images/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../WedCardDesign.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </head>
  <body>

    <div class="a" id="wedcard_template">
      <div class="overlap-group-wrapper">
        <div class="overlap-group">
          <div class="rectangle"></div>
          <img src="../images/is-yours-to-conquer-3.png"/>
          <img class="is-yours-to-conquer" src="../images/is-yours-to-conquer-1.png" />
          <img class="img" src="../images/is-yours-to-conquer-2.png" />
          <div class="text-wrapper"><?php echo htmlspecialchars($name) ?></div>
          <p class="you-are-invited-to">You Are Invited To The Weeding Of</p>
          <img class="line" src="../images/line-7.svg" />
          <div class="ayman-munjerin"><?php echo htmlspecialchars($G_first_name) ?><br />&amp;<br /><?php echo htmlspecialchars($B_first_name) ?></div>
          <div class="date-nov">Date : <span><?php echo htmlspecialchars($event_start_date) ?></span></div>
          <div class="div">Location : <span><?php echo htmlspecialchars($event_location) ?></span></div>
          <div class="BD-WEDDING-BRIDGE">Bd Wedding Bridge</div>
          <img class="element" src="../images/Logo.png" />
        </div>
      </div>
    </div>
  </body>
</html>