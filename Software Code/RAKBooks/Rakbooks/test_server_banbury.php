<?php
ini_set('soap.wsdl_cache_enabled', 0);
$wsdl = "http://localhost/RAKBooks/Banbury/service.wsdl";

try 
{
    $client = new SoapClient($wsdl, 
    [
        'trace' => 1,
        'exceptions' => true,
        'cache_wsdl' => WSDL_CACHE_NONE,
        'soap_version' => SOAP_1_1
    ]);
    
    echo "<h3>Available Functions:</h3>";
    echo "<pre>";
    print_r($client->__getFunctions());
    echo "</pre>";
    
    echo "<h3>Calling getBooks...</h3>";
    $response = $client->getBooks(['supplierID' => 'Banbury']);
    
    echo "<h3>Raw Response:</h3>";
    echo "<pre>";
    var_dump($response);
    echo "</pre>";
    
    echo "<h3>Last Response XML:</h3>";
    echo "<pre>" . htmlspecialchars($client->__getLastResponse()) . "</pre>";
    
} 

catch (Exception $e) 
{
    echo "<h3>Error:</h3>";
    echo "<pre>" . $e->getMessage() . "</pre>";
    
    if (isset($client)) 
    {
        echo "<h3>Last Request:</h3>";
        echo "<pre>" . htmlspecialchars($client->__getLastRequest()) . "</pre>";
        echo "<h3>Last Response:</h3>";
        echo "<pre>" . htmlspecialchars($client->__getLastResponse()) . "</pre>";
    }
}
?>