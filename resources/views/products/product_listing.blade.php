@extends('layouts.default')

@section('title')
Poroducts
@endsection

@section('content')
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
        <div class="alert alert-success" id="success" style="position: absolute;top:60px;left:300;width:85%;">
            <!--{{ session('success') }}-->
            {!! Session::has('success') ? Session::get("success") : '' !!}
        </div>  

            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Products</h4>
                </div>
                <?php foreach($products as $product) { ?>
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-success">In Stock</label>
                            
                            <img src="http://localhost/images/<?= $product['src'] ?>.webp" alt="Laptop">
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">HP</p>
                            <h5 class="product-name">
                               <a href="">                                  
                                    <?= $product['name'] ?>
                               </a>
                            </h5>
                            <div>
                                <span class="selling-price">$<span ><?= $product['price'] ?></span></span>
                                <span class="original-price">$<span>
                                    <?= $product['price'] + $product['price']*0.4 ?>
                                        
                                    </span></span>
                            </div>
 
                         <!-- Add to Cart Without Jquery  -->
                            <form action="{{ route('cart.addtocart') }}" method="post" id="ajax">
                                @csrf                                
                               
                                <input type="hidden" name="pid" value="<?= $product['id'] ?>" id="pid">                                
                                <input type="hidden" name="pname" value="<?= $product['name'] ?>" id="pname">
                                <input type="hidden" name="pprice" value="<?= $product['price'] ?>" id="pprice">
                                <input type="hidden" name="description" value="<?= $product['description'] ?>" id="description">  

                                <input type="hidden" name="qty" value="1" class="" id="qty">  

                                <input type="submit" name="submit" value="Add To Cart" id="addStatButton">  

                            </form> 
             
                    <!-- Add to Cart Without Jquery:  Not Working -->
                 <!--   
                              <input type="hidden" value="<?= $product['id'] ?>" id="pid">                                
                                <input type="hidden"  value="<?= $product['name'] ?>" id="pname">
                                <input type="hidden" value="<?= $product['price'] ?>" id="pprice">
                                <input type="hidden"  value="<?= $product['description'] ?>" id="description">  

                                <input type="hidden" value="1" class="" id="qty">  
                                                                    
                                <button type="button" id="addStatButton">Button</button>
                  -->

                            <!--
                                    <div class="mt-2">
                                        <a href="" class="btn btn1">Add To Cart</a>
                                        <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                        <a href="" class="btn btn1"> View </a>
                                    </div>    
                            -->
                        </div>
                    </div>          
                </div>
                <?php } ?>

            </div>
        </div>
    </div>

<script>
//
</script>

<style type="text/css">
/* Product Card */
.product-card{
    background-color: #fff;
    border: 1px solid #ccc;
    margin-bottom: 24px;
}
.product-card a{
    text-decoration: none;
}
.product-card .stock{
    position: absolute;
    color: #fff;
    border-radius: 4px;
    padding: 2px 12px;
    margin: 8px;
    font-size: 12px;
}
.product-card .product-card-img{
    max-height: 260px;
    overflow: hidden;
    border-bottom: 1px solid #ccc;
}
.product-card .product-card-img img{
    width: 100%;
}
.product-card .product-card-body{
    padding: 10px 10px;
}
.product-card .product-card-body .product-brand{
    font-size: 14px;
    font-weight: 400;
    margin-bottom: 4px;
    color: #937979;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
.product-card .product-card-body .product-name{
    font-size: 20px;
    font-weight: 600;
    color: #000;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
.product-card .product-card-body .selling-price{
    font-size: 22px;
    color: #000;
    font-weight: 600;
    margin-right: 8px;
}
.product-card .product-card-body .original-price{
    font-size: 18px;
    color: #937979;
    font-weight: 400;
    text-decoration: line-through;
}
.product-card .product-card-body .btn1{
    border: 1px solid;
    margin-right: 3px;
    border-radius: 0px;
    font-size: 12px;
    margin-top: 10px;
}
/* Product Card End */    
</style>


@endsection