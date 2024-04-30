<?php 
session_start();
//session_destroy();
//exit;
//if (isset($_GET['pid']) && $_SERVER["REQUEST_METHOD"] === "POST") {
    //print_r($_SESSION);
    $pid = $_GET['pid'];
    $quantity = 0;
    //echo "<pre>";print_r($_SESSION);
        if (!isset($_SESSION["cart"][$pid])):      
          //echo "<pre>";print_r( array_keys($_SESSION["cart"]));
          //echo "<pre>";print_r($_SESSION);              
            $_SESSION["cart"][$pid] = array();
               
                $product_id     = $_POST["product_id"];
                $stock_quantity = $_POST["stock_quantity"];
                $product_name   = $_POST["product_name"];
                $price          = $_POST["price"];


            $_SESSION["cart"][$pid] = array(
                "product_id"     => $product_id,
                "stock_quantity" => $stock_quantity,
                "product_name"   => $product_name,
                "price"          => $price,
                "quantity"       => $quantity
            );                  
            //echo "<pre>";print_r($_SESSION);           
            
        endif;

        if (isset($_SESSION["cart"][$pid])):   

                $_SESSION["cart"][$pid]["quantity"] +=1;
                //endif;
                //header("location: ./"); 
             echo "<pre>";print_r($_SESSION);        
            //endif;
        endif;


?> 
