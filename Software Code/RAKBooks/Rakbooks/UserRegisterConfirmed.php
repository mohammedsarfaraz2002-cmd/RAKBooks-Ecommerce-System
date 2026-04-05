<?php

// --- ADD THESE LINES FOR DEBUGGING ONLY! ---
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// --- END DEBUGGING LINES ---

// Start a session (useful for temporary success messages)
session_start();

// Include the database connection file. 
// This file must contain the $conn = new mysqli(...) object.
require_once 'connection.php'; 

// Check if the form was submitted (assuming the button has name="register_submit")
if (isset($_POST['register_submit'])) 
    {
    
        // 1. Get and Sanitize User Inputs
        $name = trim($_POST['fullname']);
        $email = trim($_POST['email']);
        $number = trim($_POST['phonenumber']);
        $gender = $_POST['gender'];
        $address = trim($_POST['address']);
    
        // Get the raw password
        $raw_password = $_POST['password'];

        // --- CRITICAL SECURITY STEP ---
        // 2. HASH the password before storing it
        // The password_hash() function securely scrambles the password.
        $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);
    
        // 3. Check if the email already exists
        $stmt_check = $conn->prepare("SELECT id FROM customer WHERE email = ?");
        $stmt_check->bind_param("s", $email);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) 
        {
            // Email already in use
            $error_message = "Registration failed: This email is already registered.";
            $stmt_check->close();
        } 
    else 
        {
            // 4. Prepare the INSERT statement
            // Note the order must match the column order in your table: name, email, number, gender, password, address
            $stmt_insert = $conn->prepare("INSERT INTO customer (name, email, number, gender, password, address) VALUES (?, ?, ?, ?, ?, ?)");
        
            // Bind parameters: (s=string, i=integer, s=string, s=string, s=string, s=string)
            // Adjust the type string if 'number' is stored as an integer (i). Assuming 's' for phone number string here.
            $stmt_insert->bind_param("ssisss", $name, $email, $number, $gender, $hashed_password, $address);

        // 5. Execute the Insertion
        if ($stmt_insert->execute()) 
            {
                // Success: Redirect the user to the login page
                header("Location: UserLogin.php?status=registered");
                exit(); 
            } 
        else 
            {
                // Database execution failure
                $error_message = "Registration failed: " . $stmt_insert->error;
            }

        $stmt_insert->close();
    }

    $conn->close();
}

// If there was an error, redirect back to the registration page with a message
if (isset($error_message)) 
    {
        echo "<script>alert('$error_message')</script>";
        echo "<script>window.location.href = 'UserRegister.html';</script>"; // Assuming your register form is UserRegister.html
        exit();
    }