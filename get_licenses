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

// Fetch licenses for the logged-in user
$userId = $_SESSION['user_id'];
$sql = "SELECT * FROM licenses WHERE organizer_id=$userId";
$result = $conn->query($sql);

$licenses = array();
while($row = $result->fetch_assoc()) {
    $licenses[] = $row;
}

echo json_encode($licenses);

$conn->close();
?>
