<?php

//Curl: Fetch api 
function fetchAll(){
	// Initialize cURL session
	$ch = curl_init();

	// Set the URL to fetch
	curl_setopt($ch, CURLOPT_URL, 'http://localhost/api/fetch.php');

	// Set options if needed, e.g., user agent, headers, etc.
	// curl_setopt($ch, CURLOPT_USERAGENT, 'Your User Agent');

	// Set to return the transfer as a string
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// Execute the request
	$response = curl_exec($ch);

	// Check for errors
	if($response === false) {
	    echo 'cURL error: ' . curl_error($ch);
	} else {
	    // Output the fetched data
	    return $response;
	}

	// Close cURL session
	curl_close($ch);	
}

//Working
//fetchAll();
$customers = fetchAll();
$customers = json_decode($customers, true);
//echo "<pre>";print_r($customers);
?>