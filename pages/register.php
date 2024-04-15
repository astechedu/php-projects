<?php

// Include a file relative to the root directory
include_once $_SERVER['DOCUMENT_ROOT'].'/config/app.php';


?>


<?php include $_SERVER['DOCUMENT_ROOT'].'/partials/header.php';?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <strong>Register</strong>
        </div>
        <div class="card-body">
          <form id="registerForm">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>    
  </div>
</div>

<?php include_once  $_SERVER['DOCUMENT_ROOT'].'/partials/footer.php';?>

