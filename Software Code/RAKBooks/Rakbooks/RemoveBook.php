<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Remove Existing Book</title>

    <style>
        /* --- GLOBAL STYLES --- */
        body 
        {
            /* Dark theme background color */
            background-color: #2c3e50; 
            /* Light text for contrast */
            color: #ecf0f1; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            /* Center the content vertically and horizontally */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* --- CONTAINER STYLES --- */
        .container 
        {
            /* Card-like structure for the form */
            background-color: #34495e; 
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5); /* Subtle shadow for depth */
            width: 100%;
            max-width: 500px; /* Limit the form width */
        }

        /* --- TYPOGRAPHY AND HEADINGS --- */
        h1 
        {
            /* Changed color for "Remove" action */
            color: #ffffff; 
            text-align: center;
            margin-bottom: 30px;
            /* Changed border color to red for "Remove" action */
            border-bottom: 2px solid #e74c3c; 
            padding-bottom: 10px;
        }

        /* --- FORM ELEMENTS STYLES --- */
        .form-group 
        {
            margin-bottom: 20px;
        }

        label 
        {
            display: block; /* Makes the label take up its own line */
            margin-bottom: 8px;
            font-weight: bold;
            color: #bdc3c7; /* Lighter text for labels */
        }

        input[type="text"],
        input[type="number"],
        select 
        {
            width: 100%;
            padding: 12px;
            border: 1px solid #7f8c8d; /* Subtle border */
            border-radius: 4px;
            box-sizing: border-box; /* Includes padding in the element's total width and height */
            background-color: #2c3e50; /* Input background same as body */
            color: #ecf0f1;
            /* Make sure the text is readable inside the input */
            font-size: 16px; 
            /* Transition for focus effect */
            transition: border-color 0.3s;
        }

        input:focus,
        select:focus 
        {
            border-color: #3498db; /* Blue highlight on focus */
            outline: none; /* Remove default outline */
        }
        
        /* Style for the button (Changed to red for "Remove" action) */
        button[type="submit"] 
        {
            /* Strong action color - Red */
            background-color: #e74c3c; 
            color: white;
            padding: 15px 25px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover 
        {
            background-color: #c0392b; /* Slightly darker red on hover */
        }

        /* --- ADMIN NAVIGATION/LINK STYLES (Optional Header) --- */
        .admin-nav 
        {
            text-align: center;
            margin-bottom: 20px;
        }

        .admin-nav a 
        {
            color: #3498db; /* Link color */
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
            transition: color 0.3s;
        }

        /* Style the current page link */
        .admin-nav a.current 
        {
            color: #ffffff; /* White to show it's the active page */
            border-bottom: 2px solid #ffffff;
            padding-bottom: 2px;
        }

        .admin-nav a:hover 
        {
            color: #ffffff; /* White on hover */
        }

    </style>

</head>

<body>

    <div class="container">
        
        <div class="admin-nav"> <!-- Admin navigation links -->
            <a href="AdminHomePage.php">Dashboard</a> 
            <a href="AddNewBook.php">Add New Book</a> 
        </div>

        <h1>Remove a Book from Supplier</h1>
        
        <form action="RemoveBookProcess.php" method="POST"> <!-- Form to remove a book from a supplier -->
            
            <div class="form-group">

                <label for="supplier">1. Select Supplier</label>

                <select id="supplier" name="supplier" required>
                    <!-- Default disabled option prompting selection -->
                    <option value="" disabled selected>--- Choose Supplier ---</option>
                    <option value="Banbury">Banbury</option>
                    <option value="Cerebro">Cerebro</option>
                    <option value="Plutonium">Plutonium</option>

                </select>

            </div>

            <div class="form-group">

                <label for="isbn">2. Book's ISBN Number</label> <!-- Input for ISBN number of the book to be removed -->
                <input type="text" id="isbn" name="isbn" placeholder="Enter ISBN (e.g., 9781234567890)" required pattern="[0-9]{10,13}">

            </div>
            
            <button type="submit"> <!-- Submit button to remove the book -->

                Remove Book from Selected Supplier

            </button>

        </form>

    </div>

</body>

</html>