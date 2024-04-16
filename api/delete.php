<?php
// Check if the request method is DELETE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Database connection settings
    $host = 'localhost';
    $dbname = 'github';
    $username = 'root';
    $password = '';

    try {
        // Establish database connection using PDO
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

        // Set PDO to throw exceptions on errors
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //$data = json_decode(file_get_contents("php://input"), true);

        // Define the ID of the record you want to delete
        $idToDelete =  $_POST['id']?? ''; //$data['id']; // Change this to the ID you want to delete

        // Prepare the DELETE statement
        $deleteStatement = $pdo->prepare("DELETE FROM users WHERE id = :id");

        // Bind the ID parameter
        $deleteStatement->bindParam(':id', $idToDelete, PDO::PARAM_INT);

        // Execute the DELETE statement
        $deleteStatement->execute();

        // Check if any rows were affected
        $rowCount = $deleteStatement->rowCount();
        if ($rowCount > 0) {
            echo "Record deleted successfully.";
        } else {
            echo "No records found to delete.";
        }
    } catch (PDOException $e) {
        // Handle database connection errors
        echo "Error: " . $e->getMessage();
    }
}

// Close the connection
$pdo = null;

?>
