<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "user_credentials");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $archiveName = $_POST['archiveName'];
    $archiveDescription = $_POST['archiveDescription'];
    $archiveDate = $_POST['archiveDate'];
    $archiveId = $_POST['archiveId'];
    $authorName = $_POST['authorName'];

    $stmt = $mysqli->prepare("UPDATE archives SET archiveName = ?, archiveDescription = ?, archiveDate = ? WHERE archiveId = ? AND authorName = ?");
    $stmt->bind_param("sssss", $archiveName, $archiveDescription, $archiveDate, $archiveId, $authorName);

    if ($stmt->execute()) {
        echo "Archive details updated successfully.";
    } else {
        echo "Error updating archive details: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request method.";
}

$mysqli->close();
?>
