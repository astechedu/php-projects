<?php
include "connection.php";

// Retrieve the POST data
//$data = json_decode(file_get_contents("php://input"));


//Fetch all users
function fetchUsers($conn, $username)
{
    $sql = "SELECT * FROM users where username LIKE '%$username%'";

    // Prepare and execute SQL oci_statement_type(statement)		
    $stmt = $conn->prepare($sql);


    $stmt->execute();

    // Fetch data
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

$searchUserName=$_GET['id']?? '';
//echo strlen($searchUserName);

//Saving all users and calling function
$result = fetchUsers($conn, $searchUserName);
echo json_encode($result);

?>