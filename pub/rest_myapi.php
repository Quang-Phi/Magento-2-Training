<?php

$baseUrl = "https://phidinh.cmmage.app/rest/V1/";

//  Get Customer
$apiUrl = $baseUrl . "unitfive/myapi";
echo "API URL: " . $apiUrl . "\n";

$ch = curl_init($apiUrl);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json'
));

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    echo "Response: ";
    echo $response . "\n";
}

curl_close($ch);
//




