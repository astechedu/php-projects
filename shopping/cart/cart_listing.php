<?php
//session_start();

include_once "../../database/connection.php";
$products = $shoppingDB->readData();

?>
<?php include_once "../../config/app.php"; ?>
<?php include_once baseDir . "/partials/header.php"; ?>
<?php include_once baseDir . "/partials/nav.php"; ?> 

<!-- cart + summary -->
<section class="bg-light my-5">
   <div class="container">
      <div class="row">
         <!-- cart -->
         <div class="col-lg-9">
            <div class="card border shadow-0">
               <div class="m-4">
                  <h4 class="card-title mb-4">Your shopping cart</h4>
                  <!-- One Cart Details -->
                  <?php foreach($_SESSION['cart']?? [] as $cart) { ?>                      
                  <div class="row gy-3 mb-4">                     
                     <div class="col-lg-5">
                        <div class="me-lg-5">
                           <div class="d-flex">
                              <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/11.webp" class="border rounded me-3" style="width: 96px; height: 96px;" />
                              <div class="">
                                 <a href="#" class="nav-link"><?= $cart['product_name'] ?></a>
                                 <p class="text-muted">Yellow, Jeans</p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-4 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                        <div class="">
                           <div class="input-group">
                           <span class="minus btn border me-1"><i class="fa fa-minus"></i>
                           </span>
                           <input type="text" name="" value="<?= $cart['quantity'] ?>" style="width: 40px;" class="me-1 qty">
                           <span class="plus btn btn1 border me-1"><i class="fa fa-plus"></i>
                           </span>
                           </div>                        
                        </div>
                        <div class="">
                           <span>$<text class="h6 price"><?= $cart['price'] ?></text></span>
                           <br />
                           <small class="text-muted text-nowrap"> <?= $cart['price']*0.40 ?> / per item </small>
                        </div>
                     </div>
                     <div class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                        <div class="float-md-end">
                           <a href="http://localhost/user/user_wishlist" class="btn btn-light border px-2 icon-hover-primary"><i class="fa fa-heart fa-lg px-1 text-secondary"></i></a>
                           <a href="http://localhost/shopping/cart/remove_cart?cartid=<?php echo $cart['product_id']; ?>" class="btn btn-light border text-danger icon-hover-danger"> Remove</a>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <!-- One Cart Details -->

               </div>
               <div class="border-top pt-4 mx-4 mb-4">
                  <p><i class="fas fa-truck text-muted fa-lg"></i> Free Delivery within 1-2 weeks</p>
                  <p class="text-muted">
                     Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                     aliquip
                  </p>
               </div>
            </div>
         </div>
         <!-- cart -->
         <!-- summary -->
         <div class="col-lg-3">
            <div class="card mb-3 border shadow-0">
               <div class="card-body">
                  <form>
                     <div class="form-group">
                        <label class="form-label">Have coupon?</label>
                        <div class="input-group">
                           <input type="text" class="form-control border" name="" placeholder="Coupon code" />
                           <button class="btn btn-light border">Apply</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
   <?php
      $total=0;
      $discount=0;
      $tax=0;
      $gtotal=0;

   foreach($_SESSION['cart']?? [] as $checkCart):
               //echo "<pre>";print_r($_SESSION);            
            $total += (float)$checkCart['price'] * (float)$checkCart['quantity'];    
   endforeach;

   if($total > 0):
      $discount = $total*0.12;
      $tax = $total * 0.4;
      $gtotal = ($total + $tax) - $discount; 

   endif;    
   ?>
            <div class="card shadow-0 border">
               <div class="card-body">
                  <div class="d-flex justify-content-between">
                     <p class="mb-2">Total price:</p>
                     <p class="mb-2">$<span id="total"><?= $total ?></span></p>
                  </div>
                  <div class="d-flex justify-content-between">
                     <p class="mb-2">Discount:</p>
                     <p class="mb-2 text-success">-$<span id="discount"><?= $discount ?></span></p>
                  </div>
                  <div class="d-flex justify-content-between">
                     <p class="mb-2">TAX:</p>
                     <p class="mb-2">$<span id="tax"><?= $tax ?></span></p>
                  </div>
                  <hr />
                  <div class="d-flex justify-content-between">
                     <p class="mb-2">Total price:</p>
                     <p class="mb-2 fw-bold">$<span id="gtotal"><?= $gtotal ?></span></p>
                  </div>
                  <div class="mt-3">
                     <a href="#" id="checkout" class="btn btn-success w-100 shadow-0 mb-2"> Make Purchase </a>
                     <a href="http://localhost/index.php" class="btn btn-light w-100 border mt-2"> Back to shop </a>
                  </div>
               </div>
            </div>
         </div>
         <!-- summary -->
      </div>
   </div>
</section>
<!-- cart + summary -->
<section>
   <div class="container my-5">
      <header class="mb-4">
         <h3>Recommended items</h3>
      </header>
      <div class="row">
         <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
               <div class="mask px-2" style="height: 50px;">
                  <div class="d-flex justify-content-between">
                     <h6><span class="badge bg-danger pt-1 mt-3 ms-2">New</span></h6>
                     <a href="#"><i class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"></i></a>
                  </div>
               </div>
               <a href="#" class="">
               <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/7.webp" class="card-img-top rounded-2" />
               </a>
               <div class="card-body d-flex flex-column pt-3 border-top">
                  <a href="#" class="nav-link">Gaming Headset with Mic</a>
                  <div class="price-wrap mb-2">
                     <strong class="">$18.95</strong>
                     <del class="">$24.99</del>
                  </div>
                  <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                     <a href="#" class="btn btn-outline-primary w-100">Add to cart</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
               <div class="mask px-2" style="height: 50px;">
                  <a href="#"><i class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"></i></a>
               </div>
               <a href="#" class="">
               <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/5.webp" class="card-img-top rounded-2" />
               </a>
               <div class="card-body d-flex flex-column pt-3 border-top">
                  <a href="#" class="nav-link">Apple Watch Series 1 Sport </a>
                  <div class="price-wrap mb-2">
                     <strong class="">$120.00</strong>
                  </div>
                  <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                     <a href="#" class="btn btn-outline-primary w-100">Add to cart</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card px-4 border shadow-0">
               <div class="mask px-2" style="height: 50px;">
                  <a href="#"><i class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"></i></a>
               </div>
               <a href="#" class="">
               <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/9.webp" class="card-img-top rounded-2" />
               </a>
               <div class="card-body d-flex flex-column pt-3 border-top">
                  <a href="#" class="nav-link">Men's Denim Jeans Shorts</a>
                  <div class="price-wrap mb-2">
                     <strong class="">$80.50</strong>
                  </div>
                  <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                     <a href="#" class="btn btn-outline-primary w-100">Add to cart</a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card px-4 border shadow-0">
               <div class="mask px-2" style="height: 50px;">
                  <a href="#"><i class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"></i></a>
               </div>
               <a href="#" class="">
               <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/10.webp" class="card-img-top rounded-2" />
               </a>
               <div class="card-body d-flex flex-column pt-3 border-top">
                  <a href="#" class="nav-link">Mens T-shirt Cotton Base Layer Slim fit </a>
                  <div class="price-wrap mb-2">
                     <strong class="">$13.90</strong>
                  </div>
                  <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                     <a href="#" class="btn btn-outline-primary w-100">Add to cart</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Recommended -->
<?php include_once '../functions.php'; 
      template_footer();      
?>

<script>
const qty = document.querySelectorAll('.qty')
const price = document.querySelectorAll('.price')

const total = document.querySelector('#total')
const tax = document.querySelector('#tax')
const discount = document.querySelector('#discount')
const gtotal = document.querySelector('#gtotal')

const checkout = document.querySelector('#checkout')



const initialPrices = Array.from(price).map((price) => parseFloat(price.textContent))

//Script for + button
const plus = document.querySelectorAll('.plus')

       
plus.forEach((plusEle,index) => { 
   plusEle.addEventListener('click', () => {       
      const clickedIndex = index
      const qtyInput = qty[clickedIndex]
      const priceElement = price[clickedIndex]
      const initialPrice = initialPrices[clickedIndex]
      let quantity = parseInt(qtyInput.value)    

      //Checking quantity <= 0
      if(quantity <= 0){
          //quantity=0
          total.textContent=0        
          tax.textContent= 0
          discount.textContent=0
          qtyInput.value = 0
      }   
      //If quantitity not a number
      if(isNaN(quantity) ){
          //quantity=0
          total.textContent=0        
          tax.textContent= 0
          discount.textContent=0
          qtyInput.value = 0
      }  
      quantity++   
      qtyInput.value = quantity
      //quantity.value = quantity
      const pricePerUnit = parseFloat(priceElement.textContent)      
      const totalPrice = quantity * initialPrice     
      
      //alert(quantity)   
      //console.log(totalPrice)
      priceElement.textContent = totalPrice.toFixed(2)             
      totalSale2()         
   })
})
   



//Script for - button
const minus = document.querySelectorAll('.minus')

minus.forEach((minusEle,index) => { 
   minusEle.addEventListener('click', () => {       
      const clickedIndex = index
      const qtyInput = qty[clickedIndex]
      const priceElement = price[clickedIndex]
      const initialPrice = initialPrices[clickedIndex]
      let quantity = parseInt(qtyInput.value)    

      //Checking quantity <= 0
      if(quantity <= 0){
          //quantity=0
          total.textContent=0        
          tax.textContent= 0
          discount.textContent=0
          qtyInput.value = 0
      }   
      //If quantitity not a number
      if(isNaN(quantity) ){
          //quantity=0
          total.textContent=0        
          tax.textContent= 0
          discount.textContent=0
          qtyInput.value = 0
      }  
      quantity--  
      qtyInput.value = quantity
      const pricePerUnit = parseFloat(priceElement.textContent)      
      const totalPrice = quantity * initialPrice
       
      //qtyInput.value = quantity
      //alert(quantity)   
      //console.log(totalPrice)
      priceElement.textContent = totalPrice.toFixed(2)             
      totalSale2()         
   })
})
   





//Increasing quantity 
/*
qty.forEach((qtyEle,index) => {
   qtyEle.addEventListener('keyup', () => {
      const clickedIndex = index
      const qtyInput = qty[clickedIndex]
      const priceElement = price[clickedIndex]
      const initialPrice = initialPrices[clickedIndex]
      let quantity = parseInt(qtyInput.value)    

      //Checking quantity <= 0
      if(quantity <= 0){
          quantity=0
          total.textContent=0        
          tax.textContent= 0
          discount.textContent=0
      }   
      //If quantitity not a number
      if(isNaN(quantity) ){
          quantity=0
          total.textContent=0        
          tax.textContent= 0
          discount.textContent=0
      }  

      quantity.value = quantity
      const pricePerUnit = parseFloat(priceElement.textContent)      
      const totalPrice = quantity * initialPrice
      quantity++      
      //console.log(totalPrice)
      priceElement.textContent = totalPrice.toFixed(2)             
      totalSale2()         
   })
})
*/

//totalSale2()

function totalSale2(){

const tot = []
price.forEach((priceElement, index) => {  

   //const mySet = new Map(priceElement.textContent)
   tot.push(parseFloat(priceElement.textContent))
      const totPrice=tot.reduce((acc,init)=>{
          return acc+init
      })
      //console.log(totR)
      total.textContent = totPrice

      tax.textContent=(totPrice*0.4).toFixed(2)
      discount.textContent=(totPrice*0.12).toFixed(2)

      gtotal.textContent = (parseFloat(total.textContent) + parseFloat(tax.textContent) - parseFloat(discount.textContent)).toFixed(2)
      })

}

//Clicking on checkout button

checkout.addEventListener('click', (e) => {
  
   //console.log("You are not lgged in")
   alert("You are not lgged in")
})




</script>

<style>
   .icon-hover-primary:hover {
   border-color: #3b71ca !important;
   background-color: white !important;
   }
   .icon-hover-primary:hover i {
   color: #3b71ca !important;
   }
   .icon-hover-danger:hover {
   border-color: #dc4c64 !important;
   background-color: white !important;
   }
   .icon-hover-danger:hover i {
   color: #dc4c64 !important;
   } 

</style>


