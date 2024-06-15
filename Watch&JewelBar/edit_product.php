<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "watch&jewelbar";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted and if the "product_id" is set
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    // Retrieve data from POST request
    $product_id = $_POST['product_id'];
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $image = isset($_POST['image']) ? $_POST['image'] : '';

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE productstb SET name=?, price=?, image=? WHERE product_id=?");
    $stmt->bind_param("sdsi", $name, $price, $image, $product_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Product updated successfully!";
    } else {
        echo "Error updating product: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Product ID is not set or form is not submitted.";
}
?>
