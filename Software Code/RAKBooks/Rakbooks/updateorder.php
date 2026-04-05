<?php
/* Starts a session to keep track of admin state if needed */
session_start();

// Database Connection
/* Configuration for connecting to the MySQL database */
$host = 'localhost'; /* Server host */
$user = 'root';      /* Database username */
$pass = '';          /* Database password */
$dbname = 'rakbooks_db'; /* Name of the database */

/* Creating a new database connection object */
$conn = new mysqli($host, $user, $pass, $dbname);
/* Checks if the connection was successful; stops execution if it fails */
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

// --- BACKEND LOGIC: HANDLE THE UPDATE ACTION ---
/* Checks if the 'Update' button was clicked via a POST request */
if (isset($_POST['update_status'])) 
{
    /* Retrieves the specific order ID and the new status selected by the admin */
    $order_id = $_POST['order_id'];
    $new_status = $_POST['new_status'];

    /* SQL query to update the status of a specific order */
    $update_sql = "UPDATE `order` SET order_status = ? WHERE order_id = ?";
    /* Prepares the statement to prevent SQL injection */
    $stmt = $conn->prepare($update_sql);
    /* Binds the new status (string) and order ID (integer) to the query */
    $stmt->bind_param("si", $new_status, $order_id);
    
    /* Executes the update and displays a confirmation alert to the admin */
    if ($stmt->execute()) 
    {
        echo "<script>alert('Order #$order_id updated to $new_status');</script>";
    }
    /* Closes the prepared statement to free resources */
    $stmt->close();
}

// --- FETCH ALL ORDERS FOR THE UI ---
/* SQL query to retrieve all orders, showing the newest ones first */
$sql = "SELECT * FROM `order` ORDER BY order_id DESC";
/* Executes the query and stores the result set */
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Update Orders</title>
    <style>
        body 
        { 
            /* Standard sans-serif font */
            font-family: Arial, sans-serif; 
            /* Light green background color for the admin theme */
            background-color: #e8f5e9; 
            /* Padding around the viewport */
            padding: 20px; 
        }

        .admin-container 
        { 
            /* Limits the width of the management area */
            max-width: 1000px; 
            /* Centers the container on the screen */
            margin: auto; 
            /* White background for the table area */
            background: white; 
            /* Internal spacing */
            padding: 20px; 
            /* Rounded corners */
            border-radius: 10px; 
            /* Subtle shadow for a card-like appearance */
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); 
        }

        h2 
        { 
            /* Dark green color for headings */
            color: #2e7d32; 
            /* Centers the text */
            text-align: center; 
            /* Adds a themed underline */
            border-bottom: 2px solid #2e7d32; 
            /* Space between text and underline */
            padding-bottom: 10px; 
        }

        table 
        { 
            /* Table fills the container width */
            width: 100%; 
            /* Collapses borders into single lines */
            border-collapse: collapse; 
            /* Adds space above the table */
            margin-top: 20px; 
        }

        th, td 
        { 
            /* Internal padding for cell content */
            padding: 12px; 
            /* Light gray border for table grid */
            border: 1px solid #ddd; 
            /* Align text to the left */
            text-align: left; 
        }

        th 
        { 
            /* Dark green background for header row */
            background-color: #2e7d32; 
            /* White text for header readability */
            color: white; 
        }

        .btn-update 
        { 
            /* Green background for update button */
            background-color: #2e7d32; 
            /* White text color */
            color: white; 
            /* Removes default border */
            border: none; 
            /* Padding for button size */
            padding: 8px 12px; 
            /* Pointer cursor on hover */
            cursor: pointer; 
            /* Rounded button corners */
            border-radius: 4px; 
        }

        .btn-update:hover 
        { 
            /* Darker green when hovered */
            background-color: #1b5e20; 
        }

        select 
        { 
            /* Internal padding for dropdown */
            padding: 5px; 
            /* Rounded corners for dropdown */
            border-radius: 4px; 
        }

    </style>
    
</head>
<body>

<div class="admin-container">
    <h2>Admin Order Management</h2>
    
    <table>
        <thead>
            <tr> <!-- Table headers for order management -->
                <th>Order ID</th>
                <th>Customer Email</th>
                <th>Book ISBN</th>  
                <th>Current Status</th>
                <th>Change Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?> <!-- Loop through each order record -->
            <tr>
                <td>#<?php echo $row['order_id']; ?></td> <!-- Displays the order ID -->
                <td><?php echo htmlspecialchars($row['email']); ?></td> <!-- Displays the customer's email -->
                <td><?php echo $row['book_id']; ?></td> <!-- Displays the book ISBN -->
                <td><b><?php echo $row['order_status']; ?></b></td> <!-- Displays the current order status -->
                
                <form method="POST" action="">
                    <td> <!-- Dropdown to select new order status -->
                        <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                        <select name="new_status">
                            <option value="Order Received" <?php if($row['order_status'] == 'Order Received') echo 'selected'; ?>>Order Received</option>
                            <option value="Order in Process" <?php if($row['order_status'] == 'Order in Process') echo 'selected'; ?>>Order in Process</option>
                            <option value="Out for Delivery" <?php if($row['order_status'] == 'Out for Delivery') echo 'selected'; ?>>Out for Delivery</option>
                            <option value="Order Completed" <?php if($row['order_status'] == 'Order Completed') echo 'selected'; ?>>Order Completed</option>
                        </select>
                    </td>
                    <td>
                        <button type="submit" name="update_status" class="btn-update">Update</button>
                    </td>
                </form>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    
    <br>
    <a href="AdminHomepage.php" style="color: #2e7d32; font-weight: bold; text-decoration: none;">← Back to Dashboard</a>
</div>

</body>
</html>
<?php $conn->close(); ?>