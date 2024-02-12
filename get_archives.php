<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "user_credentials");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT archiveId FROM archives";
$result = $mysqli->query($query);

if ($result) {
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row['archiveId'];
    }
    
    echo json_encode($data);
} else {
    echo "Error: " . $mysqli->error;
}

$mysqli->close();
?>
