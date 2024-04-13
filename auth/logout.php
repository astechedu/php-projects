<?php
session_start(); // Start the session

if (isset($_SESSION["user_id"])) {
    // Unset all of the session variables
    //$_SESSION = array();
    //session_unset($_SESSION['user_id']);

    // Unset all session variables
    session_unset();

    // Destroy the session
    //session_destroy();

    // Redirect to another page if needed
    header("location: ../index.php");
    exit();
} else {
    // Session variable 'user_id' is not set
    // You can handle this case as needed
    //echo "No session ID found. Session may not be started.";
    // Redirect to another page if needed
    header("location: ../index.php");
    exit();
}

?>

