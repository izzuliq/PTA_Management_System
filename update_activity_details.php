<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "user_credentials");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $activityName = $_POST['activityName'];
    $activityDescription = $_POST['activityDescription'];
    $activityDate = $_POST['activityDate'];
    $activityId = $_POST['activityId'];
    $authorName = $_POST['authorName'];

    $stmt = $mysqli->prepare("UPDATE activitys SET activityName = ?, activityDescription = ?, activityDate = ? WHERE activityId = ? AND authorName = ?");
    $stmt->bind_param("sssss", $activityName, $activityDescription, $activityDate, $activityId, $authorName);

    if ($stmt->execute()) {
        echo "Activity details updated successfully.";
    } else {
        echo "Error updating activity details: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request method.";
}

$mysqli->close();
?>
