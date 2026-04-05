<?php

$success = false;
$message = '';

$wsdl_configs = 
[
'Banbury' => 'http://localhost/RAKBooks/Banbury/service.wsdl', // WSDL URL for Banbury supplier
'Cerebro' => 'http://localhost/RAKBooks/Cerebro/service.wsdl',  // WSDL URL for Cerebro supplier
'Plutonium' => 'http://localhost/RAKBooks/Plutonium/service.wsdl' // WSDL URL for Plutonium supplier
];


if ($_SERVER['REQUEST_METHOD'] !== 'POST') // Ensure the script is accessed via POST
    {
        header('Location: RemoveBook.php');
        exit();
    }


$supplier = filter_input(INPUT_POST, 'supplier', FILTER_SANITIZE_STRING); // Sanitize supplier input
$isbn = filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_STRING); // Sanitize ISBN input


if (empty($supplier) || empty($isbn))  // Validate required fields
    {
        $message = 'Error: Required fields (Supplier and ISBN) are missing.'; // Basic validation
    } 

else 
    {
        $wsdl_url = $wsdl_configs[$supplier] ?? null; // Get the WSDL URL based on selected supplier
        if ($wsdl_url === null)  // Invalid supplier check
        { 
            $message = 'Error: Invalid supplier selected.';
        } 
        else 
        {
            ini_set('soap.wsdl_cache_enabled', '0'); // Disable WSDL caching for development
            try 
            {
                $options =  // SOAP client options
                [
                'cache_wsdl' => WSDL_CACHE_NONE, // Disable WSDL caching
                'trace' => 1,
                'exceptions' => true, // Enable exceptions for error handling
                'login' => 'rakbooks_admin', // Basic Auth username
                'connection_timeout' => 5,
                'soap_version' => SOAP_1_2
                ];


                $client = new SoapClient($wsdl_url, $options);  // Initialize SOAP client with WSDL and options


                // For document/literal WSDL the input can be an associative array
                $params = ['isbn' => $isbn];
                $result = $client->removeBook($params);


                // $result should be an object with ->success and ->message
                if (is_object($result)) 
                    {
                        $success = (bool)($result->success ?? false);
                        $message = (string)($result->message ?? 'No message returned');
                    } 
                
                elseif (is_array($result)) // Handle array response
                    {
                        // Some servers return arrays; handle defensively
                        $success = (bool)($result['success'] ?? false);
                        $message = (string)($result['message'] ?? 'No message returned');
                    } 
                
                else 
                    {
                        $success = false;
                        $message = 'Unexpected response type from SOAP server.';
                    }


            } 
            
            catch (SoapFault $e) // Handle SOAP errors
            {
                $success = false;
                $message = 'SOAP Communication Error for ' . $supplier . ': ' . $e->getMessage();
            } 
            
            catch (Exception $e) 
            {
                $success = false;
                $message = 'An unexpected error occurred: ' . $e->getMessage();
            }
        }
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $success ? 'Success' : 'Error'; ?> | Remove Book Status</title>

    <style>
        /* Replicate the global styles */
        body 
        {
            background-color: #2c3e50; 
            color: #ecf0f1; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
        }

        /* Replicate the container style */
        .container 
        {
            background-color: #34495e; 
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 500px;
        }

        h1 
        {
            /* Red for removal actions */
            color: <?php echo $success ? '#e74c3c' : '#e74c3c'; ?>; 
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid <?php echo $success ? '#e74c3c' : '#e74c3c'; ?>;
            padding-bottom: 10px;
        }

        p 
        {
            font-size: 1.1em;
            line-height: 1.6;
            margin-bottom: 25px;
            color: #bdc3c7;
        }
        
        .action-links a 
        {
            /* Button-like link styling */
            display: inline-block;
            background-color: #3498db; 
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            margin: 10px 10px 0;
            transition: background-color 0.3s;
        }

        .action-links a:hover 
        {
            background-color: #2980b9; 
        }

        /* Specific style for the primary removal link */
        .action-links a:first-child 
        {
            background-color: #c0392b; /* Darker red color for 'Remove Another' */
        }

        .action-links a:first-child:hover 
        {
            background-color: #a93226;
        }

    </style>

</head>

<body>

    <div class="container"> <!-- Replicated container -->
        
        <h1><?php echo $success ? '✅ Removal Completed' : '❌ Removal Failed'; ?></h1>
        
        <p><?php echo nl2br($message); ?></p>
        
        <div class="action-links">

            <a href="RemoveBook.php">Remove Another Book</a>
            <a href="AdminHomePage.php">Go to Dashboard</a> 
            
        </div>

    </div>

</body>

</html>