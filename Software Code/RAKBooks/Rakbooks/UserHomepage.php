<html>

<head>
    <title>User HomePage</title> <!--title of this html code-->

    <!-- Makes the application responsive -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Ionicons CDN for cart icon -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<style>

*
{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
}

.banner /*this is for the enitre background of the home page*/
{ /*image of the home page is saved in the folder*/
    width: 100%;
    height: 100%;
    background-image: linear-gradient( rgba(0,0,0,0.75), rgba(0,0,0,0.75) ), url(HomePageBackground.jpg);
    background-size: cover;
    background-position: center;
}

.navbar /*this is for the entire header*/
{
    width: 85%;
    margin: auto;
    padding: 35px 0;
    display: flex;
    align-items: center;
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
    list-style: none;
    display: inline-block;
    margin: 0 20px;
    position: relative;
}

.navbar ul li a /*the links of the header*/
{
    text-decoration: none;
    color: white;
    text-transform: uppercase;
}

.navbar ul li::after /*this is to make the underline on the links of the header*/
{
    content: '';
    height: 3px;
    width: 0;
    background: white;
    position: absolute;
    left: 0;
    bottom: -10px;
    transition: 0.5s;
}

.navbar ul li:hover::after /*when you hover over any of the links on the header, an underline will be displayed*/
{
    width: 100%;
}

.left-nav 
{
    /* Fixed position keeps it in place even if content scrolls */
    position: fixed; 
    left: 0;
    width: 200px; /* Adjust width as needed */
    z-index: 100; /* Ensures it stays above the banner */
    
    /* Centering the entire bar vertically (middle-middle of the screen) */
    top: 50%;
    transform: translateY(-50%); 
    
    
}

.left-nav ul 
{
    list-style: none;
    text-align: center;
}

.left-nav ul li 
{
    margin: 50px 0;
    position: relative;
}

.left-nav ul li a 
{
    text-decoration: none;
    color: white;
    text-transform: uppercase;
    font-size: 14px;
    padding: 10px;
    display: block; /* Makes the entire block clickable */
    transition: 0.3s;
}

.left-nav ul li a:hover 
{
    color: white; /* Highlight color on hover */
    background: rgba(255, 255, 255, 0.1);
}

.left-nav ul li::after 
{
    content: '';
    height: 3px;
    width: 0; /* Starts at zero width (invisible) */
    background: white; /* Using the button hover color */
    position: absolute;
    left: 0;
    bottom: -5px; /* Adjust this value to set the distance below the text */
    transition: 0.5s;
}

.left-nav ul li:hover::after 
{
    width: 100%;
}

.content
{
    width: 100%;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    text-align: center;
    color: white;
}

.content h1
{
    font-size: 30px;
    margin-top: 40px;
}


button
{
    width: 200px;
    padding: 15px 0;
    text-align: center;
    margin: 20px 10px;
    border-radius: 25px;
    font-weight: bold;
    border: 2px solid beige;
    background: transparent;
    color: white;
    cursor: pointer;
    position: relative;
    overflow: hidden;
}

span
{
    background-color: #009688;
    height: 100%;
    width: 100%;
    border-radius: 25px;
    position: absolute;
    left: 0;
    bottom: 0;
    z-index: -1;
    transition: 0.5s;
}

button:hover span
{
    width: 100%;
}

button:hover
{
    border: none;
}

.circle-container 
{
    position: relative;
    width: 450px;
    height: 450px;
    margin: auto;
    display: flex;
    justify-content: center;
    align-items: center;
}

.circle-container i 
{
    position: absolute;
    inset: 0;
    border: 2px solid white;
    transition: 0.5s;
}

.circle-container i:nth-child(1) 
{
    border-radius: 49% 51% 73% 27% / 47% 30% 70% 53%;
    animation: animate 6s linear infinite;
}

.circle-container i:nth-child(2) 
{
    border-radius: 24% 76% 47% 53% / 63% 45% 55% 37%;
    animation: animate 4s linear infinite;
}

.circle-container i:nth-child(3) 
{
    border-radius: 24% 76% 31% 69% / 41% 63% 37% 59%;
    animation: animate2 10s linear infinite;
}

@keyframes animate 
{
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@keyframes animate2 
{
    0% { transform: rotate(360deg); }
    100% { transform: rotate(0deg); }
}

.circle-container:hover i 
{
    border: 6px solid var(--clr);
    filter: drop-shadow(0 0 20px var(--clr));
}

.circle-content 
{
    position: absolute;
    z-index: 10;
    text-align: center;
    color: white;
}


</style>

</head>

<body>
    <div class="banner"> <!--this is the banner class-->
        <div class="navbar"> <!--this is for the header-->

            <ul> <!--this means an unordered list of items-->
                <li><a href="AboutUs.php">About Us</a></li>
                <li><a href="ContactUs.php">Contact Us</a></li> <!--these are all external links the user can use on the header-->
                <li><a href="HomePage.php">Log Out</a></li>
            </ul>

            <li>
                <a href="cart.php" title="View Cart">
                    <ion-icon name="cart-outline" style="font-size: 30px; vertical-align: middle; color: white;"></ion-icon>
                </a>
            </li>


        </div>

        <div class="left-nav">

            <ul>
                <li><a href="BookSupplier.php">Browse Books</a></li>
                <li><a href="trackorder.php">Track Order</a></li>
            </ul>

        </div>

        <div class="content">

            <div class="circle-container">

                <i style="--clr:#00ff0a;"></i>
                <i style="--clr:#ff0057;"></i>
                <i style="--clr:#fffd44;"></i>

            <div class="circle-content">

            <h1>Fuel your Mind</h1>
            <h1>Feed your Imagination</h1>

            <button type="button" onclick="window.location.href = 'BookSupplier.php'; ">
                <span></span>Start Browsing
            </button>

        </div>
    </div>

</div>


    </div>
</body>

</html>