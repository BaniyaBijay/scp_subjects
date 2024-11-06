<?php

// Database connection parameters
$hostname = 'localhost';
$db = "a30079343_db";
$user = "a30079343_BijayDasBaniya";
$pw = "bijaydasbaniya";

// Create a connection
$conn = new mysqli($hostname, $user, $pw, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = intval($_POST['id']); // Ensure ID is an integer

$sql = "DELETE FROM scp_subjects WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "SCP Subject deleted successfully.";
} else {
    echo "Error deleting subject: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
