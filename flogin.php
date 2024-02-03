<?php
session_start();
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
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            echo "Please fill in all fields.";
        } else {
            $sql = "SELECT * FROM farmer WHERE username = '$username' AND password = '$password'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $_SESSION['username'] = $username;
                echo "<script>alert('logined successfully')</script>";
                header("Location: fproductadd.php");
            } else {
                echo "Invalid username or password";
            }
        }
    }

}
$conn->close();
?>