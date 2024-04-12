<?php
session_start();

// Check if a session ID exists
if(isset($_SESSION['user_id'])) {
    //echo "Session ID: " . session_id();
    //session_destroy();
    header('Location: pages/dashboard.php');
} 

//echo password_hash('password3',PASSWORD_DEFAULT);

//$rootDir = $_SERVER['DOCUMENT_ROOT'];
$rootDir = "http://localhost";

include 'database/connection.php';

// Function to validate user credentials
function login($username, $password, $pdo) {
   
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);  
    if ($user && password_verify($password,$user['password'])) {
   
        // Password is correct, user exists
        return  $user['id'];
    } else {
          //echo "Invalid username or password.";
        // Username or password is incorrect
        return false;   
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from form 
         $username = $_POST['username'];
         $password = $_POST['password'];

    // Validate user credentials
        $userId = login($username, $password, $conn);

    if ($userId) {
        // Start session and set session variables
        //session_start();
        $_SESSION['user_id'] = $userId;
        
        // Redirect to dashboard or any other page after successful login
        
        header('Location: pages/dashboard.php');
        exit();
    } else {
        // Display error message if login fails        
         $loginError = "Invalid username or password.";
    }
}





//Original Script
/*
// Function to validate user credentials
function login($username, $password, $pdo) {
   
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC); 
    if ($user && password_verify($password, $user['password'])) {
    
        // Password is correct, user exists
        //return $user['id'];
    } else {
          echo "Invalid username or password.";
        // Username or password is incorrect
        //return false;   
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from form
         $username = $_POST['username'];
         $password = $_POST['password'];

    // Validate user credentials
        $userId = login($username, $password, $conn);

    if ($userId) {
        // Start session and set session variables
        session_start();
        $_SESSION['user_id'] = $userId;
        
        // Redirect to dashboard or any other page after successful login
        
        header('Location:'.$rootDir.'/testing.php');
        exit();
    } else {
        // Display error message if login fails        
         $loginError = "Invalid username or password.";
    }
}

*/

?>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                   User Login
                </div>
                <div class="card-body">
                    <form action="/" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" >
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" >
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>