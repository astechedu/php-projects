<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <div class="container">
      <a class="navbar-brand" href="#">Brand</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="http://localhost">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#"><?php if(isset($_SESSION['user'])){ echo $_SESSION['user']; } ?></a>
            </li>

            <?php if(isset($_SESSION['user_id'])){ ?> 
            <li class="nav-item">
               <a class="nav-link" href="http://localhost/pages/users_manages.php">User Manages</a>
            </li>       
            <?php } ?>

            <li class="nav-item">
               <a class="nav-link" href="http://localhost/auth/logout.php">
               <?php if(isset($_SESSION['user_id'])){ echo "Logout"; }else{ echo "Login";} ?>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="http://localhost/auth/logout.php">
               <?php if(!isset($_SESSION['user_id'])){ echo "Register"; }?>
               </a>
            </li>
         </ul>
      </div>
   </div>
</nav>
