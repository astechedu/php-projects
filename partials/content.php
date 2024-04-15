 <?php

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
	    echo  $response;
	}

	// Close cURL session
	curl_close($ch);	
}

//Working
//fetchAll();


function updateUser($username='', $email='', $password=''){
	
	// URL of the API endpoint you want to send the PUT request to
	$url = 'http://localhost/api/update.php';

	// Data to be sent in the request body
	$data = array(
	    'username' => 'new',
	    'email' => 'new_update@example.com',
	    'password' => 'new123',
	    'id' => 18
	);
    //Convert to json 
    $string_json = json_encode($data);

	// Initialize cURL session
	$curl = curl_init($url);

	// Set cURL options
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return response as a string instead of outputting it
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT'); // Set the request method to PUT
	//curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data)); // Set the request body
	curl_setopt($curl, CURLOPT_POSTFIELDS, $string_json); // Set the request body	
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
//updateUser();


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


function deleteUser($url=''){
	// URL of the resource you want to delete
	$url = 'http://localhost/api/delete.php';

	$deleteData = array('id' => 19); // Specify the ID of the record to delete
	$deleteDataJson = json_encode($deleteData);

	// Initialize cURL session
	$ch = curl_init($url);

	// Set cURL options for DELETE request
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
	curl_setopt($ch, CURLOPT_POSTFIELDS, $deleteDataJson);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// Execute cURL request
	$response = curl_exec($ch);

	// Check for errors
	if ($response === false) {
	    echo 'cURL Error: ' . curl_error($ch);
	}

	// Close cURL session
	curl_close($ch);

	// Handle response
	echo $response;

}

//Deleting  Working 
deleteUser();

?>


  <div class="container">
    <h1>Hello, world!</h1>
    <p>This is a Bootstrap 5.3 boilerplate.</p>
  </div>
