<?php
   // Reading data
   //$products = $shoppingDB->readData();
   //print_r($products);
   $categories = $shoppingDB->readCategories();
   //print_r($categories);
   
   
?>
<div class="py-3 py-md-5 bg-light">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h4 class="mb-4">Our Categories</h4>
         </div>
         <!-- Displaying Categories -->            
         <?php foreach($categories as $category) { ?>               
         <div class="col-6 col-md-3">
            <div class="category-card">
               <a href="">
                  <div class="category-card-img">
                     <img src="<?php echo baseUrl;?>images/laptop1.png" class="w-100" alt="Laptop">
                  </div>
                  <div class="category-card-body">
                     <h5><?= $category['category_name'] ?> </h5>
                  </div>
               </a>
            </div>
         </div>
         <?php } ?> 
         <!-- Displaying Categories -->   
         <!--
            <div class="col-6 col-md-3">
                <div class="category-card">
                    <a href="">
                        <div class="category-card-img">
                            <img src="<?php echo baseUrl;?>images/laptop2.png" class="w-100" alt="Mobile Devices">
                        </div>
                        <div class="category-card-body">
                            <h5>Mobile</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="category-card">
                    <a href="">
                        <div class="category-card-img">
                            <img src="<?php echo baseUrl;?>images/laptop1.png" class="w-100" alt="Mens Fashion">
                        </div>
                        <div class="category-card-body">
                            <h5>Mens Fashion</h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="category-card">
                    <a href="">
                        <div class="category-card-img">
                            <img src="<?php echo baseUrl;?>images/laptop2.png" class="w-100" alt="Women Fashion">
                        </div>
                        <div class="category-card-body">
                            <h5>Women Fashion</h5>
                        </div>
                    </a>
                </div> -->
      </div>
      <!-- Displaying Categories -->
   </div>
</div>
</div>
