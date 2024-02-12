<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "user_credentials");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$announcementName = $_POST['announcementName'];
$announcementDescription = $_POST['announcementDescription'];
$announcementDate = $_POST['announcementDate'];
$announcementId = $_POST['announcementId'];
$announcerName = $_POST['announcerName'];

$stmt = $mysqli->prepare("INSERT INTO announcements (announcementName, announcementDescription, announcementDate, announcementId, announcerName) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $announcementName, $announcementDescription, $announcementDate, $announcementId, $announcerName);

if ($stmt->execute()) {
    header("Location: Add Announcements (Teacher).html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>
