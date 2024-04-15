<?php



print_r($pdo);


exit();
$deleteData = array('id' => 1); // Specify the ID of the record to delete
$deleteDataJson = json_encode($deleteData);

$ch = curl_init('htt://config/connection.php');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_POSTFIELDS, $deleteDataJson);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($deleteDataJson)
));

$response = curl_exec($ch);
$httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

echo "HTTP Status: $httpStatus\n";
echo "Response: $response\n";





?>
