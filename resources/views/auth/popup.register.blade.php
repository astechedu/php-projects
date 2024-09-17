	<div class="" id="">
		<?php
			if(isset($_POST['create'])){
				$firstname  = $_POST['firstname'];
				$lastname   = $_POST['lastname'];
				$phoneno    = $_POST['phoneno'];
				$email      = $_POST['email'];
				$password   = $_POST['password'];

				echo $firstname ." ".$lastname ." ".$phoneno ." ".$email ." ".$password; 
			}
		?>
	</div>
<div class="form-popup-register" id="myRegisterForm"> 
		<h2>Registration Form</h2>
<form action="bootstrapform.php" method="post">
		 @csrf  
  <div class="form-group">
    <label for="firstname">First Name</label>
    <input type="text" class="form-control" id="exampleInputfirstname" name="firstname">
  </div>
  <div class="form-group">
    <label for="lastname">Last Name</label>
    <input type="text" class="form-control" id="exampleInputlastname" name="lastname">
  </div>
  <div class="form-group">
    <label for="phoneno">Phone Number</label>
    <input type="text" class="form-control" id="exampleInputphoneno" name="phoneno">
  </div>
  <div class="form-group">
    <label for="Email1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword" name="password">
  </div>
  <button type="submit" class="btn btn-primary" name="create">Sign up</button>
</form>
</div>

<style type="text/css">
		.main-bg{
			margin-top: 2%;
			width: 400px;
			border: ridge 1.5px white;
			padding: 10px;
}

body{
background: #E0EAFC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #CFDEF3, #E0EAFC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}
/* The popup form - hidden by default */
.form-popup-register {
    display: none;
    position: fixed;
    bottom: 0;
    right: 60px;
    border: 3px solid #f1f1f1;
    z-index: 9;
}

</style>
<script>  

    function openForm() {
        document.getElementById("myRegisterForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myRegisterForm").style.display = "none";
    } 

//Register Form 

$(function(){
    $('#registerForm').on('click', function(){
		alert('h')
        $('.form-popup-register').css('display','block');
    });
});

</script>