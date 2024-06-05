@extends('layouts.default')

@section('title')
Poroducts
@endsection

@section('content')

    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Products</h4>
                </div>
                <?php foreach($products as $product) { ?>
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-success">In Stock</label>
                            <img src="{{ asset('images/shop1.png')}}" alt="Laptop">
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">HP</p>
                            <h5 class="product-name">
                               <a href="">                                  
                                    <?= $product['name'] ?>
                               </a>
                            </h5>
                            <div>
                                <span class="selling-price">$<span><?= $product['price'] ?></span></span>
                                <span class="original-price">$<span>
                                    <?= $product['price'] + $product['price']*0.4 ?>
                                        
                                    </span></span>
                            </div>
                            <form action="{{route('cart.addtocart')}}" method="post">
                                @csrf
                                <input type="hidden" name="pname" value="<?= $product['name'] ?>">
                                <input type="hidden" name="pprice" value="<?= $product['price'] ?>">
                                <input type="hidden" name="description" value="<?= $product['description'] ?>">                        
                                <input type="submit" name="submit" value="Add To Cart">
                            </form>
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
<!--
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-success">In Stock</label>
                            <img src="/images/shop1.png" alt="Red MI Note 8">
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">MI</p>
                            <h5 class="product-name">
                               <a href="">
                                    Red MI Note 8
                               </a>
                            </h5>
                            <div>
                                <span class="selling-price">$200</span>
                                <span class="original-price">$300</span>
                            </div>
                            <div class="mt-2">
                                <a href="" class="btn btn1">Add To Cart</a>
                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="" class="btn btn1"> View </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-success">In Stock</label>
                            <img src="/images/shop1.png" alt="Mens Shirt">
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">Levis</p>
                            <h5 class="product-name">
                               <a href="">
                                    Mens Shirt 
                               </a>
                            </h5>
                            <div>
                                <span class="selling-price">$299</span>
                                <span class="original-price">$359</span>
                            </div>
                            <div class="mt-2">
                                <a href="" class="btn btn1">Add To Cart</a>
                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="" class="btn btn1"> View </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-success">In Stock</label>
                            <img src="/images/shop1.png" alt="Head Phone">
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">Asus</p>
                            <h5 class="product-name">
                               <a href="">
                                Head Phone
                               </a>
                            </h5>
                            <div>
                                <span class="selling-price">$399</span>
                                <span class="original-price">$499</span>
                            </div>
                            <div class="mt-2">
                                <a href="" class="btn btn1">Add To Cart</a>
                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="" class="btn btn1"> View </a>
                            </div>
                        </div>
                    </div>
                </div>
-->
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