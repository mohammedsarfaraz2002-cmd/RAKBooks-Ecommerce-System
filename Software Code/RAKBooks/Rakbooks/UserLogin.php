<!DOCTYPE html>
<html lang="en"> <!--the specific language used for the content of the element's is english-->

<head>
    <meta charset="UTF-8">
    <title>User Login</title> <!--title of this html code-->

<style>

*
{
margin: 0;
padding: 0;
box-sizing : border-box;
font-family: 'Poppins', sans-serif;
}

body /*this is for the body of the website*/
{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: beige;
}

.box /*this is the style of the box in the middle*/
{
    position: relative;
    width: 380px;
    height: 420px;
    background: bisque;
    border-radius: 8px;
    overflow: hidden;
}

.box::before
{
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 380px;
    height: 420px;
    background: linear-gradient(0deg, transparent, transparent, #ff2770, #ff2770, #ff2770);
    z-index: 1;
    transform-origin: bottom right;
    animation: animate 6s linear infinite;
}

.box::after
{
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 380px;
    height: 420px;
    background: linear-gradient(0deg, transparent, transparent, #ff2770, #ff2770, #ff2770);
    z-index: 1;
    transform-origin: bottom right;
    animation: animate 6s linear infinite;
    animation-delay: -3s;
}

.borderline
{
    position: absolute;
    top: 0;
    inset: 0;
}

.borderline::before
{
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 380px;
    height: 420px;
    background: linear-gradient(0deg, transparent, transparent, #ff2770, #ff2770, #ff2770);
    z-index: 1;
    transform-origin: bottom right;
    animation: animate 6s linear infinite;
    animation-delay: -1.5s;
}

.borderline::after
{
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 380px;
    height: 420px;
    background: linear-gradient(0deg, transparent, transparent, #ff2770, #ff2770, #ff2770);
    z-index: 1;
    transform-origin: bottom right;
    animation: animate 6s linear infinite;
    animation-delay: -4.5s;
}


@keyframes animate
{
    0%
    {
        transform: rotate(0deg);
    }
    100%
    {
        transform: rotate(360deg);
    }
}

.box form
{
    position: absolute;
    inset: 4px;
    background: turquoise;
    padding: 50px 40px;
    border-radius: 8px;
    z-index: 2;
    display: flex;
    flex-direction: column;
}

.box form h2 /*this si for the heading*/
{
    color: white;
    font-weight: 500;
    text-align: center;
    letter-spacing: 0.1em;
}


.box form .inputbox
{
    position: relative;
    width: 300px;
    margin-top: 35px;
}

.box form .inputbox input
{
    position: relative;
    width: 100%;
    padding: 20px 10px 10px;
    background: transparent;
    outline: none;
    border: none;
    box-shadow: none;
    color: #23242a;
    font-size: 1em;
    letter-spacing: 0.05em;
    transition: 0.5s;
    z-index: 10;
}

.box form .inputbox span
{
    position: absolute;
    left: 0;
    padding: 20px 0px 10px;
    pointer-events: none;
    color: #8f8f8f;
    font-size: 1em;
    letter-spacing: 0.05em;
    transition: 0.5s;
}

.box form .inputbox input:valid ~ span,
.box form .inputbox input:focus ~ span
{
    color: white;
    font-size: 0.75em;
    transform: translateY(-34px);
}

.box form .inputbox i
{
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 2px;
    background: white;
    border-radius: 4px;
    overflow: hidden;
    transition: 0.5s;
    pointer-events: none;
}

.box form .inputbox input:valid ~ i,
.box form .inputbox input:focus ~ i
{
    height: 44px;
}

.box form .links
{
    display: flex;
    justify-content: space-between;
}

.box form .links a
{
    margin: 10px 0;
    font-size: 0.75em;
    color: #8f8f8f;
    text-decoration: none;
}

.box form .links a:hover,
.box form .links a:nth-child(2)
{
    color: white;
}

.box form input[type="submit"]
{
    border: none;
    outline: none;
    padding: 9px 25px;
    background: white;
    cursor: pointer;
    font-size: 0.9em;
    border-radius: 4px;
    font-weight: 600;
    width: 100px;
    margin-top: 10px;
}

.box form inputbox ion-icon /*this is for the icon images of email and password*/
{
    position: absolute;
    right: 8px; 
    color: #fff;
    font-size: 1.2em;
    top: 10px;
}

.box form input[type="submit"]:active
{
    opacity: 0.8;
}

.button-link 
{
    border: none;
    outline: none;
    padding: 9px 25px;
    background: white;
    cursor: pointer;
    font-size: 0.9em;
    border-radius: 4px;
    font-weight: 600;
    width: 100px;
    margin-top: 10px;
}

.button-link:hover:active 
{
    opacity: 0.8;
}

</style>

</head>

<body>
    <div class="box">
        <span class="borderline"></span> <!--this is for the effects of the border-->
        <form action="UserLoginProcess.php" method="post"> <!--this code valides the login process-->
            <h2>User Log-In</h2> <!--log in heading-->

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
                <a href="AdminLogin.php">Admin Login</a>
                <a href="UserRegister.php">User Register</a>
            </div>

            <input type="submit" class="button-container button-link" value="Login" name="submit">

        </form>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script> <!--this is to access the icon pictures-->
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> <!--installition is not required-->
    
</body>
