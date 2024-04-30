<?php
session_start();

$pid = $_GET["pid"];

//echo "<pre>";print_r($_SESSION);
if (!isset($_SESSION["cart"][$pid])):
    //echo "<pre>";print_r($_SESSION);
    $quantity = 0;
    //$cartTotal = 0;
    $_SESSION["cartTotal"] = $cartTotal;

    $_SESSION["cart"][$pid] = [];

    $product_id = $_POST["product_id"];
    $stock_quantity = $_POST["stock_quantity"];
    $product_name = $_POST["product_name"];
    $price = $_POST["price"];

    $_SESSION["cart"][$pid] = [
        "product_id" => $product_id,
        "stock_quantity" => $stock_quantity,
        "product_name" => $product_name,
        "price" => $price,
        "quantity" => $quantity,
    ];
    //echo "<pre>";print_r($_SESSION);
endif;

if (isset($_SESSION["cart"][$pid])):

    //$_SESSION["cartTotal"] += 1;

    $_SESSION["cart"][$pid]["quantity"] += 1;   
    header("location: /"); 
    exit;
 
endif;
?> 
