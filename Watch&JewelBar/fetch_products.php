<?php
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

$sql = "SELECT product_id, name, price, image FROM productstb";
$result = $conn->query($sql);

$products = [];

if ($result->num_rows > 0) {
    // Fetch all products
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    echo "0 results";
}

$conn->close();

echo json_encode($products);
?>
