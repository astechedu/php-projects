<?php
   // Reading data
   //$products = $shoppingDB->readData();
   //print_r($products);
   $categories = $shoppingDB->readCategories();
   //print_r($categories);
      
?>        
<nav class="navbar navbar-expand-lg">
   <div class="container-fluid">
      <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
      Funda Ecom
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!-- Displaying Categories --> 
            <?php foreach($categories as $category) { ?> 
            <li class="nav-item">
               <a class="nav-link" href="#"><?= $category['category_name'] ?> </a>
            </li>
            <?php } ?> 
            <!-- Displaying Categories -->   
            <!--
               <li class="nav-item">
                   <a class="nav-link" href="#">Home</a>
               </li>                        
               <li class="nav-item">
                   <a class="nav-link" href="#">All Categories</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="#">New Arrivals</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="#">Featured Products</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="#">Electronics</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="#">Fashions</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="#">Accessories</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="#">Home</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="#">Appliances</a>
               </li>
               -->
         </ul>
      </div>
   </div>
</nav>
</div>
