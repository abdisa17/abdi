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

// Get data from the POST request
$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$status = $data['status'];

// Update proposal status
$sql = "UPDATE proposals SET status='$status' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Proposal $status successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
