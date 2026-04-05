<?php
// Banbury supplier SOAP server (server.php)
// Place alongside service.wsdl in the Banbury folder.

// =========================================
// PREVENT ANY OUTPUT BEFORE SOAP RESPONSE
// =========================================
ob_start();
error_reporting(0); // Suppress errors in output (log them instead)

// XAMPP local DB config
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'banbury_db');
define('DB_TABLE', 'books');

// Ensure WSDL path resolved reliably
$wsdl_path = __DIR__ . '/service.wsdl';

// Disable WSDL caching for dev
ini_set('soap.wsdl_cache_enabled', '0');


// =========================================
// REMOVE BOOK FUNCTION
// =========================================
function removeBook($params) 
{
    $isbn = ''; // Default empty
    if (is_array($params) && isset($params['isbn']))  // Extract ISBN from array
        $isbn = trim($params['isbn']);
    elseif (is_object($params) && isset($params->isbn))  // Extract ISBN from object
        $isbn = trim($params->isbn);
    elseif (is_string($params))                     // Direct string input
        $isbn = trim($params);

    if ($isbn === '') // Check if ISBN is empty
        return ['success' => false, 'message' => 'Error: ISBN number cannot be empty.'];

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); // Connect to DB
    if ($mysqli->connect_errno) 
        return ['success' => false, 'message' => 'Database Connection Error: ' . $mysqli->connect_error];

    $sql = "DELETE FROM `" . DB_TABLE . "` WHERE `isbn` = ?"; // Prepare SQL
    if ($stmt = $mysqli->prepare($sql)) 
    {
        $stmt->bind_param('s', $isbn);
        $stmt->execute();
        $affected = $stmt->affected_rows;
        $stmt->close();
        $mysqli->close();   

        if ($affected > 0) 
            return ['success' => true, 'message' => "SUCCESS: Book with ISBN $isbn removed from Banbury."];
        else 
            return ['success' => false, 'message' => "FAILURE: Book with ISBN $isbn not found in Banbury database."];
    } 
    else 
    {
        $err = $mysqli->error;
        $mysqli->close();
        return ['success' => false, 'message' => 'SQL Preparation Error: ' . $err];
    }
}


// =========================================
// GET BOOKS FUNCTION
// =========================================
function getBooks($params)
{
    // Extract supplierID
    $supplierID = '';
    if (is_array($params) && isset($params['supplierID']))
        $supplierID = trim($params['supplierID']);
    elseif (is_object($params) && isset($params->supplierID))
        $supplierID = trim($params->supplierID);
    elseif (is_string($params))
        $supplierID = trim($params);

    // Connect to DB
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($mysqli->connect_errno)
    {
        // Return empty on DB error
        return ['books' => []];
    }

    $sql = "SELECT isbn, book_name, author, price FROM `" . DB_TABLE . "`";
    $result = $mysqli->query($sql);

    $books = [];
    if ($result)
    {
        while ($row = $result->fetch_assoc())
        {
            // Create stdClass object for SOAP compatibility
            $book = new stdClass();
            $book->isbn   = $row['isbn'];
            $book->title  = $row['book_name'];
            $book->author = $row['author'];
            $book->price  = (float)$row['price'];
            $books[] = $book;
        }
        $result->free();
    }

    $mysqli->close();
    
    // Return as stdClass for proper SOAP serialization
    $response = new stdClass();
    $response->books = $books;
    return $response;
}

// =================================================================
// NEW: PLACE ORDER FUNCTION (Added for Checkout Requirements)
// =================================================================
function placeOrder($params)
{
    // Step 1: Open connection to the Supplier Database (Banbury)
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Step 2: Check if the connection failed
    if ($mysqli->connect_errno) {
        return ['success' => false, 'order_id' => 0];
    }

    // Step 3: Extract values from the SOAP request object
    // Note: $params->customer_id now carries the email string from checkout_process.php
    $uname   = $params->username;       
    $uaddr   = $params->user_address;   
    $pmode   = $params->mode_of_payment;
    $bid     = $params->book_id;        
    $email   = $params->customer_id;    

    // Step 4: Prepare the SQL query
    // Updated: replaced 'customer_id' column with 'email' to match your XAMPP change
    $sql = "INSERT INTO `order` (name, address, payment_method, book_id, email) VALUES (?, ?, ?, ?, ?)";
    
    // Step 5: Execute the statement
    if ($stmt = $mysqli->prepare($sql)) {
        // 'sssss' means we are binding 5 strings
        $stmt->bind_param('sssss', $uname, $uaddr, $pmode, $bid, $email);
        $stmt->execute();
        
        // Get the auto-increment ID for the order
        $new_id = $stmt->insert_id;
        
        $stmt->close();
        $mysqli->close();

        // Step 6: Return result to the "Brain"
        return ['success' => true, 'order_id' => $new_id];
    } else {
        $mysqli->close();
        return ['success' => false, 'order_id' => 0];
    }
}

// =========================================
// CREATE SOAP SERVER
// =========================================
try 
{
    if (!file_exists($wsdl_path)) 
        throw new Exception('WSDL file not found at: ' . $wsdl_path);

    // Clear any buffered output before SOAP
    ob_end_clean();
    
    // Set proper content type header for SOAP
    header("Content-Type: text/xml; charset=utf-8");

    $options = [
        'uri' => 'urn:BanburyBookService',
        'soap_version' => SOAP_1_1
    ];

    $server = new SoapServer($wsdl_path, $options);

    // Add functions (ADDED placeOrder TO THE LIST)
    $server->addFunction('removeBook');
    $server->addFunction('getBooks');
    $server->addFunction('placeOrder'); // Registrating the new function

    $server->handle();
} 
catch (SoapFault $sf) 
{
    // ... (Existing error handling remains same)
} 
catch (Exception $e) 
{
    // ... (Existing error handling remains same)
}
?>