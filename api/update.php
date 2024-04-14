<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'github';
$username = 'root';
$password = '';

try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL query
    $stmt = $pdo->prepare("UPDATE users SET username = :username, email = :email, password = :password WHERE id = :id");

    // Bind parameters
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':id', $id);

    $data = json_decode(file_get_contents("php://input"), true);
   
    // Set the values of parameters
    $username =  $data['username'];                                  //'$username';
    $email =  $data['email'];                                        //'$email';
    $password = password_hash($data['password'], PASSWORD_DEFAULT);  //'$email';
    $id = $data['id'];   // Example ID to update

    // Execute the query
    $stmt->execute();

    // Check if any rows were affected
    $rowCount = $stmt->rowCount();
    if ($rowCount > 0) {
        echo "Update successful. $rowCount row(s) updated.";
    } else {
        echo "No rows updated.";
    }
} catch (PDOException $e) {
    // Handle errors
    echo "Error: " . $e->getMessage();
}
?>