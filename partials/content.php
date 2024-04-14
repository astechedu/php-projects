 <?php

//Curl Request To get All Data
 include $_SERVER['DOCUMENT_ROOT'].'/curl/fetchall.php';



?>

<div class="alert alert-secondary" role="alert">
  
</div>


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
      	<button id="update" class="btn btn-primary" data-id="<?= $customer['id'] ?>">Update</button>
      	<button id="view" class="btn btn-success" data-id="<?= $customer['id'] ?>">View</button>
      </td> 
    </tr>
    <?php } ?>

  </tbody>
</table>



<script>

$(function(){

	const deleteUser = $('.delete');

	$url = 'http://localhost/curl/delete.php';

	deleteUser.on('click', function(){
	    $.ajax({
	      url: $url,
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
 '<?php fetchAll() ?>'
</script>

<style>
	.alert{display:none;}
</style>