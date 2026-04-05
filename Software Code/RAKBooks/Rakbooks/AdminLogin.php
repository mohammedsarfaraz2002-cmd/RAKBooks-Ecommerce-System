<!DOCTYPE html>
<html lang="en"> <!--the specific language used for the content of the element's is english-->

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title> <!--title of this html code-->

<style>

*
{
/* Removes default margin */
margin: 0;
/* Removes default padding */
padding: 0;
/* Ensures padding and border are included in total width/height */
box-sizing : border-box;
/* Sets the font family to Poppins with a sans-serif fallback */
font-family: 'Poppins', sans-serif;
}

/* Styles the main body area */
body /*this is for the body of the website*/
{
    /* Uses flexbox to position the login box */
    display: flex;
    /* Horizontally centers the login box */
    justify-content: center;
    /* Vertically centers the login box */
    align-items: center;
    /* Sets body height to the full height of the viewport */
    min-height: 100vh;
    /* Background color of the entire page */
    background: beige;
}

/* Styles the main login card container */
.box /*this is the style of the box in the middle*/
{
    /* Position relative to allow absolute positioning of animated borders inside */
    position: relative;
    /* Width of the login box */
    width: 380px;
    /* Height of the login box */
    height: 420px;
    /* Background color of the card */
    background: bisque;
    /* Rounds the corners of the login box */
    border-radius: 8px;
    /* Hides any animated elements that move outside the box boundaries */
    overflow: hidden;
}

