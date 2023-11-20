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

$requestCustomer = new SoapClient($url . 'customerCustomerRepositoryV1', $params);

// get Customer bv ID
$customerId = 1;
$requestData = ['customerId' => $customerId];
$soapResponseGetById = $requestCustomer->customerCustomerRepositoryV1GetById($requestData);

if ($soapResponseGetById->result) {
    $customerData = $soapResponseGetById->result;
    echo 'Get Customer By ID - Customer Data Email: ';
    print_r($customerData->email);
    } else {
        echo 'Error: ' . $soapResponseGetById->faultstring;
}
// end

//getList customer
$searchCriteria = array(
    'searchCriteria' => array(
        'filterGroups' => array(
            array(
                'filters' => array(
                    array(
                        'field' => 'email',
                        'value' => 'roni_cost@example.com',
                        'condition_type' => 'eq'
                    ),
                    array(
                        'field' => 'firstname',
                        'value' => 'Veronica',
                        'condition_type' => 'like'
                    )
                )
            )
        ),
        'sortOrders' => array(
            array(
                'field' => 'lastname',
                'direction' => 'ASC'
            )
        )
    )
);
$soapResponseGetList = $requestCustomer->customerCustomerRepositoryV1GetList($searchCriteria);
echo   "</br>";
foreach ($soapResponseGetList->result->items as $customer) {
        echo 'Get List Customer- Customer Data Email: ';
    echo $customer -> email . "/<br>";
}
// end

