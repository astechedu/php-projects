<div class="container">
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="images/img-1.jpg">
                        <img class="pic-2" src="images/img-2.jpg">
                    </a>
                    <span class="product-sale-label">hot</span>
                    <span class="product-discount-label">-33%</span>
                </div>
                <div class="product-content">
                    <ul class="rating">
                       <li class="fas fa-star"></li>
                       <li class="fas fa-star"></li>
                       <li class="fas fa-star"></li>
                       <li class="fas fa-star"></li>
                       <li class="fas fa-star disable"></li>
                    </ul>
                    <h3 class="title"><a href="#">Men's Blazer</a></h3>
                    <div class="price"><span>$30.00</span> $20.00</div>
                    <div class="product-button-group">
                        <a class="product-like-icon" href="#"><i class="fas fa-heart"></i></a>
                        <a class="add-to-cart" href="#"><i class="fa fa-shopping-bag"></i>ADD TO CART</a>
                        <a class="product-compare-icon" href="#"><i class="fas fa-random"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="#" class="image">
                        <img class="pic-1" src="images/img-3.jpg">
                        <img class="pic-2" src="images/img-4.jpg">
                    </a>
                    <span class="product-sale-label">hot</span>
                </div>
                <div class="product-content">
                    <ul class="rating">
                       <li class="fas fa-star"></li>
                       <li class="fas fa-star"></li>
                       <li class="fas fa-star"></li>
                       <li class="fas fa-star"></li>
                       <li class="fas fa-star"></li>
                    </ul>
                    <h3 class="title"><a href="#">Women's Shirt</a></h3>
                    <div class="price">$12.30</div>
                    <div class="product-button-group">
                        <a class="product-like-icon" href="#"><i class="fas fa-heart"></i></a>
                        <a class="add-to-cart" href="#"><i class="fa fa-shopping-bag"></i>ADD TO CART</a>
                        <a class="product-compare-icon" href="#"><i class="fas fa-random"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
CSS (Fonts required : Oswald)
:root{
    --main-color1: #eb4d4b;
    --text-color: #131e2c;
}
.product-grid{
    font-family: 'Oswald', sans-serif;
    text-align: center;
}
.product-grid .product-image{ position: relative; }
.product-grid .product-image a.image{ display: block; }
.product-grid .product-image img{
    width: 100%;
    height: auto;
}
.product-image .pic-1{
    opacity: 1;
    backface-visibility: hidden;
    transition: all 0.3s ease-in-out;
}
.product-grid:hover .product-image .pic-1{ opacity: 0; }
.product-image .pic-2{
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    opacity: 0;
    position: absolute;
    top: 0;
    left: 0;
    transition: all 0.3s ease-in-out;
}
.product-grid:hover .product-image .pic-2{ opacity: 1; }
.product-grid .product-sale-label,
.product-grid .product-discount-label{
    color: #fff;
    background: #da5555;
    font-size: 12px;
    letter-spacing: 1px;
    line-height: 14px;
    padding: 5px 11px;
    border-radius: 12px;
    position: absolute;
    top: 10px;
    right: 10px;
    transition: all 0.4s ease;
}
.product-grid .product-sale-label{
    background: #2ba968;
    text-transform: uppercase;
    left: 10px;
    right: auto;
}
.product-grid .product-content{ padding: 12px; }
.product-grid .rating{
    padding: 0;
    margin: 0 0 7px;
    list-style: none;
}
.product-grid .rating li{
    color: var(--text-color);
    font-size: 12px;
    display: inline-block;
}
.product-grid .rating li.disable{ color: rgba(0,0,0,.20); }
.product-grid .title{
    color: var(--text-color);
    font-size: 20px;
    text-transform: capitalize;
    margin: 0 0 7px;
}
.product-grid .title a{
    color: var(--text-color);
    transition: all 500ms;
}
.product-grid .title a:hover{ color: var(--main-color1); }
.product-grid .price{
    color: var(--text-color);
    font-size: 18px;
    letter-spacing: 0.005em;
    margin-bottom: 10px;
}
.product-grid .price span{
    color: #a7a7a7;
    font-size: 14px;
    font-weight: 400;
    text-decoration: line-through;
}
.product-grid .product-button-group{
    position: relative;
    z-index: 1;
}
.product-grid .add-to-cart{
    color: var(--text-color);
    background: #f4f4f4;
    font-size: 14px;
    width: calc(100% - 75px);
    padding: 8px 3px;
    margin: 0 auto;
    display: inline-block;
    transition: all 0.25s ease 0s;
}
.product-grid .add-to-cart i{
    margin-right: 8px;
    display: none;
    visibility: hidden;
    transition: all 0.25s ease 0s;
}
.product-grid:hover .add-to-cart{
    color:#fff;
    background: var(--text-color);
}
.product-grid:hover .add-to-cart i{
    display: inline-block;
    visibility: visible;
}
.product-grid .product-like-icon,
.product-grid .product-compare-icon{
    color: var(--text-color);
    background: #f4f4f4;
    line-height: 34px;
    width: 34px;
    height: 34px;
    opacity: 0;
    transform: translateY(-50%);
    position: absolute;
    top: 50%;
    left: 50px;
    z-index: -1;
    transition: all 0.25s ease 0s;
}
.product-grid .product-compare-icon{
    left: auto;
    right: 50px;
}
.product-grid:hover .product-like-icon{
    opacity: 1;
    left: 0;
}
.product-grid:hover .product-compare-icon{
    opacity: 1;
    right: 0;
}
@media only screen and (max-width:990px){
    .product-grid{ margin-bottom: 30px; }
}
</style>