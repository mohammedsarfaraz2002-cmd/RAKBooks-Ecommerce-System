<?php
/* Starts a new session or resumes the existing one to track cart data */
session_start();

// this is to clear the cart for testing purposes
//$_SESSION['cart'] = [];


/* Checks if the 'cart' session variable exists */
if (!isset($_SESSION['cart'])) 
{
    /* If no cart exists, initialize an empty array for the cart session */
    $_SESSION['cart'] = [];
}

/* Logic to handle the removal of a specific book from the cart */
if (isset($_POST['remove_id'])) 
{
    /* Retrieves the ID of the book the user wants to remove */
    $remove_id = $_POST['remove_id'];

    /* Checks if that specific ID exists within the cart array */
    if (isset($_SESSION['cart'][$remove_id])) 
    {
        /* Removes the specific item from the session array */
        unset($_SESSION['cart'][$remove_id]);
    }
}

/* Logic to handle updating the quantity of a book already in the cart */
if (isset($_POST['update_id']) && isset($_POST['new_quantity'])) 
{
    /* Retrieves the ID of the book being updated */
    $update_id = $_POST['update_id'];
    /* Converts the input quantity to an integer for safety */
    $newQty    = intval($_POST['new_quantity']);

    /* Checks if the new quantity is less than one */
    if ($newQty < 1) 
    { 
        /* Enforces a minimum quantity of 1 */
        $newQty = 1; 
    }

    /* Checks if the item to be updated actually exists in the cart */
    if (isset($_SESSION['cart'][$update_id])) 
    {
        /* Updates the quantity in the session data */
        $_SESSION['cart'][$update_id]['quantity'] = $newQty;
    }
}

/* Iterates through the cart to ensure data integrity and prevent errors */
foreach ($_SESSION['cart'] as $id => &$item) 
{
    /* Checks if the item entry is properly formatted as an array */
    if (!is_array($item)) 
    {
        /* If corrupt or wrongly formatted, remove the entry */
        unset($_SESSION['cart'][$id]);
        /* Move to the next item in the list */
        continue;
    }
    
    /* Validates that a quantity is set for the item */
    if (!isset($item['quantity'])) 
    {
        /* Sets a default quantity if none is found */
        $item['quantity'] = 1;
    }
    
    /* Validates that a price is set for calculation purposes */
    if (!isset($item['price'])) 
    {
        /* Sets a default price of zero if missing */
        $item['price'] = 0;
    }
    
    /* Validates that the book name exists for display purposes */
    if (!isset($item['book_name'])) 
    {
        /* Sets a placeholder name if the book title is missing */
        $item['book_name'] = 'Unknown Book';
    }
}

/* Breaks the reference used in the foreach loop for security/safety */
unset($item); // Break the reference

?>

<!DOCTYPE html>
<html>

