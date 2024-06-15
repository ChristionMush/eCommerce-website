<?php
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

// JSON data
$jsonData = '[
    {
        "product_id": 1001,
        "name": "Oris: Matte metallic watch with green cloth straps",
        "price": 350,
        "image": "AnalogueImgAssets/A1.jpg"
    },
    {
        "product_id": 1002,
        "name": "Laco: Navy Blue formal strap watch with stainless steel dial.",
        "price": 350,
        "image": "AnalogueImgAssets/A2.jpg"
    },
    {
        "product_id": 1003,
        "name": "Milus: Envy green formal strap watch with stainless steel dial.",
        "price": 400,
        "image": "AnalogueImgAssets/A3.jpg"
    },
    {
        "product_id": 1004,
        "name": "Rado: Stylish blue dial all wear watch.",
        "price": 200,
        "image": "AnalogueImgAssets/A4.jpg"
    },
    {
        "product_id": 1005,
        "name": "Casio: Yellow gold water square face watch.",
        "price": 400,
        "image": "AnalogueImgAssets/A5.jpg"
    },
    {
        "product_id": 1006,
        "name": "Casio: stainless steel blue dial stylish casio watch.",
        "price": 250,
        "image": "AnalogueImgAssets/A6.jpg"
    },
    {
        "product_id": 2001,
        "name": "Casio: Black digital G-shock frogman.",
        "price": 400,
        "image": "DigitalImgAssets/D1.jpeg"
    },
    {
        "product_id": 2002,
        "name": "Garmin: Army Brown tech watch.",
        "price": 450,
        "image": "DigitalImgAssets/D2.jpeg"
    },
    {
        "product_id": 2003,
        "name": "Casio: Square illuminator watch.",
        "price": 300,
        "image": "DigitalImgAssets/D3.jpeg"
    },
    {
        "product_id": 2004,
        "name": "Casio: Square illuminator watch.",
        "price": 300,
        "image": "DigitalImgAssets/D4.jpeg"
    },
    {
        "product_id": 2005,
        "name": "Honhx: all black tech watch.",
        "price": 100,
        "image": "DigitalImgAssets/D5.jpeg"
    },
    {
        "product_id": 2006,
        "name": "Honhx: LED digital watch",
        "price": 150,
        "image": "DigitalImgAssets/D6.jpeg"
    },
    {
        "product_id": 3001,
        "name": "Fit watch: step tracker connector watch.",
        "price": 100,
        "image": "SmartwatchImgAssets/S1.jpeg"
    },
    {
        "product_id": 3002,
        "name": "Garmin: Multi-function black watch.",
        "price": 450,
        "image": "SmartwatchImgAssets/S2.jpeg"
    },
    {
        "product_id": 3003,
        "name": "Amaze-Fit: Blue smart watch.",
        "price": 250,
        "image": "SmartwatchImgAssets/S3.jpeg"
    }
]';

// Decode JSON data into PHP array
$data = json_decode($jsonData, true);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO productstb (product_id, name, price, image) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isds", $product_id, $name, $price, $image);

// Loop through the array and execute the prepared statement
foreach ($data as $item) {
    $product_id = $item['product_id'];
    $name = $item['name'];
    $price = $item['price'];
    $image = $item['image'];
    $stmt->execute();
}

// Close statement and connection
$stmt->close();
$conn->close();

echo "Data inserted successfully!";
?>
