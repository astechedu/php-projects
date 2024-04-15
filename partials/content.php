 <?php

//Curl Request To get All Data
 include $_SERVER['DOCUMENT_ROOT'].'/curl/fetchall.php';

?>

<!-- Alert Message -->
<div class="alert alert-secondary" role="alert">
</div>

<!-- Register Form -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/pages/register.php'; ?>  

<div class="col-lg-10">
<table class="table">
  <thead class="table-dark">
    <tr>
      <th scope="col" class="table-secondary">No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Created</th>
      <th scope="col" class="table-warning">Action</th>
    </tr>

  </thead>
  <tbody class="table-info">
  	<?php foreach($customers as $customer) { ?> 
    <tr >
      <td><?= $customer['id'] ?></td>
      <td><?= $customer['username'] ?></td>
      <td><?= $customer['email'] ?></td>    
      <td><?= $customer['created_at'] ?></td> 
      <td>
      	<button id="<?= $customer['id'] ?>" class="delete btn btn-danger" data-id="<?= $customer['id'] ?>">Delete</button>
      	<button id="<?= $customer['id'] ?>" class="update btn btn-primary" data-id="<?= $customer['id'] ?>">Update</button>
      	<button id="view" class="btn btn-success" data-id="<?= $customer['id'] ?>">View</button>
      </td> 
    </tr>
    <?php } ?>

  </tbody>
</table>
</div>



<script>

$(function(){

//1. Delete User: Sending Ajax Request to Curl with Id
	const deleteUser = $('.delete');

	$deleteUrl = 'http://localhost/curl/delete.php';

	deleteUser.on('click', function(e){
    e.preventDefault()

	    $.ajax({
	      url: $deleteUrl,
	      type: "POST", 
	      data: {       
	       id: this.id,      
	      },
	      success: function(response) {
	        // Handle successful response
	        //console.log("hi");	        
	        $('.alert').html(response);
	        $(".alert").css('display','block');
	        removeAlert();
	      }
	    });    
	});


//2. Create User: Sending Request to Curl/create.php
  const createUser = $('#addUser')
  const uname = $('#username').val()
  const uemail = $('#email').val()
  const upass = $('#password').val()

  $createUrl = 'http://localhost/curl/create.php';

  $(document).on('click','#addUser', function(e){
     e.preventDefault()

      $.ajax({
        url: $createUrl,
        type: "POST", 
        data: { username: uname, email:uemail, password: upass},
        cache: false,
        success: function(response) {
          // Handle successful response
          //console.log("hi");          
          $('.alert').html(response);
          $(".alert").css('display','block');
          removeAlert();          
        }
      });    
  });


//3. Update User: Sending Ajax Request to curl/update.php
  //const updateUser = $('#update');
  //const updateUser = $('#updateUser')
  const updateUser = $('#username').val()
  const updateEmail = $('#email').val()
  const updatePass = $('#password').val()
  const updateId = $('.update').attr('id')

  $updateUrl = 'http://localhost/curl/update.php';

  $(document).on('click','.update', function(e){
     e.preventDefault()

      $.ajax({
        url: $updateUrl,
        type: "POST", 
        data: { id:this.id, username:updateUser, email:updateEmail, password:updatePass},
        cache: false,
        success: function(response) {
          // Handle successful response
          //console.log("hi");          
          $('.alert').html(response);
          $(".alert").css('display','block');
          removeAlert();          
        }
      });    
  });


  
  // Function to remove alert after a specified time
  function removeAlert() {
    // Select the alert element
    var $alert = $(".alert");

    // Set timeout to remove the alert after 2 seconds
    setTimeout(function() {
      //$alert.alert('close'); // Close the alert
      $alert.css('display','none');
    }, 2000); // 2000 milliseconds = 2 seconds

  }

  // Call the removeAlert function when the document is ready
  //$(document).ready(function() {
    //removeAlert();
  //});




//Ready Function End
});








</script>

<style>
	.alert{display:none;}
</style>