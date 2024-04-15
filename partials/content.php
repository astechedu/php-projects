<?php
include 'api/fetch.php';
$fetchAll = fetchAll();

?>

  <!-- Info Alert -->
  <div class="alert alert-info" role="alert">
    This is an info alert!
  </div>
</div>


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
  					<button id="delete" class="delete
            btn btn-danger" data-id="<?= $customer['id'] ?>">Delete</button>
  					<button id="update" class="btn btn-info" data-id="<?= $customer['id'] ?>">Update</button>
  					<button id="view" class="btn btn-success" data-id="<?= $customer['id'] ?>">View</button>
  				</td>
  			</tr>
  			<?php } ?>
  		</tbody>
  	</table>
  </div>



<script>

  $(function(){

//Delete Request to end point

  $('.delete').on('click', function(){
        deleteUser();
  })

    function deleteUser(){
        const deleteUser = $('#delete')
        console.log(deleteUser.attr('data-id'))
        const deleteUrl = "http://localhost/api/delete.php"
        //const id = $('#delete').attr('data-id')

        //console.log(deleteUser.attr('data-id'))
         //const fetchUrl = "<?= $baseUrl ?>/api/fetch.php"

    		$.ajax({
    		  url: deleteUrl,
    		  type: "POST", // or "POST", "PUT", etc. depending on your needs
          data: {id:id},
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

   



//Update Request to end point

	$('#update').on('click', function(){
        updateUsers();
	})


	function updateUsers(){
        //console.log(deleteUser.attr('data-id'))
        const updateUrl = "<?= $baseUrl ?>/api/update.php"

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

<style>
  .alert{display:none;}
</style>
