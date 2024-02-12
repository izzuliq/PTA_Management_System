<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "user_credentials");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$dependencyId = $_GET['dependencyId'];

$stmt = $mysqli->prepare("SELECT dependencyName, dependencyDescription, dependencyDate, dependencyId, dependencyRelation FROM dependencies WHERE dependencyId = ?");
$stmt->bind_param("s", $dependencyId);

if ($stmt->execute()) {
    $stmt->bind_result($dependencyName, $dependencyDescription, $dependencyDate, $dependencyId, $dependencyRelation);

    if ($stmt->fetch()) {
        // Store the details in an associative array
        $dependencyDetails = [
            'dependencyName' => $dependencyName,
            'dependencyDescription' => $dependencyDescription,
            'dependencyDate' => $dependencyDate,
            'dependencyId' => $dependencyId,
            'dependencyRelation' => $dependencyRelation,
        ];

        // Return the details as a JSON response
        echo json_encode($dependencyDetails);
    } else {
        echo "Error: Dependency not found.";
    }
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>
