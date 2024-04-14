<?php

//Get from ajax request
$id = $_POST['id']?? '';

function deleteUser($id=''){
	// URL of the resource you want to delete
	$url = 'http://localhost/api/delete.php';

	$deleteData = array('id' => $id); // Specify the ID of the record to delete
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
deleteUser($id);
?>