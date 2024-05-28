<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wedding_bridge";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$bride_username = $_POST['BrideUsername'];
$bride_first_name = $_POST['B_first_name'];
$bride_last_name = $_POST['B_last_name'];
$bride_email = $_POST['inputEmailB'];
$bride_contact = $_POST['inputContactB'];

$groom_username = $_POST['GroomUsername'];
$groom_first_name = $_POST['G_first_name'];
$groom_last_name = $_POST['G_last_name'];
$groom_email = $_POST['inputEmailG'];
$groom_contact = $_POST['inputContactG'];

$Wedding_image = $_POST['wedding_image'];
$event_location = $_POST['WedLocation'];
$start_date = $_POST['StartDate'];
$end_date = $_POST['EndDate'];
$event_program_list = $_POST['program_list'];
$food_item_list = $_POST['Food_list'];
$accommodation_details = $_POST['Accommodation'] ?? '';

$bank_name = $_POST['bank_name'];
$bank_Acc_Name = $_POST['acc_name'];
$bank_Acc_no = $_POST['acc_no'];
$bank_branch_name = $_POST['bb_name'];
$bank_routing_no = $_POST['br_no'];

$target_dir = "../uploads";
$target_file = $target_dir . basename($_FILES["wedding_image"]["name"]);
move_uploaded_file($_FILES["wedding_image"]["tmp_name"], $target_file);

$sql = "INSERT INTO wedding_info (B_username, B_first_name, B_last_name, B_email, B_contact, G_username, G_first_name, G_last_name, G_email, G_contact, wedding_image, event_location, event_start_date, event_end_date, event_program_list, Food, Accommodation, Bank_name, Bank_Acc_Name, Bank_Acc_no, Branch, Routing_no)
VALUES ('$bride_username', '$bride_first_name', '$bride_last_name', '$bride_email', '$bride_contact', '$groom_username', '$groom_first_name', '$groom_last_name', '$groom_email', '$groom_contact', '$Wedding_image', '$event_location', '$start_date', '$end_date', '$event_program_list', '$food_item_list', '$accommodation_details', '$bank_name', '$bank_Acc_Name', '$bank_Acc_no', '$bank_branch_name', '$bank_routing_no' )";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
