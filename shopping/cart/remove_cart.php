<?php
session_start();

$cart_id = (int)$_GET['cartid'];
$product_id = (int)$_SESSION['cart'][$cart_id]['product_id'];

if($_SESSION['cart'][$cart_id]):
   
   if($product_id === $cart_id ):
   	   unset($_SESSION['cart'][$cart_id]); 
   	   header('location: http://localhost/shopping/cart/cart_listing');
   endif;
   //echo "<pre>";print_r($_SESSION['cart'][$cart_id]);
   //echo $_SESSION['cart'][$cart_id]['product_id'];
endif;

?>