<head>
    <title>Your Cart</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        body 
        {
            /* Dark background for the cart page */
            background: #111;
            /* White text for visibility */
            color: white;
            /* Sets the primary font to Arial */
            font-family: Arial;
            /* Resets default margins to zero */
            margin: 0;
            /* Adds padding around the page content */
            padding: 20px;
        }

        h1 
        {
            /* Centers the main "Your Shopping Cart" heading */
            text-align: center;
            /* Adds spacing below the heading */
            margin-bottom: 30px;
        }

        .cart-container 
        {
            /* Sets the cart width to 80% of the screen */
            width: 80%;
            /* Centers the container horizontally */
            margin: auto;
            /* Slightly transparent background for the glass effect */
            background: rgba(255,255,255,0.05);
            /* Internal spacing for the list of books */
            padding: 20px;
            /* Softens the corners of the container */
            border-radius: 10px;
            /* Adds a blur effect behind the container */
            backdrop-filter: blur(4px);
        }

        .cart-item 
        {
            /* Displays item details in a row layout */
            display: flex;
            /* Pushes item info to the left and actions to the right */
            justify-content: space-between;
            /* Centers content vertically within the row */
            align-items: center;
            /* Background for each individual book card */
            background: rgba(255,255,255,0.07);
            /* Padding inside the item card */
            padding: 15px;
            /* Rounded corners for each card */
            border-radius: 8px;
            /* Vertical spacing between different books in the cart */
            margin-bottom: 15px;
        }

        .item-info 
        {
            /* Allocates 40% of the row to the book's title and price */
            width: 40%;
        }

        .item-info h3 
        {
            /* Removes default margins for the book title */
            margin: 0;
            /* Sets the font size for the book title */
            font-size: 18px;
        }

        .item-actions 
        {
            /* Flexbox to arrange Update and Remove buttons */
            display: flex;
            /* Vertically centers the forms/buttons */
            align-items: center;
            /* Adds a 10px gap between the two actions */
            gap: 10px;
        }

        input[type="number"] 
        {
            /* Sets a specific width for the quantity input box */
            width: 60px;
            /* Internal padding for the numbers */
            padding: 5px;
            /* Rounds the input box corners */
            border-radius: 5px;
            /* Removes the default border */
            border: none;
        }

        button 
        {
            /* Vertical and horizontal padding for the buttons */
            padding: 8px 15px;
            /* Rounds the button corners */
            border-radius: 5px;
            /* Makes button text bold */
            font-weight: bold;
            /* Changes mouse to pointer on hover */
            cursor: pointer;
            /* Removes default button borders */
            border: none;
        }

        .remove-btn 
        {
            /* Red background for the removal action */
            background: crimson;
            /* White text for the delete button */
            color: white;
        }

        .update-btn 
        {
            /* Blue background for the update action */
            background: steelblue;
            /* White text for the update button */
            color: white;
        }

        .checkout-btn 
        {
            /* Green color to indicate a positive final action */
            background: green;
            /* White text for the checkout button */
            color: white;
            /* Sets button width */
            width: 200px;
            /* Centers the button horizontally */
            margin: 20px auto;
            /* Forces the button onto its own line */
            display: block;
            /* Internal spacing for a larger button */
            padding: 12px;
            /* Rounded corners for the checkout button */
            border-radius: 8px;
        }

        .continue-btn 
        {
            /* Neutral gray background for the secondary action */
            background: gray;
            /* White text for the continue button */
            color: white;
            /* Sets button width */
            width: 200px;
            /* Centers the button horizontally */
            margin: 10px auto;
            /* Forces the button onto its own line */
            display: block;
            /* Internal spacing */
            padding: 12px;
            /* Rounded corners */
            border-radius: 8px;
        }

        .total-box 
        {
            /* Centers the grand total text */
            text-align: center;
            /* Adds space above the total */
            margin-top: 20px;
            /* Increases font size for the final price */
            font-size: 22px;
        }

    </style>

</head>

<body>

    <h1>Your Shopping Cart</h1>

    <div class="cart-container">

        <?php
        if (empty($_SESSION['cart'])) 
            {
            echo "<p style='text-align:center;'>Your cart is empty.</p>";
        } 
        
        else 
        {

            $grand_total = 0;

            foreach ($_SESSION['cart'] as $id => $item) 
            {

                // Extract values safely with fallback defaults (extra safety)
                $name  = isset($item['book_name']) ? $item['book_name'] : 'Unknown';
                $price = isset($item['price']) ? floatval($item['price']) : 0;
                $qty   = isset($item['quantity']) ? intval($item['quantity']) : 1;

                // Ensure quantity is at least 1
                if ($qty < 1) 
                {
                    $qty = 1;
                }

                $subtotal = $price * $qty;
                $grand_total += $subtotal;
                ?>

                <div class="cart-item">
                    
                    <div class="item-info">
                        <h3><?php echo htmlspecialchars($name); ?></h3>
                        <p>Price: AED <?php echo number_format($price, 2); ?></p>
                        <p>Subtotal: AED <?php echo number_format($subtotal, 2); ?></p>
                    </div>

                    <div class="item-actions">

                        <!-- Update Quantity Form -->
                        <form action="cart.php" method="post">
                            <input type="hidden" name="update_id" value="<?php echo htmlspecialchars($id); ?>">
                            <input type="number" name="new_quantity" value="<?php echo $qty; ?>" min="1">
                            <button class="update-btn">Update</button>
                        </form>

                        <!-- Remove Item Form -->
                        <form action="cart.php" method="post">
                            <input type="hidden" name="remove_id" value="<?php echo htmlspecialchars($id); ?>">
                            <button class="remove-btn">Remove</button>
                        </form>

                    </div>

                </div>

                <?php
            }

            echo "<div class='total-box'>Grand Total: AED " . number_format($grand_total, 2) . "</div>";
        }
        ?>

        <!-- Continue Shopping Button -->
        <button onclick="window.location.href='UserHomepage.php'" class="continue-btn">Continue Shopping</button>

        <!-- Checkout Button -->
        <button onclick="window.location.href='checkout.php'" class="checkout-btn">Proceed to Checkout</button>

    </div>

</body>
</html>