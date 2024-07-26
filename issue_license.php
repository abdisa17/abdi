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

// Get proposal ID and other details
$proposalId = $_POST['proposalId'];

// Retrieve the application date from the proposals table
$sql = "SELECT application_date FROM proposals WHERE id = '$proposalId'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$applicationDate = $row['application_date'];

// Calculate the issue date (three months after the application date)
$issueDate = date('Y-m-d', strtotime($applicationDate . ' + 3 months'));
$expiryDate = date('Y-m-d', strtotime($issueDate . ' + 10 days'));

// Insert license into licenses table
$sql = "INSERT INTO licenses (proposal_id, issue_date, expiry_date) VALUES ('$proposalId', '$issueDate', '$expiryDate')";

if ($conn->query($sql) === TRUE) {
    // Update proposal status to approved
    $sql = "UPDATE proposals SET status = 'approved' WHERE id = '$proposalId'";
    $conn->query($sql);
    echo "License issued successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
