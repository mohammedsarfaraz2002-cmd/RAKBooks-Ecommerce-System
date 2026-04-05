<html>

<head>
    <title>Home Page</title> <!--title of this html code-->

    <!-- Makes the application responsive -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    padding: 35px 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.navbar ul 
{
    display: flex;
    width: 80%;
    justify-content: space-between;
}


.logo /*this is for the logo. you can click the logo*/
{
    width: 120px;
    cursor: pointer;
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
    background: beige;
    position: absolute;
    left: 0;
    bottom: -10px;
    transition: 0.5s;
}

.navbar ul li:hover::after /*when you hover over any of the links on the header, an underline will be displayed*/
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
    font-size: 70px;
    margin-top: 80px;
}

.content p
{
    margin: 20px auto;
    font-weight: 100;
    line-height: 25px;
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

</style>

</head>

<body>
    <div class="banner"> <!--this is the banner class-->
        <div class="navbar"> <!--this is for the header-->

            <ul> <!--this means an unordered list of items-->
                <li><a href="HomePage.php">Home</a></li>
                <li><a href="UserLogin.php">Login</a></li> <!--these are all external links the user can use on the header-->
                <li><a href="UserRegister.php">Register</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
                <li><a href="ContactUs.php">Contact Us</a></li>
            </ul>

        </div>

        <div class="content"> <!--this is the content class-->
            <h1>Where every story finds a home</h1> <!--introduction-->
            <p>RAK Books</p> <!--name of the school-->

            <div>
                <button type="button" onclick="window.location.href = 'UserLogin.php'; "><span></span>User Log-In</button>
                <button type="button" onclick="window.location.href = 'UserRegister.php'; "><span></span>User Register</button>
            </div>

        </div>

    </div>
</body>

</html>