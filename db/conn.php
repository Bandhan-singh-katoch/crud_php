
<?php

$conn = new mysqli('localhost', 'root', 'root', 'form');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully"

?>