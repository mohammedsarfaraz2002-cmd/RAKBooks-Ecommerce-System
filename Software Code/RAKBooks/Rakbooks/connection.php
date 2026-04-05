<?php 
// 1. Define Connection Variables
$servername = "localhost";
$username = "root";
$password = "your_password_here";
$dbname = "rakbooks_db";

// 2. Create the Connection Object (Object-Oriented MySQLi)
$conn = new mysqli($servername, $username, $password, $dbname);

// 3. Check Connection for Errors
if ($conn->connect_error) 
    {
    // If connection fails, stop script execution and display error
    die("Connection failed: " . $conn->connect_error);
    }

// Note: The connection is now stored in the $conn variable.
// When you include this file, you can immediately start querying the database.

?>