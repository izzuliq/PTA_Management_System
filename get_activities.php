<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "user_credentials");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT activityId FROM activities";
$result = $mysqli->query($query);

if ($result) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row['activityId'];
    }
    
    echo json_encode($data);
} else {
    echo "Error: " . $mysqli->error;
}

$mysqli->close();
?>