<!DOCTYPE html> 
<html lang="en"> <!-- Sets the language of the page to English -->

<head> <!-- The head contains metadata, styling, and page configuration -->
    
    <meta charset="UTF-8"> <!-- Sets the character encoding to UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Makes page responsive on phones -->
    <title>About Us - RakBooks</title> <!-- Title shown in browser tab -->

<style> /* CSS section starts here — internal styling because user wants one page */

        /* This is for the whole page */

        body 
        { /* Styles applied to the entire page */
            margin: 0; /* Removes default margin around the body */
            font-family: Arial, sans-serif; /* Sets the text font for the whole page */
            background-color: #f5f5f5; /* Light grey background behind everything */
        }

        /* This is for the top half section */

        .top-section 
        { /* Container for the top half (library background + book image + title) */
            background-image: url('OpenBookAboutUs.jpg'); /* Placeholder background image of library */
            background-size: cover; /* Makes image stretch to cover entire section */
            background-position: center; /* Keeps background centered */
            height: 400px; /* Fixes height of top section */
            display: flex; /* Enables flexbox layout */
            justify-content: center; /* Centers items horizontally */
            align-items: center; /* Centers items vertically */
            position: relative; /* Allows elements inside to be positioned relative to this box */
        }

        .open-book 
        { /* Styling for the open-book image */
            width: 250px; /* Sets width of the book image */
            opacity: 0.9; /* Slight transparency so text is readable */
        }

        .about-title 
        { /* Styling for the "ABOUT US" title */
            position: absolute; /* Places title over the book image */
            font-size: 50px; /* Large text size */
            color: white; /* White text color */
            text-shadow: 3px 3px 10px black; /* Shadow for visibility on background */
            font-weight: bold; /* Makes the title thicker and readable */
        }

        /* This is for the bottom half section */

        .bottom-section 
        { /* Container for bottom half */
            display: flex; /* Places elements side-by-side (left image, text, right image) */
            justify-content: space-between; /* Spreads items across horizontally */
            padding: 40px; /* Adds spacing around content */
            align-items: center; /* Vertically aligns images and text */
        }

        .side-image 
        { /* Styling for left and right images */
            width: 200px; /* Sets width of side images */
            height: 300px; /* Sets height */
            background-color: #ccc; /* Placeholder grey color (until user adds images) */
            border-radius: 10px; /* Rounds the corners */
        }

        .content-box 
        { /* Styles for the white box with text */
            background: white; /* White background to contrast with page */
            padding: 30px; /* Spacing inside the box */
            border-radius: 15px; /* Smooth round edges */
            width: 60%; /* Box takes 60% of the row width */
            box-shadow: 0 0 15px rgba(0,0,0,0.2); /* Adds soft shadow around box */
        }

        .content-box h2 
        { /* Styling for headings inside text box */
            margin-top: 0; /* Removes unnecessary space above headings */
            color: #333; /* Dark grey for clean look */
        }

        .content-box p 
        { /* Styling for paragraphs inside box */
            line-height: 1.6; /* Improves readability */
            color: #444; /* Slightly lighter grey for clean paragraph look */
        }

</style> 

</head>

<body> <!-- Everything visible on the website goes inside the body -->

    <div class="top-section"> <!-- Top container with library background -->
        <div class="about-title">ABOUT US</div> <!-- Title placed on top of the image -->
    </div> <!-- End of top-section -->

    <div class="bottom-section"> <!-- Container for images + text -->

        <img src="LeftImageAboutUs.jpg" class="side-image" alt="Left Side Image"> <!-- Left image added -->

        <div class="content-box"> <!-- White box containing all text -->
            
            <h2>Who We Are</h2> <!-- Section heading -->
            <p> <!-- Paragraph describing the company -->
                RakBooks is a modern online platform created in Ras Al Khaimah to connect readers with book suppliers from Africa, Asia, and Europe through a single, centralised system.
            </p>

            <h2>Our Story</h2> <!-- Another heading -->
            <p> <!-- Paragraph about the story -->
                We began with the goal of simplifying book discovery. Customers wanted a way to browse multiple suppliers without jumping across different websites and RakBooks became the solution.
            </p>

            <h2>What We Offer</h2> <!-- Heading -->
            <p> <!-- Paragraph listing services -->
                Our platform provides fast search, secure payments, easy reservations, and guaranteed best prices on a wide range of books from top-rated global suppliers.
            </p>

            <h2>Our Commitment</h2> <!-- Final heading -->
            <p> <!-- Paragraph about mission -->
                We aim to make reading more accessible, enjoyable, and affordable by continuously improving our system and expanding our network of trusted suppliers.
            </p>

        </div> <!-- End of content-box -->

        <img src="RightImageAboutUs.jpg" class="side-image" alt="Right Side Image"> <!-- Right image added -->

    </div> 

</body>

</html> 
