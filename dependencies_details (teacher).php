<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "user_credentials");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$dependencyName = $_POST['dependencyName'];
$dependencyDescription = $_POST['dependencyDescription'];
$dependencyDate = $_POST['dependencyDate'];
$dependencyId = $_POST['dependencyId'];
$dependencyRelation = $_POST['dependencyRelation'];

$stmt = $mysqli->prepare("INSERT INTO dependencies (dependencyName, dependencyDescription, dependencyDate, dependencyId, dependencyRelation) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $dependencyName, $dependencyDescription, $dependencyDate, $dependencyId, $dependencyRelation);

if ($stmt->execute()) {
    header("Location: Add Dependencies (Teacher).html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$mysqli->close();
?>
