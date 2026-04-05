<?php
/* Starts the session to access the current shopping cart data */
session_start();

// Redirect if cart is empty
/* Checks if the cart session is empty or not set */
if (empty($_SESSION['cart'])) 
{
    /* Redirects the user back to the cart page if there is nothing to buy */
    header("Location: cart.php");
    /* Stops further script execution */
    exit();
}

/* Initializes the grand total variable at zero */
$grand_total = 0;
/* Loops through each item currently in the cart session */
foreach ($_SESSION['cart'] as $item) 
{
    /* Safely retrieves the price, converting it to a float */
    $price = isset($item['price']) ? floatval($item['price']) : 0;
    /* Safely retrieves the quantity, converting it to an integer */
    $qty   = isset($item['quantity']) ? intval($item['quantity']) : 1;
    /* Calculates subtotal for the item and adds it to the grand total */
    $grand_total += ($price * $qty);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout | RakBook</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        body 
        {
            /* Sets the background to a dark theme */
            background: #111;
            /* Sets default text color to white */
            color: white;
            /* Uses Arial as the primary font */
            font-family: Arial;
            /* Removes default browser margins */
            margin: 0;
            /* Adds padding around the page content */
            padding: 20px;
        }

        h1 
        {
            /* Centers the page heading */
            text-align: center;
            /* Adds vertical spacing below the title */
            margin-bottom: 30px;
        }

        .cart-container 
        {
            /* Sets the form container width to 80% */
            width: 80%;
            /* Centers the container horizontally */
            margin: auto;
            /* Slightly transparent white background for glass effect */
            background: rgba(255,255,255,0.05);
            /* Internal spacing for form elements */
            padding: 20px;
            /* Rounds the corners of the container */
            border-radius: 10px;
            /* Blurs the background behind the container */
            backdrop-filter: blur(4px);
        }

        .form-group 
        {
            /* Spacing between different input sections */
            margin-bottom: 20px;
            /* Ensures group takes full width */
            width: 100%;
        }

        label 
        {
            /* Forces label onto its own line */
            display: block;
            /* Space between label text and input box */
            margin-bottom: 8px;
            /* Makes label text bold */
            font-weight: bold;
            /* Light gray color for secondary text */
            color: #ccc;
        }

        input[type="text"], select, textarea 
        {
            /* Makes inputs fill the entire width of the container */
            width: 100%;
            /* Internal padding for comfortable typing */
            padding: 12px;
            /* Rounds the corners of input fields */
            border-radius: 8px;
            /* Removes default borders */
            border: none;
            /* Dark transparent background for inputs */
            background: rgba(255,255,255,0.1);
            /* White text for user input */
            color: white;
            /* Ensures padding doesn't increase total width */
            box-sizing: border-box;
            /* Standard font size for readability */
            font-size: 16px;
        }

        /* Visibility Fix for dropdown */
        select option 
        {
            /* Sets dropdown list background to white for contrast */
            background-color: white;
            /* Sets dropdown text to black for readability */
            color: black;
            /* Adds spacing inside the options */
            padding: 10px;
        }

        textarea 
        {
            /* Sets a fixed height for the address box */
            height: 80px;
            /* Allows user to only resize the box vertically */
            resize: vertical;
        }

        .checkout-btn 
        {
            /* Green background for the primary action button */
            background: green;
            /* White text for the button */
            color: white;
            /* Makes the button take full width up to a limit */
            width: 100%;
            /* Limits the button width for better design */
            max-width: 300px;
            /* Centers the button horizontally */
            margin: 20px auto;
            /* Block display for centering */
            display: block;
            /* Vertical/Horizontal padding */
            padding: 15px;
            /* Rounded corners */
            border-radius: 8px;
            /* Bold text for emphasis */
            font-weight: bold;
            /* Pointer cursor on hover */
            cursor: pointer;
            /* Removes default button border */
            border: none;
            /* Larger text size */
            font-size: 18px;
        }

        .back-btn 
        {
            /* Neutral gray color for the return button */
            background: gray;
            /* White text color */
            color: white;
            /* Full width within parent */
            width: 100%;
            /* Matches checkout button size */
            max-width: 300px;
            /* Centers the link/button */
            margin: 10px auto;
            /* Block display to allow width and margin */
            display: block;
            /* Internal padding */
            padding: 10px;
            /* Rounded corners */
            border-radius: 8px;
            /* Centers the text inside */
            text-align: center;
            /* Removes link underline */
            text-decoration: none;
            /* Smaller font for secondary button */
            font-size: 14px;
        }

        .total-display 
        {
            /* Centers the final price */
            text-align: center;
            /* Large font size for importance */
            font-size: 24px;
            /* Spacing around the total display */
            margin: 20px 0;
            /* Internal spacing */
            padding: 15px;
            /* Adds a thin line separator above the total */
            border-top: 1px solid rgba(255,255,255,0.1);
        }
    </style>
    
</head>
<body>

    <h1>Checkout</h1>

    <div class="cart-container">
        <form id="checkoutForm" action="checkout_process.php" method="POST"> <!-- Form to submit checkout details to backend processing -->
            
            <div class="form-group">
                <label>Full Name</label> <!-- Input for customer's full name -->
                <input type="text" name="customer_name" placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <label>City</label>
                <input type="text" name="city" placeholder="e.g. Ras Al Khaimah" required>
            </div>

            <div class="form-group">
                <label>Full Address</label> <!-- Textarea for detailed address input -->
                <textarea name="address" placeholder="Building, Street, Area..." required></textarea>
            </div>

            <div class="form-group">
                <label>Mode of Payment</label>
                <select name="payment_mode" required> <!-- Dropdown for selecting payment method -->
                    <option value="" disabled selected>Select Payment Method</option> <!-- Default disabled option -->
                    <option value="Cash on Delivery">Cash on Delivery</option>
                    <option value="Credit Card">Credit Card</option>
                </select>
            </div>

            <div class="total-display">
                Total Amount: AED <?php echo number_format($grand_total, 2); ?>
            </div>

            <button type="submit" class="checkout-btn">Confirm & Place Order</button>
            <a href="cart.php" class="back-btn">Return to Cart</a>
        </form>
    </div>

    <script>
        // This checks if the URL has ?status=success (which we will add in the backend)
        /* Retrieves the search parameters from the current URL */
        const urlParams = new URLSearchParams(window.location.search);
        /* If the 'status' parameter is equal to 'success' */
        if (urlParams.get('status') === 'success') 
        {
            /* Shows a confirmation popup to the user */
            alert("Order has been placed.");
            /* Redirects the user back to the home page */
            window.location.href = "UserHomepage.php";
        }
    </script>

</body>
</html>