<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "user_credentials");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$announcementId = $_GET['announcementId'];

$stmt = $mysqli->prepare("SELECT announcementName, announcementDescription, announcementDate, announcementId, announcerName FROM announcements WHERE announcementId = ?");
$stmt->bind_param("s", $announcementId);

if ($stmt->execute()) {
    $stmt->bind_result($announcementName, $announcementDescription, $announcementDate, $announcementId, $announcerName);

    if ($stmt->fetch()) {
        // Store the details in an associative array
        $announcementDetails = [
            'announcementName' => $announcementName,
            'announcementDescription' => $announcementDescription,
            'announcementDate' => $announcementDate,
            'announcementId' => $announcementId,
            'announcerName' => $announcerName,
        ];

        // Return the details as a JSON response
        echo json_encode($announcementDetails);
    } else {
        echo "Error: Announcement not found.";
    }
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>
