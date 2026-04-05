<!DOCTYPE html>
<html lang="en"> <!--the specific language used for the content of the element's is english-->

<head> <!--this is the head class--> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title> <!--title of this html code-->

<style>

*
{
    /* Removes default margins */
    margin: 0;
    /* Removes default padding */
    padding: 0;
    /* Ensures padding/borders are included in element width calculation */
    box-sizing: border-box;
    /* Sets the global font to Poppins or a fallback sans-serif */
    font-family: 'Poppins', sans-serif;
}

/* Container for the entire contact section */
.contact
{
    /* Positioned relative to allow absolute positioning of child elements */
    position: relative;
    /* Sets height to at least 100% of the viewport height */
    min-height: 100vh;
    /* Internal spacing for the section */
    padding: 50px 100px;
    /* Flexbox used to center children */
    display: flex;
    /* Centers children horizontally */
    justify-content: center;
    /* Centers children vertically */
    align-items: center;
    /* Stacks elements vertically */
    flex-direction: column;
    /* Background image for the entire page */
    background: url(ContactUsBackground.jpg);
    /* Ensures the background image covers the whole area */
    background-size: cover;
}

/* Styling for the header text area */
.contact .content
{
    /* Limits width so text doesn't span too wide */
    max-width: 800px;
    /* Centers the text content */
    text-align: center;
}

/* Styling for the "Contact Us" heading */
.contact .content h2
{
    /* Sets header font size */
    font-size: 36px;
    /* Medium font thickness */
    font-weight: 500;
    /* White text color */
    color: white;
}

/* Styling for the introductory paragraph */
.contact .content p
{
    /* Medium font thickness */
    font-weight: 500;
    /* White text color */
    color: white;
}

/* Layout for the main content area (info boxes + form) */
.container
{
    /* Takes full width of the parent */
    width: 100%;
    /* Flexbox to arrange info and form side-by-side */
    display: flex;
    /* Centers content horizontally */
    justify-content: center;
    /* Aligns items vertically */
    align-items: center;
    /* Adds space between header and main content */
    margin-top: 30px;
}

/* Left side container for address, phone, and email */
.container .contactinfo
{
    /* Occupies 50% of the container width */
    width: 50%;
    /* Stacks the info boxes vertically */
    display: flex;
    /* Column orientation for flexbox */
    flex-direction: column;
}

/* Individual box for each contact detail (icon + text) */
.container .contactinfo .box
{
    /* Positioned relative for internal alignment */
    position: relative;
    /* Vertical padding between boxes */
    padding: 20px 0;
    /* Displays icon and text in a row */
    display: flex;
}

/* Circular icon container */
.container .contactinfo .box .icon
{
    /* Minimum width for the circle */
    min-width: 60px;
    /* Circle height */
    height: 60px;
    /* White circle background */
    background: white;
    /* Centers the ion-icon inside the circle */
    display: flex;
    /* Center horizontal */
    justify-content: center;
    /* Center vertical */
    align-items: center;
    /* Makes the box a perfect circle */
    border-radius: 50%;
    /* Icon size */
    font-size: 22px;
}

/* Text area inside the info box */
.container .contactinfo .box .text
{
    /* Enables flexbox for text stacking */
    display: flex;
    /* Gap between icon and text */
    margin-left: 20px;
    /* Text size */
    font-size: 16px;
    /* White text color */
    color: white;
    /* Stacks heading and info vertically */
    flex-direction: column;
    /* Light font weight */
    font-weight: 300;
}

/* Heading for the contact type (Address, Phone, Email) */
.container .contactinfo .box .text h3
{
    /* Medium font weight */
    font-weight: 500;
    /* Aquamarine color for highlight */
    color: aquamarine;
}

/* Right side white form container */
.contactform
{
    /* Occupies 40% of the container width */
    width: 40%;
    /* Internal spacing for the form */
    padding: 40px;
    /* Solid white background */
    background: white;
}

/* Heading inside the contact form */
.contactform h2
{
    /* Font size for form title */
    font-size: 30px;
    /* Blue-cyan color */
    color: aqua;
    /* Medium thickness */
    font-weight: 500;
}

/* Wrapper for input fields to handle floating labels */
.contactform .inputbox
{
    /* Relative positioning for the span label */
    position: relative;
    /* Spans full form width */
    width: 100%;
    /* Space between input fields */
    margin-top: 10px;
}

