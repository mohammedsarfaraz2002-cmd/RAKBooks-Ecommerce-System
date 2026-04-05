<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>

    <style>
        /* --- Body STYLES --- */
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
            color: #ffffff; /* White color for the main title */
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #2980b9; /* Blue underline */
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
        
        /* Style for the button */
        button[type="submit"] 
        {
            /* Strong action color */
            background-color: #2ecc71; 
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
            background-color: #27ae60; /* Slightly darker green on hover */
        }

        /* --- ADMIN NAVIGATION/LINK STYLES  --- */
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

        .admin-nav a:hover 
        {
            color: #ffffff; /* White on hover */
        }

    </style>

</head>

<body>

    <div class="container">
        
        <div class="admin-nav">
            <a href="AdminHomePage.php">Dashboard</a> <!-- Link to Admin Dashboard -->
            <a href="RemoveBook.php">Remove Existing Book</a> <!-- Link to Remove Book Page -->
        </div>

        <h1>Add a New Book</h1>
        
        <form action="AddNewBookProcess.php" method="POST"> <!-- Form submission to AddNewBookProcess.php -->
            
            <div class="form-group">
                <label for="supplier">1. Select Supplier</label>
                <select id="supplier" name="supplier" required> <!-- Dropdown for supplier selection -->
                    <option value="" disabled selected>--- Choose Supplier ---</option>
                    <option value="Banbury">Banbury</option>
                    <option value="Cerebro">Cerebro</option>
                    <option value="Plutonium">Plutonium</option>
                </select>
            </div>

            <div class="form-group">
                <label for="isbn">2. Book's ISBN Number</label> <!-- Input for ISBN number -->
                <input type="text" id="isbn" name="isbn" placeholder="e.g., 9781234567890" required pattern="[0-9]{10,13}">
            </div>

            <div class="form-group"> <!-- Input for Book Name -->
                <label for="book_name">3. Book Name</label>
                <input type="text" id="book_name" name="book_name" placeholder="e.g., The Hitchhiker's Guide to the Galaxy" required>
            </div>

            <div class="form-group"><!-- Input for Book Author -->
                <label for="author">4. Book Author</label>
                <input type="text" id="author" name="author" placeholder="e.g., Douglas Adams" required>
            </div>

            <div class="form-group">
                <label for="price">5. Book Price (AED)</label>
                <input type="number" id="price" name="price" placeholder="e.g., 24.99" step="0.01" min="0.01" required>
            </div>
            
            <button type="submit">
                Add Book to Selected Supplier
            </button>

        </form>

    </div>

</body>

</html>