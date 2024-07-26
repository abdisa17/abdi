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
$organizerName = $_POST['organizerName'];
$eventDetails = $_POST['eventDetails'];
$organizerId = $_SESSION['user_id']; // Assuming user is logged in

// Insert request into proposals table
$sql = "INSERT INTO proposals (organizer_id, event_name, event_details, status) VALUES ('$organizerId', '$eventName', '$eventDetails', 'pending')";

if ($conn->query($sql) === TRUE) {
    echo "Request submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
