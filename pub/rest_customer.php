<?php

//get Token
$baseUrl = "https://phidinh.cmmage.app/rest/V1/";
$tokenUrl = $baseUrl . "integration/admin/token";

$username = "john.smith";
$password = "abcd123123";

$ch = curl_init($tokenUrl);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['username' => $username, 'password' => $password ]));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen(json_encode(['username' => $username, 'password' => $password ]))
));

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}

curl_close($ch);

$accessToken = json_decode($response);
//



//  Get Customer
$customerId = 1;
$apiUrl = $baseUrl . "customers/" . $customerId;

$ch = curl_init($apiUrl);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $accessToken
));

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}

curl_close($ch);

echo "Get Customer By ID - Customer Data: \n";
echo $response . "\n\n";

//


// Get Customer Shipping Address
// /V1/customers/:customerId/shippingAddress
$cusId = 1;
$websiteId = null;
$isEmailAvailableUrl = $baseUrl . "customers/" . $cusId . "/shippingAddress";
$ch = curl_init($isEmailAvailableUrl);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['websiteId' => $websiteId]));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $accessToken
));

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}
echo "Get Customer Shipping Address: \n";
echo $response;



