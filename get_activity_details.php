<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "user_credentials");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$activityId = $_GET['activityId'];

$stmt = $mysqli->prepare("SELECT activityName, activityDescription, activityDate, activityId, organizerName FROM activities WHERE activityId = ?");
$stmt->bind_param("s", $activityId);

if ($stmt->execute()) {
    $stmt->bind_result($activityName, $activityDescription, $activityDate, $activityId, $organizerName);

    if ($stmt->fetch()) {
        // Store the details in an associative array
        $activityDetails = [
            'activityName' => $activityName,
            'activityDescription' => $activityDescription,
            'activityDate' => $activityDate,
            'activityId' => $activityId,
            'organizerName' => $organizerName,
        ];

        // Return the details as a JSON response
        echo json_encode($activityDetails);
    } else {
        echo "Error: Activity not found.";
    }
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>
