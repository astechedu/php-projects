<?php

//Update Api

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //$data = json_decode(file_get_contents("php://input"), true);   
    // Set the values of parameters
    $updateId = $_POST['id']?? '';                //$data['id']; 
    $updateUsername =  $_POST['username']?? '';  //data['username']; 
    $updateEmail =  $_POST['email']?? '';        //data['email'];                                
    $updatePssword = password_hash($_POST['password']?? '', PASSWORD_DEFAULT);
    
    //Calling updateUser function
    updateUser($updateId,$updateUsername,$updateEmail,$updatePssword);
}


function updateUser($updateId,$updateUsername,$updateEmail,$updatePssword){

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
        $stmt->bindParam(':id', $updateId, PDO::PARAM_INT);
        $stmt->bindParam(':username', $updateUsername, PDO::PARAM_STR);
        $stmt->bindParam(':email', $updateEmail, PDO::PARAM_STR);
        $stmt->bindParam(':password', $updatePssword, PDO::PARAM_STR);        

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
}
?>