<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "kyub";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE shop (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    item_name VARCHAR(50) NOT NULL UNIQUE,
    item_img BLOB NOT NULL,
    item_stock VARCHAR(50) NOT NULL,
    item_price DECIMAL NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>