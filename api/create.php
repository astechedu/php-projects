<?php

//Create API
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //$data = json_decode(file_get_contents("php://input"), true);   
    // Set the values of parameters
     
    $createUserName =  $_POST['username']?? '';  //data['username']; 
    $createUserEmail =  $_POST['email']?? '';        //data['email'];                                
    $createUserPass = password_hash($_POST['password']?? '', PASSWORD_DEFAULT);
    
    //Calling createUser function
    createUser($createUserName,$createUserEmail,$createUserPass);
}

function createUser($createUserName,$createUserEmail,$createUserPass){

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

        // Set the values of parameters
        $username = $createUserName;
        $email = $createUserEmail;
        $password = password_hash($createUserPass, PASSWORD_DEFAULT);

        // Execute the statement
        $stmt->execute();

        echo "Data inserted successfully!";
    } catch (PDOException $e) {
        // Handle errors
        echo "Error: " . $e->getMessage();
    }

}

?>