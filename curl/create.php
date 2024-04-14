<?php

function createUser($username='', $email='', $password=''){

	// URL of the API endpoint where data insertion is handled
	$url = 'http://localhost/api/create.php';

	// Data to be sent in the request body
	$data = array(
	    'username' => 'new1',
	    'email' => 'new1@example.com',
	    'password' => 'new123'
	);


	// Initialize cURL session
	$curl = curl_init($url);

	// Set cURL options
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return response as a string instead of outputting it
	curl_setopt($curl, CURLOPT_POST, true); // Set the request method to POST
	curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data)); // Set the request body
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
	    'Content-Type: application/x-www-form-urlencoded', // Set the content type of the request body
	    // Add any additional headers here if needed
	));

	// Execute cURL request and get the response
	$response = curl_exec($curl);

	// Check for errors
	if ($response === false) {
	    $error = curl_error($curl);
	    echo "cURL Error: $error";
	} else {
	    // Handle successful response
	    echo "Response: $response";
	}

	// Close cURL session
	curl_close($curl);

}

//Working
//createUser();
?>