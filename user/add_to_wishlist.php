<?php
session_start();
   $wpid = $_GET['wpid']?? '';
   $wname = $_GET['wname']?? '';
   $wqty = $_GET['wqty']?? '';
   $wprice = $_GET['wprice']?? '';

if(!isset($_SESSION['wishlist'][$wpid])):

   $_SESSION['wishlist'][$wpid] = [];
   
   $_SESSION['wishlist'][$wpid] = [
     'wpid'   => $wpid,
     'wname'  => $wname,
     'wqty'   => $wqty,
     'wprice' => $wprice
   ];
endif;

if(isset($_SESSION['wishlist'][$wpid])):   
   if((int)$wpid === (int)$_SESSION['wishlist'][$wpid]['wpid']):
      $_SESSION['wishlist'][$wpid]['wqty'] +=1;
        header('location: http://localhost');
      exit;
   endif;
endif;
?>