@extends('layouts.default')

@section('title')
Cart
@endsection

@section('content')

	<link href="{{ asset('css/montserrat.css') }}" rel="stylesheet">

	<div class="alert alert-success" id="success" style="position: absolute;top:60px;left:300;width:85%;">
        <!--{{ session('success') }}-->
    </div>

	<main class="page">  
	 	<section class="shopping-cart dark">
	 		<div class="container">
		        <div class="block-heading">
		          <h2>Shopping Cart</h2>
		          <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing</p>-->
		        </div>       
		        <div class="content">	 	        	        	
	 				<div class="row">	
	 					<div class="col-md-12 col-lg-8">
	 						<div class="items">
@php
  $subtotal=0;
  $discount=10;
  $shipping=40;
  $oneItemCost=0;
  $total=0;  
@endphp		 							
	 							<?php foreach($carts as $cart) { ?>
				 				<div class="product" pid="{{$cart['pid']}}">
				 					<div class="row">
					 					<div class="col-md-1">
					 						<img class="img-fluid mx-auto d-block image" src="{{asset('images/shop3.png')}}">
					 					</div>
					 					<div class="col-md-8">
					 						<div class="info">
						 						<div class="row">
							 						<div class="col-md-5 product-name">
							 							<div class="product-name">
								 							<a href="#">{{$cart['name']}}</a>
								 							<div class="product-info">
									 							<div>Display: <span class="value">5 inch</span></div>
									 							<div>RAM: <span class="value">4GB</span></div>
									 							<div>Memory: <span class="value">32GB</span></div>
									 						</div>
									 					</div>
							 						</div>
							 						<div class="col-md-4 quantity">
							 							<label for="quantity">Quantity:</label>
							 							<input id="quantity" type="number" value ="{{$cart['qty']}}" class="form-control quantity-input qty">
							 						</div>
							 						<div class="col-md-3 price">
							 							$<span id="prc" class="prc">{{$cart['price']}}</span>
							 						</div>
													<div class="col-md-2">             
						                                <div class="btn btn-md btn-danger cartRemove" pid="{{$cart['pid']}}">
						                               Remove</div>               
						                         	</div>

							 					</div>
							 				</div>
					 					</div>
@php
  $oneItemCost = $cart['price'] * $cart['qty'];
  $subtotal += $oneItemCost;
  $total = $subtotal - $discount + $shipping;
@endphp		
					 				</div>
				 				</div>

				 				<?php } ?>

				 			</div>
			 			</div>
			 			<div class="col-md-12 col-lg-4">
			 				<div class="summary">
			 					<h3>Summary</h3>
			 					<div class="summary-item"><span class="text">Subtotal</span><span class="price">$<span id="subtotal"><?= $subtotal ?></span></div>
			 					<div class="summary-item"><span class="text">Discount</span><span class="price" id="discount">$<?= $discount ?></span></div>
			 					<div class="summary-item"><span class="text">Shipping</span><span class="price" id="shipping">$<?= $shipping ?></span></div>
			 					<div class="summary-item"><span class="text">Total</span><span class="price" id="total">$<?= $total ?></span></div>
			 					<button type="button" class="btn btn-primary btn-lg btn-block" id="checkout">Checkout</button>
				 			</div>
			 			</div>



		 			</div> 
		 		</div>
	 		</div>

	 		<div id="ajaxcart">
             <div id="li">
             	
             </div>
	 		</div>
		</section>
	</main>



<style>
.shopping-cart{
	padding-bottom: 50px;
	font-family: 'Montserrat', sans-serif;
}

.shopping-cart.dark{
	background-color: #f6f6f6;
}

.shopping-cart .content{
	box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
	background-color: white;
}

.shopping-cart .block-heading{
    padding-top: 0px;
    margin-bottom: 0px;
    text-align: center;
}

.shopping-cart .block-heading p{
	text-align: center;
	max-width: 420px;
	margin: auto;
	opacity:0.7;
}

.shopping-cart .dark .block-heading p{
	opacity:0.8;
}

