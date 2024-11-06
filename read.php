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

$sql = "SELECT id, scp_number, object_class, containment_procedures, description FROM scp_subjects";
$result = $conn->query($sql);

$subjects = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $subjects[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($subjects);
?>
