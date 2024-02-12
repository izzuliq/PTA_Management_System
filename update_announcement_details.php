<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "user_credentials");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $announcementName = $_POST['announcementName'];
    $announcementDescription = $_POST['announcementDescription'];
    $announcementDate = $_POST['announcementDate'];
    $announcementId = $_POST['announcementId'];
    $authorName = $_POST['authorName'];

    $stmt = $mysqli->prepare("UPDATE announcements SET announcementName = ?, announcementDescription = ?, announcementDate = ? WHERE announcementId = ? AND authorName = ?");
    $stmt->bind_param("sssss", $announcementName, $announcementDescription, $announcementDate, $announcementId, $authorName);

    if ($stmt->execute()) {
        echo "Announcement details updated successfully.";
    } else {
        echo "Error updating announcement details: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request method.";
}

$mysqli->close();
?>
