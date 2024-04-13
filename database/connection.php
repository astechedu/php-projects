<?php
// MySQL server configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "github";

try {
    // Create connection
    $conn = new PDO(
        "mysql:host=$servername;dbname=$database",
        $username,
        $password
    );
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
