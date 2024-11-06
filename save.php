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

$id = $_POST['id'] ?? null;
$scp_number = $_POST['scp_number'];
$object_class = $_POST['object_class'];
$containment_procedures = $_POST['containment_procedures'];
$description = $_POST['description'];

if ($id) {
    // Update record
    $stmt = $conn->prepare("UPDATE scp_subjects SET scp_number=?, object_class=?, containment_procedures=?, description=? WHERE id=?");
    $stmt->bind_param("ssssi", $scp_number, $object_class, $containment_procedures, $description, $id);
} else {
    // Insert record
    $stmt = $conn->prepare("INSERT INTO scp_subjects (scp_number, object_class, containment_procedures, description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $scp_number, $object_class, $containment_procedures, $description);
}

if ($stmt->execute()) {
    echo "Success";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
