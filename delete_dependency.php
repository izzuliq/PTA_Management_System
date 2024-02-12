<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "user_credentials");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the request is a POST request (assumes your delete button triggers a POST request)

    $dependencyId = $_POST['dependencyId'];

    $stmt = $mysqli->prepare("DELETE FROM dependencies WHERE dependencyId = ?");
    $stmt->bind_param("s", $dependencyId);

    if ($stmt->execute()) {
        // Deletion successful
        echo json_encode(["status" => "success", "message" => "Dependency deleted successfully"]);
    } else {
        // Error in deletion
        echo json_encode(["status" => "error", "message" => "Error deleting dependency: " . $stmt->error]);
    }

    $stmt->close();
} else {
    // If it's not a POST request, handle it accordingly (redirect, show an error, etc.)
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}

$mysqli->close();
?>
