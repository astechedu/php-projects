<?php

//Fetch API
function fetchAll(){
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
        $stmt = $pdo->prepare("SELECT * FROM users");

        // Execute the query
        $stmt->execute();

        // Fetch dates
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $users;       

        // Output dates
        //foreach ($users as $user) {
            //echo json_encode($user);        
        //}
    } catch (PDOException $e) {
        // Handle errors
        echo "Error: " . $e->getMessage();
    }
}




?>