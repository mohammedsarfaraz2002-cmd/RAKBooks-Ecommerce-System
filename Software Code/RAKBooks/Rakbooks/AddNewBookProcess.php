<?php
// Set a default state for the operation result
$success = false;
$message = "";
$book_name = "";
$author = "";
$supplier = "";

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    // 1. Collect and Sanitize Form Data
    $supplier = filter_input(INPUT_POST, 'supplier', FILTER_SANITIZE_SPECIAL_CHARS); // Supplier name
    $isbn = filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_SPECIAL_CHARS);
    $book_name = filter_input(INPUT_POST, 'book_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

    // Basic validation
    if (empty($supplier) || empty($isbn) || empty($book_name) || empty($author) || $price === false || $price === null) 
    {
        $message = "Error: Required form fields are missing or invalid.";
    } 

    else 
    {
        // --- 2. Database Connection Configuration ---
        $db_configs = 
        [
            'Banbury' => 
            [
                'host' => 'localhost',
                'user' => 'root', 
                'pass' => '',     
                'name' => 'banbury_db' 
            ],

            'Cerebro' => 
            [
                'host' => 'localhost',
                'user' => 'root',
                'pass' => '',
                'name' => 'cerebro_db' 
            ],

            'Plutonium' => 
            [
                'host' => 'localhost',
                'user' => 'root',
                'pass' => '',
                'name' => 'plutonium' 
            ]

        ];

        // Get the configuration based on the selected supplier
        $config = $db_configs[$supplier] ?? null;

        if ($config === null) 
        {
            $message = "Error: Invalid supplier selected.";
        } 
        else 
        {
            // --- 3. Establish Dynamic Connection ---
            $conn = new mysqli($config['host'], $config['user'], $config['pass'], $config['name']);

            // Check connection
            if ($conn->connect_error) 
            {
                $message = "Connection failed for **{$supplier}**: " . $conn->connect_error;
            } 

            else 
            {
                // --- 4. Prepare and Execute SQL INSERT Statement ---
                $sql = "INSERT INTO books (isbn, book_name, author, price) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);

                if ($stmt === false) 
                {
                    $message = "Error preparing statement: " . $conn->error;
                } 

                else 
                {
                    // 'sssd' -> string, string, string, double
                    $stmt->bind_param("sssd", $isbn, $book_name, $author, $price);

                    if ($stmt->execute()) 
                    {
                        // Success!
                        $success = true;
                        $message = "The book **'{$book_name}'** by **{$author}** has been successfully added to the **{$supplier}** database.";
                    } 

                    else 
                    {
                        // Execution Error
                        $message = "Failed to add book to the **{$supplier}** database. Error: " . $stmt->error;
                    }

                    $stmt->close();
                }

                $conn->close();
            }
        }
    }
} 

else 
{
    // Handle direct access
    header("Location: AddNewBook.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $success ? 'Success' : 'Error'; ?> | Book Shop Admin</title>

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
            color: <?php echo $success ? '#2ecc71' : '#e74c3c'; ?>; /* Green for success, Red for error */
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid <?php echo $success ? '#2ecc71' : '#e74c3c'; ?>;
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

        /* Specific style for the primary success link */
        .action-links a:first-child 
        {
            background-color: #2ecc71; /* Green color for 'Add Another' */
        }
        
        .action-links a:first-child:hover 
        {
            background-color: #27ae60;
        }

    </style>

</head>

<body>

    <div class="container">
        
        <h1><?php echo $success ? '✅ Operation Successful' : '❌ Operation Failed'; ?></h1>
        
        <p><?php echo nl2br($message); ?></p>
        
        <div class="action-links">

            <a href="AddNewBook.php">Add Another Book</a>
            <a href="AdminHomePage.php">Go to Dashboard</a> 
            
        </div>

    </div>

</body>

</html>