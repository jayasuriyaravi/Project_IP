<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle registration form
    if (isset($_POST['new-username']) && isset($_POST['new-password'])) {
        $newUsername = $_POST['new-username'];
        $newPassword = $_POST['new-password'];

        if (empty($newUsername) || empty($newPassword)) {
            echo "Please fill in all fields.";
        } else {
            $sql = "INSERT INTO farmer (username, password) VALUES ('$newUsername', '$newPassword')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Registration successful')</script>";
                header("Location: farmerlogin.html");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}

$conn->close();
?>