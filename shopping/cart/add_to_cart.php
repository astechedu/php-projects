<?php 
session_start();

//if (isset($_GET['pid']) && $_SERVER["REQUEST_METHOD"] === "POST") {
    //print_r($_SESSION);
    $pid = $_GET['pid'];

    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();

        $product_id     = $_POST["product_id"];
        $stock_quantity = $_POST["stock_quantity"];
        $product_name   = $_POST["product_name"];
        $price          = $_POST["price"];

        $_SESSION["cart"] = [
            "product_id"     => $product_id,
            "stock_quantity" => $stock_quantity,
            "product_name"   => $product_name,
            "price"          => $price,
        ];  //echo "<pre>";print_r($_SESSION);

    }
      //echo "<pre>";print_r($_SESSION);

        if (array_key_exists("product_id", $_SESSION["cart"])) {
          echo "ajay";
          //echo "<pre>";print_r($_SESSION);
            $product_id     = $_POST["product_id"];

            $_POST["stock_quantity"] = $_POST["stock_quantity"] + 1;
            $product_name   = $_POST["product_name"];   
            $price          = $_POST["price"];

            $_SESSION["cart"]    = [
                "product_id"     => $product_id,
                "stock_quantity" => $_POST["stock_quantity"],
                "product_name"   => $_POST["product_name"],
                "price"          => $_POST["price"],
            ];   echo "<pre>";print_r($_SESSION);
        } 
     
//}

?> 