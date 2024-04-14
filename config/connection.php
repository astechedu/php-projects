<?php
try {
    // Database connection parameters
    $dsn = "mysql:host=localhost;dbname=github;charset=utf8";
    $username = "root";
    $password = "";

    // Attempt to create a PDO instance
    $pdo = new PDO($dsn, $username, $password);

    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Connection successful, do something with $pdo object
    //echo "Connected to the database successfully";
    
    // For example, execute a query
    //$stmt = $pdo->query("SELECT * FROM users");
    //$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($rows);
    //echo json_encode($rows);

} catch(PDOException $e) {
    // Connection failed, handle the exception
    echo "Connection failed: " . $e->getMessage();
}
?>