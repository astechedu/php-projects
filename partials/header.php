<?php
   session_start();

   //echo "<pre>";print_r($_SESSION);   
   
   include_once $_SERVER['DOCUMENT_ROOT'].'/database/connection.php';
   $shopping = new ShoppingDB();
   $conn = $shopping->connection();
   //echo "<pre>";print_r($conn);
   
   // Assuming you have a form submission with username/email and password
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
       $username = $_POST["name"]?? '';
       $password = $_POST["password"]?? '';
   
       // Fetch user record from the database
       $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE name = ?");
       $stmt->execute([$username]);
       $user = $stmt->fetch();
   
       if ($user) {
           // Verify the password
           if (password_verify($password, $user['password'])) {
               // Password is correct, log in the user
               //session_start();
               $_SESSION['id'] = true;
               $_SESSION['user_id'] = $user['id'];
               $_SESSION['username'] = $user['name'];
               $_SESSION['password'] = $user['password'];
               // Redirect to a logged-in page or do whatever is necessary
               header("Location: /");
               exit();
           } else {
               // Password is incorrect
               $error = "Invalid username or password.";
           }
       } else {
           // User not found
           $error = "Invalid username or password.";
       }
   }
   
   ?>
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
                        <a class="nav-link" href="http://localhost/shopping/cart/cart_listing">
                        <i class="fa fa-shopping-cart"></i> Cart (<?php if(isset($_SESSION['id']) === true){ echo count($_SESSION["cart"])?? '0'; }else{ echo '0'; } ?>)
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="http://localhost/user/user_wishlist">
                        <i class="fa fa-heart"></i> Wishlist (0)
                        </a>
                     </li>
                     <?php if(isset($_SESSION['id']) === true){ ?>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user"></i><?= $_SESSION['username'] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <li><a class="dropdown-item" href="http://localhost/user/user_profile"><i class="fa fa-user"></i> Profile</a></li>
                           <li><a class="dropdown-item" href="http://localhost/user/user_order"><i class="fa fa-list"></i> My Orders</a></li>
                           <li><a class="dropdown-item" href="http://localhost/user/user_wishlist"><i class="fa fa-heart"></i> My Wishlist</a></li>
                           <li><a class="dropdown-item" href="http://localhost/shopping/cart/cart_listing"><i class="fa fa-shopping-cart"></i> My Cart</a></li>
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
