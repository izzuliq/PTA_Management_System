<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "user_credentials");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$archiveName = $_POST['archiveName'];
$archiveDescription = $_POST['archiveDescription'];
$archiveDate = $_POST['archiveDate'];
$archiveId = $_POST['archiveId'];
$authorName = $_POST['authorName'];

$stmt = $mysqli->prepare("INSERT INTO archives (archiveName, archiveDescription, archiveDate, archiveId, authorName) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $archiveName, $archiveDescription, $archiveDate, $archiveId, $authorName);

if ($stmt->execute()) {
    header("Location: Add Archives (Teacher).html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>
