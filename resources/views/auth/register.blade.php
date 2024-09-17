@extends('layouts.default')

@section('title')
Cart
@endsection

@section('content')
	<div>
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

	<div class="main-bg">
		<h2>Registration Form</h2>
	<form action="{{ route('user.store') }}" method="post" id="createUser">
		 @csrf  
		<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="text" class="form-control" id="password" name="password">
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
</style>
<script>
$(function(){
	$('#createUser').on('click', function(e){
		e.preventDefault();

		$.ajax({
			url: 'http://localhost/store',
			type: 'POST',
			data: $('#createUser').serialize(),
            dataType: 'json'
		});
	});
});	
</script>
@endsection