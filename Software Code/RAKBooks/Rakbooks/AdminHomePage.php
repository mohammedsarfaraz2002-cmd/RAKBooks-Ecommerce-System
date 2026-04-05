<html>

<head>
    <title>Admin HomePage</title> <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<style>

/* Selects all elements to reset default spacing */
*
{
    /* Removes default outer spacing */
    margin: 0;
    /* Removes default inner spacing */
    padding: 0;
    /* Sets a clean, standard font for the whole page */
    font-family: sans-serif;
}

.banner /*this is for the enitre background of the home page*/
{ /*image of the home page is saved in the folder*/
    /* Makes the banner span the full width of the screen */
    width: 100%;
    /* Makes the banner span the full height of the screen */
    height: 100%;
    /* Applies a dark overlay gradient on top of the background image for text readability */
    background-image: linear-gradient( rgba(0,0,0,0.75), rgba(0,0,0,0.75) ), url(HomePageBackground.jpg);
    /* Ensures the background image covers the entire area without stretching */
    background-size: cover;
    /* Centers the background image within the div */
    background-position: center;
}

.navbar /*this is for the entire header*/
{
    /* Sets the width of the navigation bar to 85% of its container */
    width: 85%;
    /* Centers the navbar horizontally */
    margin: auto;
    /* Adds vertical padding (top/bottom) to the navbar */
    padding: 35px 0;
    /* Uses flexbox for layout alignment */
    display: flex;
    /* Aligns navbar items vertically in the center */
    align-items: center;
    /* Places space between the logo/links to push them to the sides */
    justify-content: space-between;
}

.navbar ul 
{
    /* Make the list take up the full width of the navbar container */
    width: 90%; 
    /* Use Flexbox to manage the list items (li) */
    display: flex;
    /* Distribute the space *between* the list items evenly */
    justify-content: space-between;
}

.navbar ul li
{
    /* Removes default bullet points from the list */
    list-style: none;
    /* Displays list items side by side */
    display: inline-block;
    /* Adds horizontal spacing between the navigation items */
    margin: 0 20px;
    /* Sets position to relative to allow absolute positioning of the underline (::after) */
    position: relative;
}

.navbar ul li a /*the links of the header*/
{
    /* Removes the default underline from anchor tags */
    text-decoration: none;
    /* Sets the link text color to white */
    color: white;
    /* Converts all link text to capital letters */
    text-transform: uppercase;
}

.navbar ul li::after /*this is to make the underline on the links of the header*/
{
    /* Required property for pseudo-elements to appear */
    content: '';
    /* Sets the thickness of the hover underline */
    height: 3px;
    /* Starts with zero width so it is hidden initially */
    width: 0;
    /* Background color of the underline */
    background: white;
    /* Positions the underline relative to the list item */
    position: absolute;
    /* Aligns the underline to the left edge */
    left: 0;
    /* Positions the underline slightly below the text */
    bottom: -10px;
    /* Adds a smooth 0.5s animation effect when the width changes */
    transition: 0.5s;
}

.navbar ul li:hover::after /*when you hover over any of the links on the header, an underline will be displayed*/
{
    /* Expands the underline to full width on hover */
    width: 100%;
}

.left-nav 
{
    /* Fixed position keeps it in place even if content scrolls */
    position: fixed; 
    /* Sticks the navigation bar to the left side of the screen */
    left: 0;
    /* Sets a specific width for the side navigation */
    width: 200px; /* Adjust width as needed */
    /* Ensures it stays above the banner */
    z-index: 100; /* Ensures it stays above the banner */
    
    /* Centering the entire bar vertically (middle-middle of the screen) */
    /* Moves the top of the nav to the middle of the screen */
    top: 50%;
    /* Offsets the element by half its own height to achieve perfect vertical centering */
    transform: translateY(-50%); 
    
    
}

.left-nav ul 
{
    /* Removes default bullet points */
    list-style: none;
    /* Centers the text within the side menu */
    text-align: center;
}

.left-nav ul li 
{
    /* Adds large vertical gaps between side menu items */
    margin: 50px 0;
    /* Sets relative positioning for the hover underline effect */
    position: relative;
}

.left-nav ul li a 
{
    /* Removes default link underline */
    text-decoration: none;
    /* Sets text color to white */
    color: white;
    /* Capitalizes side menu text */
    text-transform: uppercase;
    /* Sets a slightly smaller font size for the side menu */
    font-size: 14px;
    /* Adds internal padding for a larger clickable area */
    padding: 10px;
    /* Makes the entire block clickable */
    display: block; /* Makes the entire block clickable */
    /* Smooth transition for hover effects */
    transition: 0.3s;
}

.left-nav ul li a:hover 
{
    /* Highlight color on hover */
    color: white; /* Highlight color on hover */
    /* Adds a subtle transparent background on hover */
    background: rgba(255, 255, 255, 0.1);
}

.left-nav ul li::after 
{
    /* Empty content for the pseudo-element line */
    content: '';
    /* Thickness of the underline line */
    height: 3px;
    /* Starts at zero width (invisible) */
    width: 0; /* Starts at zero width (invisible) */
    /* Using the button hover color */
    background: white; /* Using the button hover color */
    /* Positioned absolutely within the list item */
    position: absolute;
    /* Aligns to the left side */
    left: 0;
    /* Adjust this value to set the distance below the text */
    bottom: -5px; /* Adjust this value to set the distance below the text */
    /* Animation duration for the line expansion */
    transition: 0.5s;
}

.left-nav ul li:hover::after 
{
    /* Expands the line to full width when hovering over the list item */
    width: 100%;
}

