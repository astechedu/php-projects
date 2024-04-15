<?php
  
if($_SERVER['REQUEST_METHOD'] === 'POST'){

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

    // Prepare SQL insert statement
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email , :password)");

    // Bind parameters
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    //Request from Ajax   
    $username = $_POST['username']?? '';
    $email    = $_POST['email'] ?? '';
    $password = $_POST['password']?? '';
    
    // Set the values of parameters
    $username = $username;
    $email = $email;
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Execute the statement
    $stmt->execute();

    echo "Data inserted successfully!";
} catch (PDOException $e) {
    // Handle errors
    echo "Error: " . $e->getMessage();
}

}else{
    echo "Empty Fields";
}

$pdo = null;


?>