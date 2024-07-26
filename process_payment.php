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
$paymentMethod = $_POST['paymentMethod'];
$proposalId = $_SESSION['proposal_id']; // Assuming proposal ID is stored in session

// Process payment (for online payments, integrate with a payment gateway here)
if ($paymentMethod == 'online') {
    // Integration with payment gateway
    $paymentStatus = 'completed'; // Assuming payment is successful
} else {
    $paymentStatus = 'pending'; // Manual payment
}

// Insert payment into payments table
$sql = "INSERT INTO payments (proposal_id, payment_method, status) VALUES ('$proposalId', '$paymentMethod', '$paymentStatus')";

if ($conn->query($sql) === TRUE) {
    echo "Payment $paymentStatus successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