.content
{
    /* Makes the content div span the full width */
    width: 100%;
    /* Positioned absolutely relative to the banner */
    position: absolute;
    /* Centers the content vertically */
    top: 50%;
    /* Aligns the vertical center of the div with the center of the screen */
    transform: translateY(-50%);
    /* Centers all text inside the content div */
    text-align: center;
    /* Sets the main content text color to white */
    color: white;
}

.content h1
{
    /* Increases the font size for the main titles */
    font-size: 30px;
    /* Adds a gap above the heading */
    margin-top: 40px;
}


button
{
    /* Sets the button width */
    width: 200px;
    /* Adds vertical padding inside the button */
    padding: 15px 0;
    /* Centers the text inside the button */
    text-align: center;
    /* Adds margin around the button for spacing */
    margin: 20px 10px;
    /* Rounds the button corners into a pill shape */
    border-radius: 25px;
    /* Makes the button text bold */
    font-weight: bold;
    /* Adds a light border around the button */
    border: 2px solid beige;
    /* Removes default button background */
    background: transparent;
    /* Sets button text color to white */
    color: white;
    /* Changes cursor to a pointer when hovering */
    cursor: pointer;
    /* Necessary for the span overflow/z-index effect */
    position: relative;
    /* Ensures the sliding background doesn't show outside the button corners */
    overflow: hidden;
}

span
{
    /* Background color for the hover effect */
    background-color: #009688;
    /* Matches button height */
    height: 100%;
    /* Matches button width */
    width: 100%;
    /* Matches button rounded corners */
    border-radius: 25px;
    /* Positioned behind the button text */
    position: absolute;
    /* Starts from the left side */
    left: 0;
    /* Starts from the bottom */
    bottom: 0;
    /* Places the span behind the text content */
    z-index: -1;
    /* Smooth animation for the span appearance */
    transition: 0.5s;
}

button:hover span
{
    /* Ensures the span stays full width on hover */
    width: 100%;
}

button:hover
{
    /* Removes the border when hovering to let the span background take over */
    border: none;
}

.circle-container 
{
    /* Setting relative position for the animated shapes inside */
    position: relative;
    /* Fixed width for the animated circle area */
    width: 450px;
    /* Fixed height for the animated circle area */
    height: 450px;
    /* Centers the container horizontally */
    margin: auto;
    /* Uses flex to center the text content within the circles */
    display: flex;
    /* Horizontal centering */
    justify-content: center;
    /* Vertical centering */
    align-items: center;
}

.circle-container i 
{
    /* Positions the animated borders absolutely to overlap */
    position: absolute;
    /* Shorthand to stretch the element to all edges of the container */
    inset: 0;
    /* Creates the visible thin white border line */
    border: 2px solid white;
    /* Smooth transition for border changes */
    transition: 0.5s;
}

.circle-container i:nth-child(1) 
{
    /* Creates a unique organic blob shape using border-radius */
    border-radius: 49% 51% 73% 27% / 47% 30% 70% 53%;
    /* Applies the 'animate' rotation infinitely over 6 seconds */
    animation: animate 6s linear infinite;
}

.circle-container i:nth-child(2) 
{
    /* Creates a second unique organic blob shape */
    border-radius: 24% 76% 47% 53% / 63% 45% 55% 37%;
    /* Applies the 'animate' rotation infinitely over 4 seconds (faster) */
    animation: animate 4s linear infinite;
}

.circle-container i:nth-child(3) 
{
    /* Creates a third unique organic blob shape */
    border-radius: 24% 76% 31% 69% / 41% 63% 37% 59%;
    /* Applies the 'animate2' (reverse) rotation over 10 seconds */
    animation: animate2 10s linear infinite;
}

/* Keyframes for clockwise rotation */
@keyframes animate 
{
    /* Start state at 0 degrees */
    0% { transform: rotate(0deg); }
    /* End state at 360 degrees (full circle) */
    100% { transform: rotate(360deg); }
}

/* Keyframes for counter-clockwise rotation */
@keyframes animate2 
{
    /* Start state at 360 degrees */
    0% { transform: rotate(360deg); }
    /* End state at 0 degrees */
    100% { transform: rotate(0deg); }
}

.circle-container:hover i 
{
    /* Thickens the border on hover using the specific color variable */
    border: 6px solid var(--clr);
    /* Adds a glowing neon effect on hover */
    filter: drop-shadow(0 0 20px var(--clr));
}

.circle-content 
{
    /* Ensures the text sits on top of the moving circles */
    position: absolute;
    /* Higher z-index to stay above the 'i' tags */
    z-index: 10;
    /* Centers the text within the blobs */
    text-align: center;
    /* Sets the color of the text inside the circles */
    color: white;
}


</style>

</head>

<body>
    <div class="banner"> <div class="navbar">  <!-- Navigation Bar -->
            <ul> 
                <li><a href="AboutUs.php">About Us</a></li>
                <li><a href="ContactUs.php">Contact Us</a></li> <li><a href="HomePage.php">Log Out</a></li>
            </ul>

        </div>

        <div class="left-nav"> <!-- Side Navigation Bar -->

            <ul>
                <li><a href="AddNewBook.php">Add Books</a></li>
                <li><a href="RemoveBook.php">Remove Books</a></li>
                <li><a href="updateorder.php">Manage Orders</a></li>

            </ul>

        </div>

        <div class="content"> <!-- Main Content Area -->

            <div class="circle-container"> <!-- Animated Circle Borders -->

                <i style="--clr:#00ff0a;"></i>
                <i style="--clr:#ff0057;"></i> <!-- Pinkish Red Color -->
                <i style="--clr:#fffd44;"></i>

            <div class="circle-content">

            <h1>Fuel your Mind</h1>
            <h1>Feed your Imagination</h1>

        </div>
    </div>

</div>


    </div>
</body>

</html>