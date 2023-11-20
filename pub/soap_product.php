<?php
$request = new SoapClient(
    "https://phidinh.cmmage.app/index.php/soap/?wsdl&services=integrationAdminTokenServiceV1",
    array("soap_version" => SOAP_1_2)
);
$token = $request->integrationAdminTokenServiceV1CreateAdminAccessToken(array("username" => "john.smith", "password" => "abcd123123"));

$url = 'https://phidinh.cmmage.app/index.php/soap/?wsdl&services=';
$params = array(
    "soap_version" => SOAP_1_2,
    'stream_context' => stream_context_create(array(
        'http' => array('header' => "Authorization: Bearer " . $token->result)
    ))
);

// get list product
$requestProduct = new SoapClient($url . 'catalogProductRepositoryV1', $params);
$searchCriteria = [
    'searchCriteria' => [
        'filterGroups' => [
            [
                'filters' => [
                    [
                        'field' => 'status',
                        'value' => '1',
                        'condition_type' => 'eq'
                    ]
                ]
            ]
        ],
        'pageSize' => 3
    ],
];

$soapResponseGetListProduct = $requestProduct->catalogProductRepositoryV1GetList($searchCriteria);

if ($soapResponseGetListProduct->result) {
    foreach ($soapResponseGetListProduct->result->items->item as $product) {
        echo 'Product ID: ' . $product->id . "\n>";
        echo 'Product Name: ' . $product->name . "\n\n>";
    }
} else {
    echo 'Error: ' . $response->message;
}
// end

//get
$params = [
    'sku' => 'LaptopMacBookPro16inchM2Pro2023',
    'storeView' => 'default',
    'attributes' => ['color', 'RAM', 'discrete_graphics_card'], 
];
$soapResponseGet = $requestProduct->catalogProductRepositoryV1Get($params);
if ($soapResponseGet->result) {
    $prpductData = $soapResponseGet->result;
    echo "Get Product with List attr - Product Data: \n";
    echo $prpductData->name . "\n";
    } else {
        echo 'Error: ' . $soapResponseGetById->faultstring;
}

