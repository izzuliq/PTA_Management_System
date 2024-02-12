<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "user_credentials");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$archiveId = $_GET['archiveId'];

$stmt = $mysqli->prepare("SELECT archiveName, archiveDescription, archiveDate, archiveId, authorName FROM archives WHERE archiveId = ?");
$stmt->bind_param("s", $archiveId);

if ($stmt->execute()) {
    $stmt->bind_result($archiveName, $archiveDescription, $archiveDate, $archiveId, $authorName);

    if ($stmt->fetch()) {
        // Store the details in an associative array
        $archiveDetails = [
            'archiveName' => $archiveName,
            'archiveDescription' => $archiveDescription,
            'archiveDate' => $archiveDate,
            'archiveId' => $archiveId,
            'authorName' => $authorName,
        ];

        // Return the details as a JSON response
        echo json_encode($archiveDetails);
    } else {
        echo "Error: Archive not found.";
    }
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>
