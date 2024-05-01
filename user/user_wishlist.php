<?php include_once '../config/app.php'; ?>
<?php include_once baseDir.'/partials/header.php' ?>
<?php include_once baseDir.'/partials/nav.php';?>

<div class="py-3 py-md-5 bg-light">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="shopping-cart">
               <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                  <div class="row">
                     <div class="col-md-6">
                        <h4>Products</h4>
                     </div>
                     <div class="col-md-2">
                        <h4>Price</h4>
                     </div>
                     <div class="col-md-2">
                        <h4>Quantity</h4>
                     </div>
                     <div class="col-md-2">
                        <h4>Remove</h4>
                     </div>
                  </div>
               </div>
               <?php foreach($_SESSION['wishlist']?? [] as $wishlist){ ?>
               <div class="cart-item">
                  <div class="row">
                     <div class="col-md-6 my-auto">
                        <a href="">
                        <label class="product-name">
                        <img src="hp-laptop.jpg" style="width: 50px; height: 50px" alt="">
                        <?= $wishlist['wname'] ?>
                        </label>
                        </a>
                     </div>
                     <div class="col-md-2 my-auto">
                        <label class="price">$<?= $wishlist['wprice'] ?></label>
                     </div>
                     <div class="col-md-2 col-7 my-auto">
                        <div class="quantity">
                           <div class="input-group">
                              <span class="btn btn1"><i class="fa fa-minus"></i></span>
                              <input type="text" value="<?= $wishlist['wqty'] ?>" class="input-quantity" />
                              <span class="btn btn1"><i class="fa fa-plus"></i></span>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-2 col-5 my-auto">
                        <div class="remove">
                           <a href="" class="btn btn-danger btn-sm">
                           <i class="fa fa-trash"></i> Remove
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <?php } ?>    
            </div>
         </div>
      </div>
   </div>
</div>
<?php include_once baseDir.'/partials/footer.php';?>
<style>
   /* Cart or Wishlist */
   .shopping-cart .cart-header{
   padding: 10px;
   }
   .shopping-cart .cart-header h4{
   font-size: 18px;
   margin-bottom: 0px;
   }
   .shopping-cart .cart-item a{
   text-decoration: none;
   }
   .shopping-cart .cart-item{
   background-color: #fff;
   box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
   padding: 10px 10px;
   margin-top: 10px;
   }
   .shopping-cart .cart-item .product-name{
   font-size: 16px;
   font-weight: 600;
   width: 100%;
   white-space: nowrap;
   text-overflow: ellipsis;
   overflow: hidden;
   cursor: pointer;
   }
   .shopping-cart .cart-item .price{
   font-size: 16px;
   font-weight: 600;
   padding: 4px 2px;
   }
   .shopping-cart .btn1{
   border: 1px solid;
   margin-right: 3px;
   border-radius: 0px;
   font-size: 10px;
   }
   .shopping-cart .btn1:hover{
   background-color: #2874f0;
   color: #fff;
   }
   .shopping-cart .input-quantity{
   border: 1px solid #000;
   margin-right: 3px;
   font-size: 12px;
   width: 40%;
   outline: none;
   text-align: center;
   }
   /* Cart or Wishlist */
</style>
