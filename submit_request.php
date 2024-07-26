<?php
session_start();

// Database connection
$servername = "localhost";
$username = "admin1";
$password = "password1";
$dbname = "otmd";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form data
$eventName = $_POST['eventName'];
$region = $_POST['region'];
$zone = $_POST['zone'];
$woreda = $_POST['woreda'];
$kebele = $_POST['kebele'];
$organizerName = $_POST['organizerName'];
$eventDetails = $_POST['eventDetails'];
$organizerId = $_SESSION['user_id']; // Assuming user is logged in

// File uploads
$proposal = $_FILES['proposal']['name'];
$proposalTmp = $_FILES['proposal']['tmp_name'];
$businessLicense = $_FILES['businessLicense']['name'];
$businessLicenseTmp = $_FILES['businessLicense']['tmp_name'];
$additionalDocument = $_FILES['additionalDocument']['name'];
$additionalDocumentTmp = $_FILES['additionalDocument']['tmp_name'];

// Upload directory
$uploadDir = 'uploads/';
move_uploaded_file($proposalTmp, $uploadDir . $proposal);
move_uploaded_file($businessLicenseTmp, $uploadDir . $businessLicense);
if ($additionalDocument) {
    move_uploaded_file($additionalDocumentTmp, $uploadDir . $additionalDocument);
}

// Insert request into proposals table
$sql = "INSERT INTO proposals (organizer_id, event_name, region, zone, woreda, kebele, event_details, proposal, business_license, additional_document, status) 
        VALUES ('$organizerId', '$eventName', '$region', '$zone', '$woreda', '$kebele', '$eventDetails', '$proposal', '$businessLicense', '$additionalDocument', 'pending')";

if ($conn->query($sql) === TRUE) {
    echo "Request submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
