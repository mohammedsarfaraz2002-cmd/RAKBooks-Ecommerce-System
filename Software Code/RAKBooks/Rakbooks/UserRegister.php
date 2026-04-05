<!DOCTYPE html>
<html lang="en"> <!--the specific language used for the content of the element's is english-->

<head> <!--this is the head class--> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Register</title> <!--title of this html code-->

<style>

*
{
    padding: 0;
    margin: 0;
    font-family: sans-serif;
    box-sizing: border-box;
}

body /*this is for the body*/
{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-image: linear-gradient(#E8CBC0, #636FA4);
}

.Container /*this is for the container class*/
{
    max-width: 650px;
    padding: 28px;
    margin: 0 28px;
    border-radius: 10px;
    overflow: hidden;
    background: rgba(0,0,0,0.2);
    box-shadow: 0 15px 20px rgba(0,0,0,0.6);
}

h2 /*this is for the heading, "register as a student" */
{
    font-size: 26px;
    font-weight: bold;
    text-align: center;
    color: white;
    padding-bottom: 8px;
    border-bottom: 1px solid silver;
}

.content
{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    padding: 20px 0;
}

.input-box /*this is for the input box*/
{
    display: flex;
    flex-wrap: wrap;
    width: 50%;
    padding-bottom: 15px;
}

.input-box:nth-child(2n)
{
    justify-content: end;
}

.input-box label, .gender-title /*this si for the labels of the gender title*/
{
    width: 95%;
    color: white;
    font-weight: bold;
    margin: 5px 0;
}

.gender-title /*this is for the gender title*/
{
    font-size: 16px;
}

.input-box input
{
    height: 40px;
    width: 95%;
    padding: 0 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    outline: none;
}

.input-box input:is(:focus,:valid)
{
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
}

.gender-catergory label
{
    padding: 0 20px 0 5px;
    font-size: 14px;
}

.gender-catergory
{
    color: gainsboro;
}

.gender-catergory label, .gender-catergory input
{
    cursor: pointer;
}

.button-container
{
    margin: 15px 0;
}

.button-container button /*this is for the register button*/
{
    width: 100%;
    margin-top: 10px;
    padding: 10px;
    display: block;
    font-size: 20px;
    color: white;
    border: none;
    border-radius: 5px;
    background-image: linear-gradient(to right, #E8CBC0, #636FA4);
    cursor: pointer;
    transition: 0.3s;
}

.button-container button:hover
{
    background-image: linear-gradient(to right, #636FA4, #E8CBC0);
}

@media(max-width:600px)
{
    .Container
    {
        min-width: 280px;
    }

    .content
    {
        min-width: 380px;
        overflow: auto;
    }

    .input-box
    {
        margin-bottom: 12px;
        width: 100%;
    }

    .input-box:nth-child(2n)
    {
        justify-content: space-between;
    }

    .gender-catergory
    {
        display: flex;
        justify-content: space-between;
        width: 60%;
    }

    .content::-webkit-scrollbar
    {
        width: 0;
    }
}

</style>

</head>

<body> <!--this is the body class. most of the codes will be here-->
    <div class="Container"> <!--this block level tag to contain all the required codes-->

        <form action="UserRegisterConfirmed.php" method="post"> <!--this will add the new user into the database-->

            <h2>Register as a new User</h2> <!--heading for student registration-->

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