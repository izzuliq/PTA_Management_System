<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "user_credentials");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the necessary POST parameters are set
    if (isset($_POST['username'], $_POST['user_id'], $_POST['password'], $_POST['role'])) {
        $username = $_POST['username'];
        $userid = $_POST['user_id'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        // Validate and sanitize input if necessary

        $stmt = $mysqli->prepare("INSERT INTO credentials (username, user_id, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siss", $username, $userid, $password, $role);

        if ($stmt->execute()) {
            header("Location: PTA Management System.html");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Incomplete form submission.";
    }
}

$mysqli->close();
?>