/* Creates the first animated colored strip */
.box::before
{
    /* Required for pseudo-elements to render */
    content: '';
    /* Positioned absolutely within the box */
    position: absolute;
    /* Positions the top edge */
    top: -50%;
    /* Positions the left edge */
    left: -50%;
    /* Sets width larger than box to allow for rotation */
    width: 380px;
    /* Sets height larger than box to allow for rotation */
    height: 420px;
    /* Creates the glowing pink color effect */
    background: linear-gradient(0deg, transparent, transparent, #ff2770, #ff2770, #ff2770);
    /* Places the color behind the form content */
    z-index: 1;
    /* Sets the pivot point for rotation to the bottom right */
    transform-origin: bottom right;
    /* Triggers the 6-second infinite rotation animation */
    animation: animate 6s linear infinite;
}

/* Creates the second animated colored strip for a continuous line effect */
.box::after
{
    /* Required for pseudo-elements to render */
    content: '';
    /* Positioned absolutely within the box */
    position: absolute;
    /* Positions the top edge */
    top: -50%;
    /* Positions the left edge */
    left: -50%;
    /* Sets width same as the before element */
    width: 380px;
    /* Sets height same as the before element */
    height: 420px;
    /* Background color gradient same as before */
    background: linear-gradient(0deg, transparent, transparent, #ff2770, #ff2770, #ff2770);
    /* Places the color behind the form content */
    z-index: 1;
    /* Sets the pivot point for rotation to the bottom right */
    transform-origin: bottom right;
    /* Triggers the 6-second infinite rotation animation */
    animation: animate 6s linear infinite;
    /* Delays the animation by 3 seconds to offset it from the first strip */
    animation-delay: -3s;
}

/* Container for additional animated border lines */
.borderline
{
    /* Positioned absolutely to fill the box */
    position: absolute;
    /* Aligns to the top edge */
    top: 0;
    /* Shorthand to stretch to all edges of the box */
    inset: 0;
}

/* Creates a third rotating strip for a more complex light effect */
.borderline::before
{
    /* Required content property */
    content: '';
    /* Positioned absolutely within the borderline div */
    position: absolute;
    /* Positions top edge at 50% offset */
    top: -50%;
    /* Positions left edge at 50% offset */
    left: -50%;
    /* Sets width to match box width */
    width: 380px;
    /* Sets height to match box height */
    height: 420px;
    /* Pink color gradient */
    background: linear-gradient(0deg, transparent, transparent, #ff2770, #ff2770, #ff2770);
    /* Stays behind the form */
    z-index: 1;
    /* Sets rotation pivot point */
    transform-origin: bottom right;
    /* Triggers the rotation animation */
    animation: animate 6s linear infinite;
    /* Offsets start time by 1.5 seconds */
    animation-delay: -1.5s;
}

/* Creates a fourth rotating strip */
.borderline::after
{
    /* Required content property */
    content: '';
    /* Absolute positioning */
    position: absolute;
    /* Offsets for rotation radius */
    top: -50%;
    /* Offsets for rotation radius */
    left: -50%;
    /* Matches box width */
    width: 380px;
    /* Matches box height */
    height: 420px;
    /* Pink color gradient */
    background: linear-gradient(0deg, transparent, transparent, #ff2770, #ff2770, #ff2770);
    /* Stays behind the form */
    z-index: 1;
    /* Sets rotation pivot point */
    transform-origin: bottom right;
    /* Triggers the rotation animation */
    animation: animate 6s linear infinite;
    /* Offsets start time by 4.5 seconds */
    animation-delay: -4.5s;
}


/* Defines the keyframes for the spinning animation */
@keyframes animate
{
    /* Starting state of the rotation */
    0%
    {
        /* Rotation at zero degrees */
        transform: rotate(0deg);
    }
    /* Ending state of the rotation */
    100%
    {
        /* Full 360-degree rotation */
        transform: rotate(360deg);
    }
}

/* Styles the actual login form sitting inside the box */
.box form
{
    /* Positions the form on top of the moving borders */
    position: absolute;
    /* Creates a 4px gap from the edge to reveal the animated border */
    inset: 4px;
    /* Solid background color of the form area */
    background: turquoise;
    /* Adds internal spacing for form fields */
    padding: 50px 40px;
    /* Matches the container's rounded corners */
    border-radius: 8px;
    /* Ensures the form stays above the animated layers */
    z-index: 2;
    /* Uses flexbox to stack inputs vertically */
    display: flex;
    /* Arranges children in a column */
    flex-direction: column;
}

/* Styles the main Log-In heading */
.box form h2 /*this si for the heading*/
{
    /* White text color for the title */
    color: white;
    /* Medium font weight for the title */
    font-weight: 500;
    /* Centers the heading text */
    text-align: center;
    /* Increases space between letters for a clean look */
    letter-spacing: 0.1em;
}


/* Container for individual input fields and labels */
.box form .inputbox
{
    /* Position relative for the floating label (span) and bottom line (i) */
    position: relative;
    /* Sets the width of the input group */
    width: 300px;
    /* Adds space above each input section */
    margin-top: 35px;
}

/* Styles for the text and password input fields */
.box form .inputbox input
{
    /* Position relative to sit above the label span */
    position: relative;
    /* Input takes up full width of the container */
    width: 100%;
    /* Padding to position text correctly (top, left/right, bottom) */
    padding: 20px 10px 10px;
    /* Transparent background to show the turquoise underneath */
    background: transparent;
    /* Removes the browser's default focus outline */
    outline: none;
    /* Removes the default input border */
    border: none;
    /* Removes any default browser box shadow */
    box-shadow: none;
    /* Dark text color for what the user types */
    color: #23242a;
    /* Sets the font size */
    font-size: 1em;
    /* Spacing between typed letters */
    letter-spacing: 0.05em;
    /* Smooth transition for interactions */
    transition: 0.5s;
    /* Ensures the input stays on top for clicking */
    z-index: 10;
}

/* Styles for the floating labels (Email/Password text) */
.box form .inputbox span
{
    /* Positioned absolutely inside the inputbox div */
    position: absolute;
    /* Aligned to the left */
    left: 0;
    /* Initial padding to match the input text position */
    padding: 20px 0px 10px;
    /* Ensures clicks go through the label to the input field */
    pointer-events: none;
    /* Gray color for the inactive label */
    color: #8f8f8f;
    /* Default font size */
    font-size: 1em;
    /* Spacing between label letters */
    letter-spacing: 0.05em;
    /* Smooth transition when the label moves up */
    transition: 0.5s;
}

/* Animation for the label when input is valid or focused */
.box form .inputbox input:valid ~ span,
.box form .inputbox input:focus ~ span
{
    /* Changes label color to white */
    color: white;
    /* Shrinks the label text size */
    font-size: 0.75em;
    /* Moves the label upward out of the way of the typed text */
    transform: translateY(-34px);
}

/* Styles for the decorative line under the inputs */
.box form .inputbox i
{
    /* Positioned at the bottom of the input container */
    position: absolute;
    /* Aligned to the left */
    left: 0;
    /* Aligned to the bottom */
    bottom: 0;
    /* Takes up the full width of the input */
    width: 100%;
    /* Initial height of the thin line */
    height: 2px;
    /* White color for the line */
    background: white;
    /* Slightly rounded corners for the line */
    border-radius: 4px;
    /* Hides overflow */
    overflow: hidden;
    /* Smooth transition when the line grows */
    transition: 0.5s;
    /* Prevents the line from interfering with clicks */
    pointer-events: none;
}

/* Animation for the bottom line (i) when input is valid or focused */
.box form .inputbox input:valid ~ i,
.box form .inputbox input:focus ~ i
{
    /* Increases height to create a filled background effect for the input */
    height: 44px;
}

/* Container for the navigation links */
.box form .links
{
    /* Uses flexbox to space links apart */
    display: flex;
    /* Pushes one link to the left and one to the right */
    justify-content: space-between;
}

/* Styles for the individual links */
.box form .links a
{
    /* Vertical spacing for links */
    margin: 10px 0;
    /* Smaller font size for secondary links */
    font-size: 0.75em;
    /* Gray color for links */
    color: #8f8f8f;
    /* Removes default underline */
    text-decoration: none;
}

/* Link hover effects and styling for specific links */
.box form .links a:hover,
.box form .links a:nth-child(2)
{
    /* Changes link color to white on hover or for the second link */
    color: white;
}

/* Styles for the submit button */
.box form input[type="submit"]
{
    /* Removes default button border */
    border: none;
    /* Removes default focus outline */
    outline: none;
    /* Padding inside the button */
    padding: 9px 25px;
    /* White background for the button */
    background: white;
    /* Pointer cursor on hover */
    cursor: pointer;
    /* Text size for the button label */
    font-size: 0.9em;
    /* Rounds the button corners */
    border-radius: 4px;
    /* Bold font for button text */
    font-weight: 600;
    /* Sets the width of the button */
    width: 100px;
    /* Adds spacing above the button */
    margin-top: 10px;
}

/* Styles for icons inside the input box */
.box form inputbox ion-icon /*this is for the icon images of email and password*/
{
    /* Positioned absolutely inside the group */
    position: absolute;
    /* Aligned to the right side of the input */
    right: 8px; 
    /* White color for the icon */
    color: #fff;
    /* Font size for the icon image */
    font-size: 1.2em;
    /* Vertical positioning */
    top: 10px;
}

/* Visual feedback when clicking the submit button */
.box form input[type="submit"]:active
{
    /* Slightly dims the button when pressed */
    opacity: 0.8;
}

/* Shared style class for button-like links */
.button-link 
{
    /* No border */
    border: none;
    /* No outline */
    outline: none;
    /* Internal spacing */
    padding: 9px 25px;
    /* Background color */
    background: white;
    /* Pointer cursor */
    cursor: pointer;
    /* Font size */
    font-size: 0.9em;
    /* Rounded corners */
    border-radius: 4px;
    /* Bold text */
    font-weight: 600;
    /* Width of the link-button */
    width: 100px;
    /* Vertical margin */
    margin-top: 10px;
}

/* Active click state for the button-link class */
.button-link:hover:active 
{
    /* Dims the button when clicked */
    opacity: 0.8;
}

</style>

</head>

<body>
    <div class="box">
        <span class="borderline"></span> <!--this is for the effects of the border-->
        <form action="AdminLoginProcess.php" method="post"> <!--this code valides the login process-->
            <h2>Admin Log-In</h2> <!--log in heading-->

            <div class="inputbox"> <!--input box for user to type-->
                <ion-icon name="mail-outline"></ion-icon> <!--this is an image of a email icon-->
                <input type="text" required="required" name="email"> <!--this is so user can type email-->
                <span>Email</span> <!--this will be displayed-->
                <i></i>
            </div>

            <div class="inputbox"> <!--input box for user to type-->
                <ion-icon name="lock-closed-outline"></ion-icon> <!--this is an image of a lock icon-->
                <input type="password" required="required" name="password"> <!--the password typed will look like dots-->
                <span>Password</span> <!--this will be displayed-->
                <i></i>
            </div>

            <div class="links"> <!--links to click if the user needs it-->
                <a href="AdminRegister.php">Admin Register</a>
                <a href="UserLogin.php">User Login</a>
            </div>

            <input type="submit" class="button-container button-link" value="Login" name="submit">

        </form>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> <!--this is to access the icon pictures-->
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> <!--installition is not required-->
    
</body>
