<?php
include 'api/fetch.php';
$fetchAll = fetchAll();
?>


  <div class="col-lg-8">
  	<table class="table table-dark">
  		<thead>
  			<tr>
  				<th>ID</th><th>Name</th><th>Email</th><th>Action</th>
  			</tr>
  		</thead>
  		<tbody>
  			<?php foreach($fetchAll as $customer){ ?> 
  			<tr>
  				<td><?= $customer['id'] ?></td>
  				<td><?= $customer['username'] ?></td> 
  				<td><?= $customer['email'] ?></td>
  				<td>
  					<button id="delete" class="btn btn-danger" data-id="<?= $customer['id'] ?>">Delete</button>
  					<button id="update" class="btn btn-info" data-id="<?= $customer['id'] ?>">Update</button>
  					<button id="view" class="btn btn-success" data-id="<?= $customer['id'] ?>">View</button>
  				</td>
  			</tr>
  			<?php } ?>
  		</tbody>
  	</table>
  </div>



<script>

  const deleteUser = $('#delete')
  //console.log(deleteUser.attr('data-id'))
  const deleteUrl = "http://localhost/api/fetch.php"

  $(function(){



    function fetchAll(){
        //console.log(deleteUser.attr('data-id'))
         const fetchUrl = "http://localhost/api/fetch.php"

		$.ajax({
		  url: fetchUrl,
		  method: "POST", // or "POST", "PUT", etc. depending on your needs

		  success: function(response) {
		    // handle successful response from the server
		    console.log(response);
		  },
		  error: function(xhr, status, error) {
		    // handle errors
		    console.error(xhr.responseText);
		  }
		});

    }

//fetchAll()



//Update Request to end point

	$('#update').on('click', function(){
        updateUsers();
	})


	function updateUsers(){
        //console.log(deleteUser.attr('data-id'))
        const updateUrl = "http://localhost/api/update.php"

		$.ajax({
		  url: updateUrl,
		  method: "POST", // or "POST", "PUT", etc. depending on your needs

		  success: function(response) {
		    // handle successful response from the server
		    console.log(response);
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