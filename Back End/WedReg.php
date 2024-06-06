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

$WedReg_id = $_POST['wedding_id'];
$groom_first_name = $_POST['G_first_name'];
$groom_last_name = $_POST['G_last_name'];
$groom_email = $_POST['inputEmailG'];
$groom_contact = $_POST['inputContactG'];
$bride_first_name = $_POST['B_first_name'];
$bride_last_name = $_POST['B_last_name'];
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

$target_dir = "../Wedding_images/";
$target_file = $target_dir . basename($_FILES["wedding_image"]["name"]);
if (move_uploaded_file($_FILES["wedding_image"]["tmp_name"], $target_file)) {
    // File uploaded successfully
} else {
    echo "Sorry, there was an error uploading your file.";
}



// Insert data into bride-groom table
$sql1 = "INSERT INTO `bride-groom` (WedReg_Id, G_first_name, G_last_name, G_email, G_contact, B_first_name, B_last_name, B_email, B_contact, wedding_image) 
VALUES ('$WedReg_id','$groom_first_name', '$groom_last_name', '$groom_email', '$groom_contact', '$bride_first_name', '$bride_last_name', '$bride_email', '$bride_contact', '$target_file')";

if ($conn->query($sql1) === TRUE) {
    // Insert data into weddingevent table
    $sql2 = "INSERT INTO weddingevent (WedReg_Id, event_location, event_start_date, event_end_date, event_program_list, Food, Accommodation) 
    VALUES ('$WedReg_id', '$wedding_location', '$start_date', '$end_date', '$program_list', '$food_list', '$accommodation')";

    if ($conn->query($sql2) === TRUE) {
        // Insert data into bank table
        $sql3 = "INSERT INTO bank (WedReg_Id, Bank_name, Bank_Acc_Name, Bank_Acc_no, Branch, Routing_no) 
        VALUES ('$WedReg_id', '$bank_name', '$account_name', '$account_number', '$account_branch', '$account_routing')";

        if ($conn->query($sql3) === TRUE) {
            header("Location: ../Front End/wedding.php");
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
