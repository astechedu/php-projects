<?php
//Header Template
/*
function template_header(){
echo <<<EOT
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Shopping</title>
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
      <!-- Bootstrap CSS -->
      <link href="http://localhost/css/bootstrap533.min.css" rel="stylesheet">
      <link rel="stylesheet" href="http://localhost/css/style.css">
      <!-- Custom CSS -->
      <!-- You can link your custom CSS files here -->
   </head>
   <body>
      <div class="main-navbar shadow-sm sticky-top">
      <div class="top-navbar">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                  <a href="http://localhost"><h5 class="brand-name">Funda Ecom</h5></a>
               </div>
               <div class="col-md-5 my-auto">
                  <form role="search">
                     <div class="input-group">
                        <input type="search" placeholder="Search your product" class="form-control" />
                        <button class="btn bg-white" type="submit">
                        <i class="fa fa-search"></i>
                        </button>
                     </div>
                  </form>
               </div>
               <div class="col-md-5 my-auto">
                  <ul class="nav justify-content-end">
                     <li class="nav-item">
                        <a class="nav-link" href="http://localhost/shopping/cart/cart_listing.php">
                        <i class="fa fa-shopping-cart"></i> Cart (0)
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="http://localhost/user/user_wishlist.php">
                        <i class="fa fa-heart"></i> Wishlist (0)
                        </a>
                     </li>
                     <?php if(isset($_SESSION['id']) === true){ ?>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user"></i><?= $_SESSION['username'] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <li><a class="dropdown-item" href="http://localhost/user/user_profile.php"><i class="fa fa-user"></i> Profile</a></li>
                           <li><a class="dropdown-item" href="http://localhost/user/user_order.php"><i class="fa fa-list"></i> My Orders</a></li>
                           <li><a class="dropdown-item" href="http://localhost/user/user_wishlist.php"><i class="fa fa-heart"></i> My Wishlist</a></li>
                           <li><a class="dropdown-item" href="http://localhost/shopping/cart/cart_listing.php"><i class="fa fa-shopping-cart"></i> My Cart</a></li>
                           <li><a class="dropdown-item" href="http://localhost/user/logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                        </ul>
                     </li>
                     <?php }else{ 
                        echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user"></i> Login 
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <form action="/" method="POST">
                        <li><input type="text" name="name" value="" class="dropdown-item" placeholder="User">
                        </li>                                
                        <li><input type="text" name="password" value="" class="dropdown-item" placeholder="Password">
                        </li>                              
                        <li><input type="submit" name="submit" value="Login" class="dropdown-item btn btn-success">
                        </li>
                        </form>
                        </ul>
                        </li>';
                        } 
                        ?>
                  </ul>
               </div>
            </div>
         </div>
      </div>
EOT;
}
*/

//Nav Template
/*
function template_nav(){
echo <<<EOT
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
         </ul>
      </div>
   </div>
</nav>
</div>   
EOT;
}
*/

// Template footer
function template_footer() {
$year = date('Y');
echo <<<EOT
<footer class="py-5">
<footer class="container">
   <div class="row">
      <div class="col-6 col-md-2 mb-3">
         <h5>Store</h5>
         <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
         </ul>
      </div>
      <div class="col-6 col-md-2 mb-3">
         <h5>Support</h5>
         <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
         </ul>
      </div>
      <div class="col-6 col-md-2 mb-3">
         <h5>Information</h5>
         <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
         </ul>
      </div>
      <div class="col-md-5 offset-md-1 mb-3">
         <form>
            <h5>Subscribe to our newsletter</h5>
            <p>Monthly digest of what's new and exciting from us.</p>
            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
               <label for="newsletter1" class="visually-hidden">Email address</label>
               <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
               <button class="btn btn-primary" type="button">Subscribe</button>
            </div>
         </form>
      </div>
   </div>
   <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
      <p>© <?php echo date('Y'); ?> Company, Inc. All rights reserved.</p>
      <ul class="list-unstyled d-flex">
         <li class="ms-3">
            <a class="link-dark" href="#">
               <svg class="bi" width="24" height="24">
                  <use xlink:href="#twitter"></use>
               </svg>
            </a>
         </li>
         <li class="ms-3">
            <a class="link-dark" href="#">
               <svg class="bi" width="24" height="24">
                  <use xlink:href="#instagram"></use>
               </svg>
            </a>
         </li>
         <li class="ms-3">
            <a class="link-dark" href="#">
               <svg class="bi" width="24" height="24">
                  <use xlink:href="#facebook"></use>
               </svg>
            </a>
         </li>
      </ul>
   </div>
   </div>
</footer>
<!-- Bootstrap JS (Optional) -->
<!-- If you need Bootstrap JavaScript features -->
<!-- You can include Bootstrap bundle for JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="http://localhost/js/bootstrap533.bundle.min.js"></script>
</body>
</html>
EOT;
}

?>