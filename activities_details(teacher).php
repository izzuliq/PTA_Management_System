<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "user_credentials");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$activityName = $_POST['activityName'];
$activityDescription = $_POST['activityDescription'];
$activityDate = $_POST['activityDate'];
$activityId = $_POST['activityId'];
$organizerName = $_POST['organizerName'];

$stmt = $mysqli->prepare("INSERT INTO activities (activityName, activityDescription, activityDate, activityId, organizerName) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $activityName, $activityDescription, $activityDate, $activityId, $organizerName);

if ($stmt->execute()) {
    header("Location: Add Activities (Teacher).html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>
