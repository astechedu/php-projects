<?php

// Include a file relative to the root directory
include_once $_SERVER['DOCUMENT_ROOT'].'/config/app.php';

?>


<?php include_once $baseDir.'/partials/header.php';?>

  <!-- Info Alert -->
  <div class="alert alert-info" role="alert">
    This is an info alert!
  </div>
</div>


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
          </form>
          <button id="createUser" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>    
  </div>
</div>

<?php include_once  $baseDir.'/partials/footer.php';?>



<script>

$(function(){

//Create Request to end point

  $('#createUser').on('click', function(){
        createUsers();
  })

  function createUsers(){
        //console.log(deleteUser.attr('data-id'))
        const createUrl = "http://localhost/api/create.php"
        // Get form data
        const username = $('#username').val();
        const email = $('#email').val();
        const password = $('#password').val();
        //const formData = {username:username,email:email,password:password}
         var formData = $('#registerForm').serialize();
    $.ajax({
      url: createUrl,
      type: "POST", // or "POST", "PUT", etc. depending on your needs
      data: formData,
      success: function(response) {
        // handle successful response from the server
        console.log(response);
        $('.alert').css('display','block');
        $('.alert').html(response);
      },
      error: function(xhr, status, error) {
        // handle errors
        console.error(xhr.responseText);
      }
    });
  }

  //End of ready function
  })


</script>

<style>
  .alert{display:none;}
</style>
