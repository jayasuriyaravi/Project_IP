<?php
// Database configuration
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update-password'])) {
        $newPassword = $_POST['new-password'];
        $username = $_POST['username'];

        $sql = "UPDATE farmer SET password='$newPassword' WHERE username='$username'";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Password updated successfully')</script>";
            header("Location:farmerlogin.html");
        } else {
            echo "Error updating password: " . $conn->error;
        }
    }
}

$conn->close();
?>