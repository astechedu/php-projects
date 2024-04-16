<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $id = $_POST['id']?? '';

    //Calling fetchAll() function  
    $userView = fetchById($id);
    echo json_encode($userView);
}

function fetchById($id){

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
        // Define the ID of the record you want to delete
        $idToView =  $id; //$data['id']; // Change this to the ID you want to delete

        // Prepare SQL query
        $Viewstmt = $pdo->prepare("SELECT * FROM users where id = :id");
        // Bind the ID parameter
        $Viewstmt->bindParam(':id', $idToView, PDO::PARAM_INT);
        // Execute the query
        $Viewstmt->execute();

        // Fetch dates
        $user = $Viewstmt->fetchAll(PDO::FETCH_ASSOC);

        return $user;       
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