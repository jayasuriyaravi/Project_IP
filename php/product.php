<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";// Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_image = $_FILES['product-image']['name'];
    $product_name = $_POST['product-name'];
    $product_price = $_POST['product-price'];
    $product_description = $_POST['product-description'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO products (product_image, product_name, product_price, product_description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $product_image, $product_name, $product_price, $product_description);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt . "<br>" . $conn->error;
    }

    $stmt->close();
}

// Close the connection
$conn->close();
?>