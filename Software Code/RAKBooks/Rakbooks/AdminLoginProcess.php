<?php
session_start();

// Ensure the connection file is available
require_once 'connection.php';

if (!$conn) 
{
    die("Database Connection Failed! Check connection.php.");
}

// Check if the form was submitted (the button has name="submit")
if (isset($_POST['submit'])) 
{
    
        // 1. Get User Input
        $email = strtolower(trim($_POST['email'])); //ensures that email is case-insensitive
        $password = $_POST['password']; // The raw password input

        // 2. Prepare the SQL Statement (SECURE: Use Prepared Statements)
        $stmt = $conn->prepare("SELECT id, password FROM admin WHERE email = ?");
        $stmt->bind_param("s", $email); 
        $stmt->execute();
        $result = $stmt->get_result();
    
    if ($result->num_rows === 1) 
        {
            $user = $result->fetch_assoc();
            $stored_password_hash = $user['password']; // Get the HASHED password
            $admin_id = $user['id'];

        // 3. Verify the Password
        // IMPORTANT: Assumes you used password_hash() when the user registered
        if (password_verify($password, $stored_password_hash)) 
            {
            
                // Login Successful!
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $admin_id;
                $_SESSION['user_email'] = $email;

                // Redirect to the User Homepage
                header("Location: AdminHomePage.php");
                exit(); 
            
        } 
        else 
            {
                $error_message = "Invalid email or password.";
            }
    } 
    else 
        {
        // User not found
        $error_message = "Invalid email or password.";
        }

    $stmt->close();
    $conn->close();
}

// Handle errors by redirecting back to the login page with an alert
if (isset($error_message)) 
    {
    echo "<script>alert('{$error_message}')</script>";
    // This directs the browser back to the login page
    echo "<script>window.location.href = 'AdminLogin.php';</script>";
    exit();
    }
?>