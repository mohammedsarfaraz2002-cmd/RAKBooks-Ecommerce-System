<?php
/* Starts the session to access logged-in user information */
session_start();

// Redirect to login if not logged in
/* Checks if the user's email is stored in the session; if not, they aren't logged in */
if (!isset($_SESSION['user_email'])) 
{
    /* Redirects unauthorized users to the login page */
    header("Location: UserLogin.php");
    /* Stops the script to ensure no data is leaked */
    exit();
}

/* Database connection variables */
$host = 'localhost'; /* Database server address */
$user = 'root';      /* Database username */
$pass = '';          /* Database password */
$dbname = 'rakbooks_db'; /* The specific database name for RAKBooks */

/* Establishes a connection to the MySQL database */
$conn = new mysqli($host, $user, $pass, $dbname);
/* Checks if the connection failed and displays the error */
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

/* Retrieves the logged-in user's email from the session */
$user_email = $_SESSION['user_email'];

// SQL to fetch only this user's orders
/* Selects all columns from the 'order' table where the email matches the logged-in user */
$sql = "SELECT * FROM `order` WHERE email = ? ORDER BY order_id DESC";
/* Prepares the SQL statement to prevent SQL injection attacks */
$stmt = $conn->prepare($sql);
/* Binds the user's email to the '?' placeholder in the query */
$stmt->bind_param("s", $user_email);
/* Executes the query on the database */
$stmt->execute();
/* Retrieves the result set from the executed statement */
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Track Your Orders - RAKBooks</title>
    <style>
        body 
        { 
            /* Sets the default font style */
            font-family: Arial, sans-serif; 
            /* Light gray background color for the page */
            background-color: #f4f4f4; 
            /* Removes default browser margins */
            margin: 0; 
            /* Adds padding around the whole page content */
            padding: 20px; 
        }

        .container 
        { 
            /* Limits the width of the order history card */
            max-width: 900px; 
            /* Centers the container horizontally */
            margin: auto; 
            /* White background for the card */
            background: white; 
            /* Internal spacing for the content */
            padding: 20px; 
            /* Rounds the corners of the card */
            border-radius: 8px; 
            /* Adds a subtle shadow for depth */
            box-shadow: 0 0 10px rgba(0,0,0,0.1); 
        }

        h2 
        { 
            /* Dark green color to match the theme */
            color: #2e7d32; 
            /* Centers the heading text */
            text-align: center; 
        }

        table 
        { 
            /* Makes the table take the full width of the container */
            width: 100%; 
            /* Merges borders into a single line */
            border-collapse: collapse; 
            /* Adds space between the table and the header */
            margin-top: 20px; 
        }

        th, td 
        { 
            /* Internal padding for cell content visibility */
            padding: 12px; 
            /* Light gray border for each cell */
            border: 1px solid #ddd; 
            /* Aligns text to the left */
            text-align: left; 
        }

        th 
        { 
            /* Dark green background for table headers */
            background-color: #2e7d32; 
            /* White text color for headers */
            color: white; 
        }

        tr:nth-child(even) 
        { 
            /* Alternating row colors for better readability (zebra striping) */
            background-color: #f9f9f9; 
        }

        .status-badge 
        { 
            /* Makes the order status stand out */
            font-weight: bold; 
            /* Blue color for the status text */
            color: #1565c0; 
        }

        .back-btn 
        { 
            /* Treats the link as a block element for spacing */
            display: inline-block; 
            /* Adds space above the button */
            margin-top: 20px; 
            /* Removes the underline from the link */
            text-decoration: none; 
            /* Green text color */
            color: #2e7d32; 
            /* Bold font weight */
            font-weight: bold; 
        }

    </style>
</head>
<body>

<div class="container">
    <h2>My Order History</h2>
    <p>Logged in as: <b><?php echo htmlspecialchars($user_email); ?></b></p>

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Book ISBN</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            /* Checks if any orders were returned from the database */
            if ($result->num_rows > 0): ?>
                <?php 
                /* Loops through each order row fetched from the database */
                while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td>#<?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['book_id']; ?></td>
                        <td><span class="status-badge"><?php echo $row['order_status']; ?></span></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" style="text-align:center;">You haven't placed any orders yet.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="UserHomepage.php" class="back-btn">← Back to Home</a>
</div>

</body>
</html>
<?php 
/* Closes the database connection to free up system resources */
$conn->close(); 
?>