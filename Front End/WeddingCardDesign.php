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
          <div class="text-wrapper">Syeed</div>
          <p class="you-are-invited-to">You Are Invited To The Weeding Of</p>
          <img class="line" src="../images/line-7.svg" />
          <div class="ayman-munjerin">Ayman<br />&amp;<br />munjerin</div>
          <div class="date-nov">Date : 23/nov/2024</div>
          <div class="div">Location : Dhaka, Bangladesh</div>
          <div class="BD-WEDDING-BRIDGE">Bd Wedding Bridge</div>
          <img class="element" src="../images/Logo.png" />
        </div>
      </div>
    </div>
  </body>
</html>