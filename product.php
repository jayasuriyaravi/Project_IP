<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['product-image']) && $_FILES['product-image']['error'] === UPLOAD_ERR_OK) {
        $product_image = $_FILES['product-image']['name'];
        $product_name = $_POST['product-name'];
        $product_price = $_POST['product-price'];
        $product_description = $_POST['product-description'];

        $stmt = $conn->prepare("INSERT INTO products (product_image, product_name, product_price, product_description) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssds", $product_image, $product_name, $product_price, $product_description);

        if ($stmt->execute() === TRUE) {
            echo "<alert>New record created successfully</alert>";
            header("Location:fproductadd.php");

        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error uploading the file. Please try again.";
    }
}

$conn->close();
?>