<?php
//session_start();

// Check if a session ID exists
if (isset($_SESSION["user_id"])) {
    //echo "Session ID: " . session_id();
    //session_destroy();
    header("Location: pages/dashboard.php");
}

include "database/connection.php";

// Function to validate user credentials
function register($username, $password, $email, $pdo)
{
    $stmt = $pdo->prepare(
        "INSERT INTO users(username,email,password) values(?,?,?)"
    );
    $user = $stmt->execute([$username, $email, $password]);

    if ($user === 1) {
        //$_SESSION['user'] = $user['username'];

        // Password is correct, user exists
        return $user;
    } else {
        //echo "Invalid username or password.";
        // Username or password is incorrect
        return false;
    }
}

// Check if form is submitted
if (
    isset($_POST["register"]) &&
    $_POST["register"] == "Register" &&
    $_SERVER["REQUEST_METHOD"] == "POST"
) {
    // Get username and password from form
    $username = $_POST["username"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Validate user credentials
    $userId = register($username, $password, $email, $conn);

    if ($userId) {
        // Start session and set session variables
        //session_start();
        //echo  $_SESSION['user_id'] = $userId;

        // Redirect to dashboard or any other page after successful login

        //header('Location: pages/dashboard.php');
        exit();
    } else {
        // Display error message if login fails
        $loginError = "Invalid username or password.";
    }
}

?>

<div class="col-md-6">
   <div class="card">
      <div class="card-header">
         <strong>User Register</strong>
      </div>
      <div class="card-body">
         <form action="/" method="POST">
            <div class="mb-3">
               <label for="username" class="form-label">Username</label>
               <input type="text" class="form-control" id="username" name="username" >
            </div>
            <div class="mb-3">
               <label for="email" class="form-label">Email</label>
               <input type="text" class="form-control" id="email" name="email" >
            </div>
            <div class="mb-3">
               <label for="password" class="form-label">Password</label>
               <input type="password" class="form-control" id="password" name="password" >
            </div>
            <div class="mb-3">
               <input type="submit" name="register" value="Register" class="btn btn-primary">
            </div>
         </form>
      </div>
   </div>
</div>

    
