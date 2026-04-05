<?php
session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 1. SECURITY CHECK
if (empty($_SESSION['user_email']) || empty($_SESSION['cart'])) 
{
    header("Location: cart.php");
    exit();
}

// 2. MASTER DATABASE CONFIG (RakBooks)
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'rakbooks_db'; 

// 3. CAPTURE FORM DATA
$cust_name    = $_POST['customer_name'];
$city         = $_POST['city'];
$full_address = $_POST['address'] . ", " . $city; 
$pay_mode     = $_POST['payment_mode'];
$user_email   = $_SESSION['user_email']; 
$order_status = "Order Received"; 

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) 
{ 
    die("❌ MOTHER DATABASE CONNECTION ERROR: " . $conn->connect_error); 
}

// 4. THE ROUTING LOOP
foreach ($_SESSION['cart'] as $item) 
{
    
    $book_id   = $item['book_id'];
    $supplier  = $item['supplier']; 

    // --- A. ALWAYS INSERT INTO RAKBOOK MASTER DB FIRST ---
    $sql = "INSERT INTO `order` (book_id, email, name, address, payment_method, order_status) VALUES (?, ?, ?, ?, ?, ?)";    $stmt = $conn->prepare($sql);
    
    if (!$stmt) 
    {
        die("❌ MOTHER DB SQL ERROR: " . $conn->error);
    }

    $stmt->bind_param("ssssss", $book_id, $user_email, $cust_name, $full_address, $pay_mode, $order_status);
    
    if (!$stmt->execute()) 
    {
        die("❌ MOTHER DB EXECUTION ERROR: " . $stmt->error);
    }
    $stmt->close();

    // --- B. ROUTE TO THE SPECIFIC SUPPLIER VIA SOAP ---
    $target_wsdl = "";

    // Set the WSDL path based on the supplier tag
    if ($supplier == 'Banbury') 
    {
        $target_wsdl = "http://localhost/RAKBooks/Banbury/service.wsdl";
    } 

    elseif ($supplier == 'Cerebro') 
    {
        $target_wsdl = "http://localhost/RAKBooks/Cerebro/service.wsdl";
    } 

    elseif ($supplier == 'Plutonium') 
    {
        $target_wsdl = "http://localhost/RAKBooks/Plutonium/service.wsdl";
    }

    // Only attempt SOAP call if a WSDL was found
    if ($target_wsdl != "") 
    {
        try 
        {
            $client = new SoapClient($target_wsdl, ['cache_wsdl' => WSDL_CACHE_NONE, 'exceptions' => true]);
            
            $params = new stdClass();
            $params->username        = $cust_name;
            $params->user_address    = $full_address;
            $params->mode_of_payment = $pay_mode;
            $params->book_id         = $book_id;
            $params->customer_id     = $user_email;

            $client->placeOrder($params);
        } 
        
        catch (Exception $e) 
        {
            // Detailed error reporting for the specific supplier
            die("❌ SOAP ERROR ($supplier): " . $e->getMessage() . "<br>Check the $supplier server and WSDL.");
        }
    }
}

$conn->close();
$_SESSION['cart'] = []; // Clear cart on success

// 5. SUCCESS HANDLING
echo "<script>
    alert('Order has been placed successfully!');
    window.location.href = 'UserHomepage.php';
</script>";
exit();
?>