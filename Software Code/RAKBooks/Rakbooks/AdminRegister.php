<!DOCTYPE html>
<html lang="en"> <!--the specific language used for the content of the element's is english-->

<head> <!--this is the head class--> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title> <!--title of this html code-->

<style>

*
{
    /* Removes default browser padding */
    padding: 0;
    /* Removes default browser margins */
    margin: 0;
    /* Sets the default font style */
    font-family: sans-serif;
    /* Includes border and padding within the element's total width/height */
    box-sizing: border-box;
}

body /*this is for the body*/
{
    /* Enables flexbox for easy centering of the form */
    display: flex;
    /* Centers the form container horizontally */
    justify-content: center;
    /* Centers the form container vertically */
    align-items: center;
    /* Sets the body height to 100% of the screen height */
    height: 100vh;
    /* Creates a soft gradient background from light pink to muted blue */
    background-image: linear-gradient(#E8CBC0, #636FA4);
}

.Container /*this is for the container class*/
{
    /* Sets the maximum width the form can grow to */
    max-width: 650px;
    /* Adds internal space between the border and the content */
    padding: 28px;
    /* Adds a margin on the left and right for mobile spacing */
    margin: 0 28px;
    /* Rounds the corners of the form card */
    border-radius: 10px;
    /* Prevents content from spilling outside the rounded corners */
    overflow: hidden;
    /* Transparent black background to create a frosted glass effect */
    background: rgba(0,0,0,0.2);
    /* Adds a dark shadow to make the form pop out from the background */
    box-shadow: 0 15px 20px rgba(0,0,0,0.6);
}

h2 /*this is for the heading, "register as a student" */
{
    /* Sets the font size of the title */
    font-size: 26px;
    /* Makes the title bold */
    font-weight: bold;
    /* Aligns the text to the center of the container */
    text-align: center;
    /* Sets the title color to white */
    color: white;
    /* Space between the text and the bottom border line */
    padding-bottom: 8px;
    /* Adds a thin separator line under the heading */
    border-bottom: 1px solid silver;
}

.content
{
    /* Uses flexbox to arrange input fields side-by-side */
    display: flex;
    /* Allows inputs to wrap to the next line if there isn't enough space */
    flex-wrap: wrap;
    /* Distributes the input boxes evenly across the container */
    justify-content: space-between;
    /* Adds vertical padding to the content area */
    padding: 20px 0;
}

.input-box /*this is for the input box*/
{
    /* Uses flex for the label and input positioning */
    display: flex;
    /* Allows elements inside to wrap */
    flex-wrap: wrap;
    /* Sets the width to 50% so two inputs sit on one row */
    width: 50%;
    /* Adds a vertical gap between rows of inputs */
    padding-bottom: 15px;
}

/* Specific styling for every second input box (right column) */
.input-box:nth-child(2n)
{
    /* Aligns the content of the right-side boxes to the end */
    justify-content: end;
}

.input-box label, .gender-title /*this si for the labels of the gender title*/
{
    /* Sets the width of the label */
    width: 95%;
    /* Sets label text to white */
    color: white;
    /* Makes labels bold for better visibility */
    font-weight: bold;
    /* Adds small vertical spacing around the labels */
    margin: 5px 0;
}

.gender-title /*this is for the gender title*/
{
    /* Sets the specific font size for the Gender heading */
    font-size: 16px;
}

.input-box input
{
    /* Sets a fixed height for the text entry boxes */
    height: 40px;
    /* Makes input fill 95% of its container to leave a small gap */
    width: 95%;
    /* Padding inside the input box for the text */
    padding: 0 10px;
    /* Slightly rounds the input box corners */
    border-radius: 5px;
    /* Adds a light gray border around inputs */
    border: 1px solid #ccc;
    /* Removes the default focus ring from browsers */
    outline: none;
}

/* Adds a small shadow effect when an input is clicked or has text in it */
.input-box input:is(:focus,:valid)
{
    /* Creates a subtle glow/shadow effect */
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
}

.gender-catergory label
{
    /* Adds spacing between the radio button and the label text */
    padding: 0 20px 0 5px;
    /* Sets the size for the 'Male/Female/Other' text */
    font-size: 14px;
}

.gender-catergory
{
    /* Sets the color of the gender section text */
    color: gainsboro;
}

.gender-catergory label, .gender-catergory input
{
    /* Changes the mouse cursor to a pointer for the selection area */
    cursor: pointer;
}

.button-container
{
    /* Adds vertical margin around the submit button area */
    margin: 15px 0;
}

.button-container button /*this is for the register button*/
{
    /* Makes the button span the full width of the form */
    width: 100%;
    /* Adds space between the inputs and the button */
    margin-top: 10px;
    /* Sets the internal thickness of the button */
    padding: 10px;
    /* Ensures the button behaves as a block element */
    display: block;
    /* Increases the size of the button text */
    font-size: 20px;
    /* Sets button text color to white */
    color: white;
    /* Removes default button borders */
    border: none;
    /* Rounds the button corners */
    border-radius: 5px;
    /* Applies a horizontal color gradient matching the background */
    background-image: linear-gradient(to right, #E8CBC0, #636FA4);
    /* Indicates the button is clickable */
    cursor: pointer;
    /* Smooths out the color change transition on hover */
    transition: 0.3s;
}

/* Changes the gradient direction when the mouse hovers over the button */
.button-container button:hover
{
    /* Swaps the gradient colors for a visual effect */
    background-image: linear-gradient(to right, #636FA4, #E8CBC0);
}

/* Media query for screens smaller than 600px (mobile responsiveness) */
@media(max-width:600px)
{
    .Container
    {
        /* Adjusts the minimum width for mobile devices */
        min-width: 280px;
    }

    .content
    {
        /* Allows the form fields to scroll if the screen is very small */
        min-width: 380px;
        /* Enables scrollbars if content overflows */
        overflow: auto;
    }

    .input-box
    {
        /* Adds more space below inputs in mobile view */
        margin-bottom: 12px;
        /* Makes each input box take the full width (stacking them vertically) */
        width: 100%;
    }

    .input-box:nth-child(2n)
    {
        /* Resets the alignment for the second column on mobile */
        justify-content: space-between;
    }

    .gender-catergory
    {
        /* Displays gender options side-by-side on mobile */
        display: flex;
        /* Spaces out the Male/Female options */
        justify-content: space-between;
        /* Limits width of the gender row on mobile */
        width: 60%;
    }

    /* Hides the scrollbar inside the content area for a cleaner look */
    .content::-webkit-scrollbar
    {
        /* Sets scrollbar width to zero */
        width: 0;
    }
}

</style>

</head>

<body> <!--this is the body class. most of the codes will be here-->
    <div class="Container"> <!--this block level tag to contain all the required codes-->

        <form action="AdminRegisterConfirmed.php" method="post"> <!--this will add the new user into the database-->

            <h2>Register as a new Admin</h2> <!--heading for student registration-->

            <div class="content"> <!--this is the content class. all the coding regarding registration will be here-->

                <div class="input-box"> <!--this is an input box-->
                    <label for="fullname">Full Name</label> <!--this is the label next to the input box-->
                    <input type="text" placeholder="Enter Full Name" name="fullname" required>
                </div>

                <div class="input-box"> <!--this is an input box-->
                    <label for="address">Address</label> <!--this is the label next to the input box-->
                    <input type="text" placeholder="Enter Address" name="address" required> <!--this is written inside the inputbox-->
                </div>

                <div class="input-box"> <!--this is an input box-->
                    <label for="email">Email</label> <!--this is the label next to the input box-->
                    <input type="email" placeholder="Enter Valid Email" name="email" required> <!--this is written inside the inputbox-->
                </div>
    
                <div class="input-box"> <!--this is an input box-->
                    <label for="phonenumber">Phone Number</label> <!--this is the label next to the input box-->
                    <input type="tel" placeholder="Enter Phone Number" name="phonenumber" required> <!--this is written inside the inputbox-->
                </div>
    
                <div class="input-box"> <!--this is an input box-->
                    <label for="password">Password</label> <!--this is the label next to the input box-->
                    <input type="password" placeholder="Enter your Password" name="password" required> <!--this is written inside the inputbox-->
                </div>

                <span class="gender-title">Gender</span> <!--this is an inline class for the title gender-->

                <div class="gender-catergory"> <!--this block level tag is for the gender catergory-->
                    <input type="radio" name="gender" id="male" value="male">
                    <label for="male">Male</label> <!--this is a button for male-->

                    <input type="radio" name="gender" id="female" value="female">
                    <label for="female">Female</label> <!--this is a button for female-->

                    <input type="radio" name="gender" id="other" value="other">
                    <label for="other">Other</label> <!--this is a button for other-->
                </div>

            </div>

            <div class="button-container"> <!--this block level tag is for the button container-->
                <button type="submit" name="register_submit">Register Now</button> <!--this is a button for register-->
            </div>

        </form>

    </div>
</body>