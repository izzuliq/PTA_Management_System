<?php
$mysqli = new mysqli("127.0.0.1", "root", "", "user_credentials");

error_reporting(E_ALL);
ini_set('display_errors', '1');

if ($mysqli->connect_error) {
    echo "Script is running...";
    die("Connection failed: " . $mysqli->connect_error);
} else {
    echo "Script is running... Database connection successful!";
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "Script is running...";
    // Check if the necessary POST parameters are set
    if (isset($_GET['username'], $_GET['user_id'], $_GET['password'], $_GET['role'])) {
        $loginUsername = $_GET['username'];
        $loginUserId = $_GET['user_id'];
        $loginPassword = $_GET['password'];
        $loginRole = $_GET['role']; // corrected variable name

        // Prepare a SQL statement to fetch credentials from the database
        $stmt = $mysqli->prepare("SELECT * FROM credentials WHERE username = ? AND user_id = ? AND password = ? AND role = ?"); // corrected column name
        $stmt->bind_param("ssss", $loginUsername, $loginUserId, $loginPassword, $loginRole);

        // Execute the query
        $stmt->execute();

        // Store the result
        $result = $stmt->get_result();

        // Check if a matching user was found
        if ($result->num_rows > 0) {
            // Fetch the user data
            $row = $result->fetch_assoc();

            // Store information about the logged-in user
            $loggedInUser = [
                'username' => $row['username'],
                'user_id' => $row['user_id'],
                'password' => $row['password'],
                'role' => $row['role']
            ];

            echo "<script>";
            echo "localStorage.setItem('loggedInUser', JSON.stringify(" . json_encode($loggedInUser) . "));";
            echo "</script>";

            // Redirect the user based on their role
            if ($loggedInUser['role'] === 'admin') {
                header("Location: Admin Dashboard.html");
                exit();
            } elseif ($loggedInUser['role'] === 'teacher') {
                header("Location: Teacher Dashboard.html");
                exit();
            } elseif ($loggedInUser['role'] === 'parent') {
                header("Location: Parent Dashboard.html");
                exit();
            }
        } else {
            // No matching user found
            echo "Invalid username, password, role or User ID. Please try again.";
        }
        $stmt->close();
    } else {
        echo "Incomplete form submission.";
    }
} else {
    echo "Cannot fetch data from the table";
}
$mysqli->close();
?>