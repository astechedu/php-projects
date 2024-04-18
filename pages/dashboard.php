<?php
session_start();
//echo "Dashboard";
//echo "<pre>";print_r($_SESSION);

if (!isset($_SESSION["user_id"])) {
    header("location: ../index.php");
    exit();
}

//echo $rootDir = $_SERVER['DOCUMENT_ROOT'];

//include '../config/app.php';
//include "../database/connection.php";
?>

<?php include_once "../partials/header.php"; ?>

<!-- Your content goes here -->

<?php include_once "dashboard_content.php"; ?>

<?php include_once "../partials/footer.php"; ?>

 


