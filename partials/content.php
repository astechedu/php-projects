<?php
include 'api/fetch.php';
$fetchAll = fetchAll();

?>

  <!-- Info Alert -->
  <div class="alert alert-info" role="alert">
    This is an info alert!
  </div>
</div>

<div class="container">
<div class="row col-lg-12"><strong>Update</strong>
  <div class="col-lg-2">
    <input type="text" class=" form-control" id="username" placeholder="Name" required>
  </div>
  <div class="col-lg-2">
    <input type="email" class="form-control" id="email" placeholder="Email" required>
  </div>
  <div class="col-lg-2">
    <input type="password" class="form-control" id="password" placeholder="Password" required>
  </div>
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
  					<button id="<?= $customer['id'] ?>" class="delete
            btn btn-danger" data-id="<?= $customer['id'] ?>">Delete</button>
  					<button id="<?= $customer['id'] ?>" class="update btn btn-info" data-id="<?= $customer['id'] ?>">Update</button>
  					<button id="<?= $customer['id'] ?>" class="view btn btn-success" data-id="<?= $customer['id'] ?>">View</button>
  				</td>
  			</tr>
  			<?php } ?>
  		</tbody>
  	</table>
  </div>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-striped">
        <thead>
          <tr>
            <td>Id</td><td>Name</td><td>Email</td>
          </tr>
        </thead>
        <tbody id="userView">
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>

$(function(){

//1. Delete User: Sending Ajax Request 
    const deleteUserId = $('.delete')
    const deleteUrl = 'http://localhost/api/delete.php'

    deleteUserId.on('click', function(){
          deleteUser(this.id)
    }) 
     
     function deleteUser(id){
         const deleteId = id   
        $.ajax({
          url: deleteUrl,
          type: "POST", 
          data: {       
          id:deleteId,      
          },
          cache:false,
          success: function(response) {
            // Handle successful response
            //console.log("hi");            
            $('.alert').html(response)
            $(".alert").css('display','block')
            //removeAlert();
          }
        })  
      }


//Update Request to end point
  const updateUserId = $('.update')
  const updateUrl = 'http://localhost/api/update.php'

	updateUserId.on('click', function(e){
        updateUsers(this.id);
	})

	function updateUsers(id){
        // Get form data
        const username = $('#username').val()
        const email    = $('#email').val();
        const password = $('#password').val()
        const updateId       = id
        const formData = {id:updateId,username:username,email:email,password:password}
         //var formData = $('#registerForm').serialize();


  		$.ajax({
  		  url: updateUrl,
  		  type: "POST", // or "POST", "PUT", etc. depending on your needs
        data: formData,
        //cache:false,
  		  success: function(response) {
  		    // handle successful response from the server
  		    console.log(response);
              // Handle successful response
              //console.log("hi");            
              $('.alert').html(response)
              $(".alert").css('display','block')
              //removeAlert();        
  		  },
  		  error: function(xhr, status, error) {
  		    // handle errors
  		    console.error(xhr.responseText)
  		  }
  		});
	}


//1. View User: Sending Ajax Request 
    const viewUserId = $('.view');
    const userViewUrl = 'http://localhost/api/view.php';

    viewUserId.on('click', function(){
          userView(this.id)
    }) 
     
     function userView(id){
         const viewId = id
        
        $.ajax({
          url: userViewUrl,
          type: "POST", 
          data: {id: viewId},
          cache:false,
          success: function(response) {
          var txt = ""
          const data = JSON.parse(response)
          $.each(data,function(i,v){
               txt += '<tr><td>' + v.id + '</td>' + 
                           '<td>' + v.username + '</td>' +
                           '<td>' + v.email + '</td>' +
               '</tr>'
          })
             $('#userView').html(txt)

            // Handle successful response
            //console.log("hi");            
            //$('.alert').html(response)
            //$(".alert").css('display','block')
            //removeAlert();          
          }
        })  
      }

  //End of ready function
  })

</script>

<style>
  .alert{display:none;}
</style>
