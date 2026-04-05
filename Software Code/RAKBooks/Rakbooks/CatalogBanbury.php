<?php
// ==========================
// START SESSION FOR CART
// ==========================
session_start();

// If cart does not exist in session, create it
if (!isset($_SESSION['cart'])) 
{
    $_SESSION['cart'] = [];
}

// This variable will hold success message after adding a book
$add_message = "";

// ==========================
// HANDLE ADD TO CART ACTION
// ==========================
// This runs ONLY when user clicks "Add to Cart"
if (isset($_POST['addtocart'])) 
{

    // Get values sent from the form
    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $price = $_POST['price'];

    // Add item into the cart (session)
    $_SESSION['cart'][] = 
    [
        'book_id' => $book_id,
        'book_name' => $book_name,
        'price' => $price,
        'supplier' => 'Banbury'
    ];

    // Success message
    $add_message = "Book added to cart!";
}



// ==========================
// SOAP REQUEST TO GET BOOKS
// ==========================
ini_set('soap.wsdl_cache_enabled', 0);

// Path to Banbury WSDL
$wsdl = "http://localhost/RAKBooks/Banbury/service.wsdl";

try 
{
    // SOAP Client Setup
    $client = new SoapClient($wsdl, 
    [
        'trace' => 1,
        'exceptions' => true,
        'cache_wsdl' => WSDL_CACHE_NONE,
        'soap_version' => SOAP_1_1
    ]);

    // Request books using supplierID = Banbury
    $response = $client->getBooks(['supplierID' => 'Banbury']); 

    // Extract list of books
    $books = [];
    if (isset($response->books)) 
    {
        $books = $response->books;
    }

} 
catch (Exception $e) 
{
    // If something goes wrong, show error
    $books = [];
    $error_message = "Error fetching books: " . $e->getMessage();
}

// SEARCH FILTER (PARTIAL MATCH)
if (isset($_GET['search']) && !empty(trim($_GET['search']))) 
{
    $searchTerm = strtolower(trim($_GET['search']));

    $books = array_filter($books, function ($book) use ($searchTerm) 
    {
        return stripos($book->title, $searchTerm) !== false
            || stripos($book->author, $searchTerm) !== false;
    });
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Catalog</title>

    <style>
        /* ===== PAGE BODY ===== */
        body 
        {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #121212; 
            color: #ffffff;
        }

        /* ===== TOP NAVIGATION BAR ===== */
        .top-nav 
        {
            width: 100%;
            background-color: #1c1c1c;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.4);
        }

        .top-nav a 
        {
            text-decoration: none;
            color: #bdbdbd;
            font-size: 16px;
            margin-right: 20px;
        }

        .top-nav a:hover 
        {
            color: #ffffff;
        }

        /* ===== PAGE HEADER ===== */
        .header 
        {
            text-align: center;
            margin-top: 25px;
            margin-bottom: 15px;
        }

        .header h1 
        {
            font-size: 32px;
            font-weight: bold;
        }

        /* ===== GRID CONTAINER ===== */
        .books-grid 
        {
            width: 90%;
            margin: auto;
            margin-top: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            grid-gap: 25px;
            padding-bottom: 50px;
        }

        /* ===== BOOK CARD ===== */
        .book-card 
        {
            background-color: #1e1e1e;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.5);
            text-align: center;
        }

        .book-card h2 
        {
            margin: 0;
            margin-bottom: 10px;
            font-size: 20px;
            color: #ffffff;
        }

        .book-card p 
        {
            color: #cccccc;
            font-size: 14px;
            margin-bottom: 10px;
        }

        /* ===== BUTTON ===== */
        .add-btn 
        {
            background-color: #4CAF50;
            padding: 10px 15px;
            border: none;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .add-btn:hover 
        {
            background-color: #66bb6a;
        }

        /* SUCCESS MESSAGE STYLE */
        .success-box 
        {
            width: 90%;
            margin: 20px auto;
            padding: 15px;
            background-color: #2e7d32;
            color: white;
            border-radius: 10px;
            text-align: center;
            font-size: 16px;
        }

        /* ===== SEARCH BAR ===== */

        .right-nav form 
        {
            display: flex;
            gap: 8px;
        }

        .right-nav input 
        {
            padding: 8px 10px;
            border-radius: 6px;
            border: none;
            outline: none;
            font-size: 14px;
        }

        .right-nav button 
        {
            padding: 8px 14px;
            border-radius: 6px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        .right-nav button:hover 
        {
            background-color: #66bb6a;
        }


    </style>

</head>

<body>

    <!-- TOP NAV  -->
    <div class="top-nav">
        <div class="left-nav">
            <a href="UserHomepage.php">Dashboard</a>
            <a href="BookSupplier.php">Back to Supplier List</a>
        </div>

        <div class="right-nav">

            <form method="GET" action="CatalogBanbury.php">

                <input 
                    type="text" 
                    name="search" 
                    placeholder="Search books..." 
                    value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
                >

                <button type="submit">Search</button>

            </form>

        </div>

    </div>

    <!-- ===== SUCCESS MESSAGE ===== -->
    <?php if (!empty($add_message)): ?>
        <div id="cart-message" class="success-box">
            <?php echo $add_message; ?>
        </div>
    <?php endif; ?>

    <!-- ===== HEADER ===== -->
    <div class="header">
        <h1>Available Books</h1>
    </div>

    <!-- ===== BOOKS GRID ===== -->
    <div class="books-grid">

        <?php if (!empty($books)): ?>

            <?php foreach($books as $b): ?>
                <div class="book-card">

                    <!-- Display each book's details -->
                    <h2><?php echo htmlspecialchars($b->title); ?></h2>
                    <p>Author: <?php echo htmlspecialchars($b->author); ?></p>
                    <p>Price: $<?php echo number_format($b->price, 2); ?></p>

                    <!-- ==========================
                         ADD TO CART FORM 
                         Posts back to SAME PAGE
                    =========================== -->
                    <form action="CatalogBanbury.php" method="POST">

                        <!-- Hidden values sent to PHP -->
                        <input type="hidden" name="book_id" value="<?php echo htmlspecialchars($b->isbn); ?>">
                        <input type="hidden" name="book_name" value="<?php echo htmlspecialchars($b->title); ?>">
                        <input type="hidden" name="price" value="<?php echo htmlspecialchars($b->price); ?>">

                        <!-- IMPORTANT: This tells PHP the user is adding to cart -->
                        <button type="submit" name="addtocart" class="add-btn">
                            Add to Cart
                        </button>
                    </form>

                </div>
            <?php endforeach; ?>

        <?php else: ?>
            <!-- Error or empty message -->
            <p style="grid-column:1/-1; text-align:center; color:#aaa;">
                <?php echo isset($error_message) ? $error_message : "No books available from this supplier."; ?>
            </p>
        <?php endif; ?>

    </div>

    <script>
    window.onload = function() 
    {
        const msg = document.getElementById('cart-message');
        if(msg) 
        {
            // Wait 3 seconds, then fade out
            setTimeout(() => 
            {
                msg.style.transition = "opacity 1s";
                msg.style.opacity = 0;
                // Remove from DOM after fade
                setTimeout(() => msg.remove(), 1000);
            }, 3000);
        }
    };
    </script>


</body>
</html>