.shopping-cart .block-heading h1,
.shopping-cart .block-heading h2,
.shopping-cart .block-heading h3 {
	margin-bottom:1.2rem;
	color: #3b99e0;
}

.shopping-cart .items{
	margin: auto;
}

.shopping-cart .items .product{
	margin-bottom: 20px;
	padding-top: 20px;
	padding-bottom: 20px;
}

.shopping-cart .items .product .info{
	padding-top: 0px;
	text-align: center;
}

.shopping-cart .items .product .info .product-name{
	font-weight: 600;
}

.shopping-cart .items .product .info .product-name .product-info{
	font-size: 14px;
	margin-top: 15px;
}

.shopping-cart .items .product .info .product-name .product-info .value{
	font-weight: 400;
}

.shopping-cart .items .product .info .quantity .quantity-input{
    margin: auto;
    width: 80px;
}

.shopping-cart .items .product .info .price{
	margin-top: 15px;
    font-weight: bold;
    font-size: 22px;
 }

.shopping-cart .summary{
	border-top: 2px solid #5ea4f3;
    background-color: #f7fbff;
    height: 100%;
    padding: 30px;
}

.shopping-cart .summary h3{
	text-align: center;
	font-size: 1.3em;
	font-weight: 600;
	padding-top: 20px;
	padding-bottom: 20px;
}

.shopping-cart .summary .summary-item:not(:last-of-type){
	padding-bottom: 10px;
	padding-top: 10px;
	border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.shopping-cart .summary .text{
	font-size: 1em;
	font-weight: 600;
}

.shopping-cart .summary .price{
	font-size: 1em;
	float: right;
}

.shopping-cart .summary button{
	margin-top: 20px;
}

@media (min-width: 768px) {
	.shopping-cart .items .product .info {
		padding-top: 25px;
		text-align: left; 
	}

	.shopping-cart .items .product .info .price {
		font-weight: bold;
		font-size: 22px;
		top: 17px; 
	}

	.shopping-cart .items .product .info .quantity {
		text-align: center; 
	}
	.shopping-cart .items .product .info .quantity .quantity-input {
		padding: 4px 10px;
		text-align: center; 
	}
}

</style>

<script>
	$(function(){

 		let qty = document.querySelectorAll('.qty')
		let price = document.querySelectorAll('.prc')

/*
		$('.qty').on('change',function(){
			$.each(qty,function(i,eleQty){
				console.log(eleQty.value)
				$.each(price,function(i,elePrice){
					console.log(elePrice.textContent * eleQty.value)

				})
			})				
		})
*/
 
        
        //let price = 0

/* Working 
		$('.qty').on('change',function(i){
			 let q  = $(this)
			 let qty = parseInt($(this).val());

			let  p = [$('.prc')]

		    $.each(p,function(i,elePrice){ 
		            
		        if(q.closest(elePrice[i])){              
                      
				let price = q.parent().siblings('.price').find('.prc')
				prevPrice = price[i].innerText
					 //console.log(a[i].innerText * q.val())					     
				let tot = parseFloat(price[i].innerText) * qty  		        
			    price[i].innerText = tot
			    tot = price[i].innerText

			        if(qty < 1){   	
			            q.val(1)
                        price[i].innerText = prevPrice 
					}	                		
		        }
		    })				
		})		
*/   //End

/*
        let tot=0;
		$('.qty').on('change',function(){
			 let q  = $(this)
			 let qty = parseInt($(this).val());
			 //console.log(q)
              
             if($(this).closest('.pcr')){
             	
             	let  p = $('.prc')[0]
             	let priceFloat = parseFloat(p.textContent)
             	    tot = qty * priceFloat
                    p.textContent = tot
                //$('.prc').text(qty*priceFloat);
             	console.log(p)
             }

			//$.each(qty,function(i,eleQty){
				//console.log(eleQty)
				//let f = $('.qty').parent('.quantity').siblings('.price').children('.prc')
				                
			//})				
		})	
*/


	})
</script>

@endsection