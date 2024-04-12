<?php

session_start();
echo "Dashboard";
echo "<pre>";print_r($_SESSION);
if(!isset($_SESSION['user_id'])) {
 
    header("location: ../index.php");
    exit;
} 

$rootDir = $_SERVER['DOCUMENT_ROOT'];

?>

<?php include $rootDir.'/partials/header.php'; ?>

<!-- Your content goes here -->

<?php include $rootDir.'/partials/footer.php'; ?>