/* Input and Textarea styling */
.contactform .inputbox input, /*this is for both the input and the textarea*/
.contactform .inputbox textarea
{
    /* Spans full width of container */
    width: 100%;
    /* Padding for text entry */
    padding: 5px 0;
    /* Readable font size */
    font-size: 16px;
    /* Spacing around the field */
    margin: 10px 0;
    /* Removes all default borders */
    border: none;
    /* Adds a thin dark bottom line */
    border-bottom: 2px solid #333;
    /* Removes the browser's blue focus outline */
    outline: none;
    /* Prevents users from manually resizing the message box */
    resize: none;
}

/* Floating label styling (the 'span' text) */
.contactform .inputbox span
{
    /* Positioned absolutely over the input line */
    position: absolute;
    /* Align to left */
    left: 0;
    /* Match padding of input */
    padding: 5px 0;
    /* Default font size */
    font-size: 16px;
    /* Match margin of input */
    margin: 10px 0;
    /* Ensures mouse clicks go through the text to the input */
    pointer-events: none;
    /* Transition speed for the floating animation */
    transition: 0.5s;
    /* Initial gray color */
    color: grey;
}

/* Floating label animation trigger (Focus or Valid input) */
.contactform .inputbox input:focus ~ span,
.contactform .inputbox input:valid ~ span,
.contactform .inputbox textarea:focus ~ span,
.contactform .inputbox textarea:valid ~ span
{
    /* Changes label color to green-blue when active */
    color: aquamarine;
    /* Shrinks label size */
    font-size: 12px;
    /* Moves label up above the input line */
    transform: translateY(-20px);
}

/* Submit button styling */
.contactform .inputbox input[type="submit"]
{
    /* Spans full form width */
    width: 100%;
    /* Dark greenish blue background */
    background: cadetblue;
    /* White text color */
    color: white;
    /* Removes default border */
    border: none;
    /* Pointer cursor on hover */
    cursor: pointer;
    /* Padding for a thicker button */
    padding: 10px;
    /* Button text size */
    font-size: 18px;
}

/* Media Query for tablets and smaller screens (Max 991px) */
@media (max-width: 991px)
{
    .contact
    {
        /* Reduce section padding for smaller screens */
        padding: 50px;
    }

    .container
    {
        /* Stacks contact info on top of the form */
        flex-direction: column;
    }

    .container .contactinfo
    {
        /* Adds space below info before form starts */
        margin-bottom: 40px;
        /* Widens info to fill screen */
        width: 100%;
    }

    .contactform
    {
        /* Widens form to fill screen */
        width: 100%;
    }
}

</style>

</head>

<body>   

    <section class="contact">

        <div class="content">
            <h2>Contact Us</h2>
            <p>If we are ever unavailable to attend your calls, we can always reply to your messages</p>
        </div>

        <div class="container"> 

            <div class="contactinfo">

                <div class="box">
                    <div class="icon"><ion-icon name="pin-outline"></ion-icon></div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>Seih Al Quisdat Road,<br>Ras-Al-Khaimah City, RAK <br>1234</p>
                    </div>
                </div>

                <div class="box">
                    <div class="icon"><ion-icon name="call-outline"></ion-icon></div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>+971 123 456 789</p>
                    </div>
                </div>

                <div class="box">
                    <div class="icon"><ion-icon name="mail-outline"></ion-icon></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>RAKBOOKS@Bookshop.ae</p>
                    </div>
                </div>

            </div>
            
            <div class="contactform">
                <form>
                    <h2>Send Us A Message</h2>

                    <div class="inputbox">
                        <input type="text" name='' required="required">
                        <span>Full Name</span>
                    </div>

                    <div class="inputbox">
                        <input type="text" name='' required="required">
                        <span>Email Address</span>
                    </div>

                    <div class="inputbox">
                        <textarea required="required"></textarea>
                        <span>Please Write Your Message</span>
                    </div>

                    <div class="inputbox">
                        <input type="Submit" name="" value="Send">
                    </div>

                </form>
            </div>

        </div>
    </section>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script> //this is to make sure the user gets a confirmation message when they submit the form 
        const form = document.querySelector("form");

        form.addEventListener("submit", function(event) 
        {
            event.preventDefault(); // prevent page refresh

            // Check if all fields are valid using HTML's built-in validation
            if (form.checkValidity()) 
            {
            alert("Your message has been received.");
            form.reset(); 
            }
        });
    </script>


</body>