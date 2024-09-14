@extends('layouts.default')

@section('title')
Cart
@endsection

@section('content')

<!-- Login Form -->
<!--
  <div class="main-bg">

  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="card shadow">
          <div class="card-title text-center border-bottom">
            <h2 class="p-3">Login</h2>
          </div>
          <div class="card-body">
            <form action="{{ route('login') }}" method="post" id="loginForm">
               @csrf  
              <div class="mb-4">
                <label for="username" class="form-label">Username/Email</label>
                <input type="text" class="form-control" name="username" id="username" />
              </div>
              <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" />
              </div>              
              <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" />
              </div>
              <div class="mb-4">
                <input type="checkbox" class="form-check-input" id="remember" />
                <label for="remember" class="form-label">Remember Me</label>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn text-light main-bg">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
-->

<!--
<style>
:root{
  --main-bg:#e91e63;
}

.main-bg {
  background: var(--main-bg) !important;
}

input:focus, button:focus {
  border: 1px solid var(--main-bg) !important;
  box-shadow: none !important;
}

.form-check-input:checked {
  background-color: var(--main-bg) !important;
  border-color: var(--main-bg) !important;
}

.card, .btn, input{
  border-radius:0 !important;
}

</style>
-->
<!--
<script>
 
document
  .getElementById("loginForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    // You can add more advanced validation and authentication logic here
    alert(`Username: ${username}\nPassword: ${password}`);
  });

</script>
-->

 <!-- A button to open the popup form -->
<!-- 
 <button class="open-button" onclick="openForm()">Open Form</button>
-->

<!-- The form -->

<div class="form-popup" id="login">
  <form action="{{ route('login') }}" class="form-container">
    @csrf
    <h2>Login</h2>
              <div class="mb-4">
                <label for="username" class="form-label">Username/Email</label>
                <input type="text" class="form-control" name="username" id="username" />
              </div>
              <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" />
              </div>              
              <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" />
              </div>
              <div class="mb-4">
                <input type="checkbox" class="form-check-input" id="remember" />
                <label for="remember" class="form-label">Remember Me</label>
              </div>

    <button type="submit" class="btn">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<style>
    {box-sizing: border-box;}

    /* The popup form - hidden by default */
    .form-popup {
    width: 22%;  
    display: none;
    position: absolute;
    top: 45px;
    right: 3px;
    border: 3px solid #f1f1f1;
    z-index: 9;
    padding-right: calc(var(--bs-gutter-x) * .0);
    padding-left: calc(var(--bs-gutter-x) * .0);    
    }

    /* Add styles to the form container */
    .form-container {
    max-width: 300px;
    padding: 10px;
    background-color: white;
    }

    /* Full-width input fields */
    .form-container input[type=text], .form-container input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
    }

    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus, .form-container input[type=password]:focus {
    background-color: #ddd;
    outline: none;
    }

    /* Set a style for the submit/login button */
    .form-container .btn {
    background-color: #04AA6D;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    margin-bottom:10px;
    opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
    background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover, .open-button:hover {
    opacity: 1;
    }     
</style>

<script>
    function openForm() {
    document.getElementById("login").style.display = "block";
    }

    function closeForm() {
    document.getElementById("login").style.display = "none";
    } 


$(function(){
  $('#loginForm').on('click', function(){
    $('#login').css('display','block');
  });
});


</script>

@endsection

