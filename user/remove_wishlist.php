<?php
session_start();

$wid = (int)$_GET['wid'];
$wpid = (int)$_SESSION['wishlist'][$wid]['wpid'];
//echo "<pre>";print_r($_SESSION['wishlist'][$wid]['wpid']);
if(isset($_SESSION['wishlist'][$wid])):
   
   if($wid === $wpid ):
   	   unset($_SESSION['wishlist'][$wid]); 
   	   header('location: http://localhost/user/user_wishlist');   	   
   endif;
endif;

?>