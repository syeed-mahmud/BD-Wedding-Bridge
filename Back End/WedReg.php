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

$groom_first_name = $_POST['G_first_name'];
$groom_last_name = $_POST['G_last_name'];
$groom_username = $_POST['GroomUsername'];
$groom_email = $_POST['inputEmailG'];
$groom_contact = $_POST['inputContactG'];
$bride_first_name = $_POST['B_first_name'];
$bride_last_name = $_POST['B_last_name'];
$bride_username = $_POST['BrideUsername'];
$bride_email = $_POST['inputEmailB'];
$bride_contact = $_POST['inputContactB'];
$wedding_location = $_POST['WedLocation'];
$start_date = $_POST['StartDate'];
$end_date = $_POST['EndDate'];
$program_list = $_POST['program_list'];
$food_list = $_POST['Food_list'];
$accommodation = $_POST['Accommodation'];
$bank_name = $_POST['bank_name'];
$account_name = $_POST['acc_name'];
$account_number = $_POST['acc_no'];
$account_branch = $_POST['bb_name'];
$account_routing = $_POST['br_no'];

// Handle image upload
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["wedding_image"]["name"]);
move_uploaded_file($_FILES["wedding_image"]["tmp_name"], $target_file);

// Insert data into bride-groom table
$sql1 = "INSERT INTO `bride-groom` (G_first_name, G_last_name, G_username, G_email, G_contact, B_first_name, B_last_name, B_username, B_email, B_contact, wedding_image) 
VALUES ('$groom_first_name', '$groom_last_name', '$groom_username', '$groom_email', '$groom_contact', '$bride_first_name', '$bride_last_name', '$bride_username', '$bride_email', '$bride_contact', '$target_file')";

if ($conn->query($sql1) === TRUE) {
    // Insert data into weddingevent table
    $sql2 = "INSERT INTO weddingevent (G_username, B_username, event_location, event_start_date, event_end_date, event_program_list, Food, Accommodation) 
    VALUES ('$groom_username','$bride_username','$wedding_location', '$start_date', '$end_date', '$program_list', '$food_list', '$accommodation')";

    if ($conn->query($sql2) === TRUE) {
        // Insert data into bank table
        $sql3 = "INSERT INTO bank (G_username, B_username, Bank_name, Bank_Acc_Name, Bank_Acc_no, Branch, Routing_no) 
        VALUES ('$groom_username','$bride_username', '$bank_name', '$account_name', '$account_number', '$account_branch', '$account_routing')";

        if ($conn->query($sql3) === TRUE) {
            header("Location: ../Front End/wedding.html");
        } else {
            echo "Error: " . $sql3 . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

$conn->close();
?>
