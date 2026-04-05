<?php
// add_to_cart.php
// Stores items in $_SESSION['cart'] indexed by book_id.

// Start session
session_start();

// Ensure cart exists
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) 
{
    $_SESSION['cart'] = [];
}
// Validate incoming POST
if (isset($_POST['book_id']) && isset($_POST['book_name']) && isset($_POST['price'])) 
{

    // Clean inputs
    $id      = trim($_POST['book_id']);
    $name    = trim($_POST['book_name']);
    $price   = floatval($_POST['price']);
    $supplier = isset($_POST['supplier']) ? trim($_POST['supplier']) : '';

    // If no id or name, abort and go back
    if ($id === '' || $name === '') 
    {
        // fallthrough to redirect below
    } 
    
    else 
    {

        // If item exists, increment quantity
        if (isset($_SESSION['cart'][$id])) 
        {
            // FIX: If the item exists but is missing the 'quantity' key (the cause of the warning), 
            // initialize it to 0 before incrementing. This ensures the key is always set.
            if (!isset($_SESSION['cart'][$id]['quantity'])) 
            {
                 $_SESSION['cart'][$id]['quantity'] = 0;
            }
            
            $_SESSION['cart'][$id]['quantity'] += 1; // Now safely increment
        } 
        
        else 
        {
            // Add new item (This correctly sets 'quantity' to 1 for new additions)
            $_SESSION['cart'][$id] = 
            [
                'book_name' => $name,
                'price'     => $price,
                'quantity'  => 1,
                'supplier'  => $supplier
            ];
        }

        // Successful add — redirect back
        $redirect = '';

        // Prefer explicit supplier page if provided and looks like a filename
        if (!empty($supplier)) 
        {
            // If you passed actual catalog filename in supplier (e.g. "catalogBanbury.php"), use it.
            // If you passed a supplier name ("Banbury"), we will fallback to HTTP_REFERER below.
            if (stripos($supplier, '.php') !== false) 
            {
                $redirect = $supplier;
            }
        }

        // Otherwise try HTTP_REFERER (user came from that catalog page)
        if (empty($redirect) && !empty($_SERVER['HTTP_REFERER'])) 
        {
            $redirect = $_SERVER['HTTP_REFERER'];
        }

        // Final fallback
        if (empty($redirect)) 
        {
            $redirect = 'BookSupplier.php';
        }

        header("Location: " . $redirect);
        exit();
    }
}

// If POST invalid or missing required fields, redirect back safely
$fallback = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'BookSupplier.php';
header("Location: " . $fallback);
exit();