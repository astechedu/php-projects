<?php
   // Reading data
   $products = $shoppingDB->readData();
   //print_r($products);
   //$categories = $shoppingDB->readCategories();
   //print_r($categories);
?>
<div class="py-3 py-md-5 bg-light">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h4 class="mb-4">Our Products</h4>
         </div>
         <!-- Products Listing -->
         <?php foreach($products as $product) { ?>
         <div class="col-md-3">
            <div class="product-card">
               <div class="product-card-img">
                  <label class="stock bg-success">In Stock</label>
                  <img src="http://localhost/images/shirt.png" alt="Laptop">
               </div>
               <div class="product-card-body">
                  <p class="product-brand">HP</p>
                  <h5 class="product-name">
                     <a href="<?php baseUrl;?>/shopping/product_view.php" class="">
                     <?= $product['product_name'] ?> 
                     </a>
                  </h5>
                  <div>
                     <span class="selling-price price">$<?= $product['price'] ?></span>
                     <span class="original-price discount">$<?= $product['price']*0.10 ?></span>
                  </div>
                  <div class="mt-2">                     
                     <!-- Post cart data -->
                     <form action="http://localhost/shopping/cart/add_to_cart.php?pid=<?= $product['product_id'] ?>" method="POST">
                     <input type="hidden" name="product_name" value="<?= $product['product_name'] ?> ">
                     <input type="hidden" name="price" value="<?= $product['price'] ?> ">
                     <input type="hidden" name="product_id" value="<?= $product['product_id'] ?> ">   
                     <input type="hidden" name="stock_quantity" value="<?= $product['stock_quantity'] ?> ">                                     
                     <input type="submit" value="AddToCart" class="btn btn1 addtocart">      
                     </form>   
                      <a href="#" class="btn btn1 addtocart" >Add To Cart</a>                            
                     <a href="<?php baseUrl;?>/user/user_wishlist.php" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                     <a href="<?php baseUrl;?>/shopping/product_view.php" class="btn btn1"> View </a>

                  </div>
               </div>
            </div> 
         </div>
         <?php } ?> 
         <!-- Products Listing -->
      </div>
   </div>
</div>

    <h1>Loading Page with Request</h1>
    <div id="result"></div>

    <script>
 //
    </script>
  


