<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select a Supplier</title>

    <!-- 
        IONICONS (ICON LIBRARY)
        These 2 script links allow us to use <ion-icon> without downloading anything.
        The first script works for modern browsers (module).
        The second is for older browsers (nomodule).
    -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <style>

body 
{
    margin: 0;
    padding: 0;
    background-color: #0B1623;   /* Dark navy background */
    font-family: Arial, Helvetica, sans-serif;
    color: white;                /* Default text color */
}

/* 
    MAIN PAGE WRAPPER
    Centers all content and adds spacing at the top and bottom.
*/
.container 
{
    text-align: center;          /* Centers text */
    padding: 40px 20px;          /* Space around content */
    max-width: 1200px;           /* Prevents content from being too wide */
    margin: auto;                /* Centers horizontally */
}

/* TITLE TEXT STYLING */
.title 
{
    font-size: 42px;
    font-weight: 800;            /* Very bold */
    margin-bottom: 10px;
}

/* SUBTEXT BELOW TITLE */
.subtitle 
{
    color: #cdd0d4;              /* Light grey */
    margin-bottom: 40px;
    font-size: 18px;
}

/* 
    FLEXBOX CONTAINER FOR THE 3 SUPPLIER CARDS
    Cards will align next to each other automatically.
*/
.cards 
{
    display: flex;
    justify-content: space-between; /* Space between the cards */
    flex-wrap: wrap;                /* Allows cards to move to next row on small screens */
    gap: 25px;                      /* Space between cards */
}

/* 
    BASIC STYLING FOR EACH CARD
    All cards share this; color is added separately.
*/
.card 
{
    padding: 30px;                 /* Space inside */
    border-radius: 15px;           /* Rounded corners */
    width: 30%;                    /* 3 cards per row */
    min-width: 260px;              /* Keeps cards readable on small screens */
    text-align: left;              /* Text inside cards aligned left */
    box-sizing: border-box;        /* Prevents padding from changing width */
}

/* 
    GRADIENT BACKGROUND COLORS FOR EACH SUPPLIER CARD
*/
.banbury 
{
    background: linear-gradient(135deg, #6d4aff, #9a7cff);
}

.cerebro 
{
    background: linear-gradient(135deg, #0ba67f, #1ec8a7);
}

.plutonium 
{
    background: linear-gradient(135deg, #b13cff, #d979ff);
}

/* 
    ICON STYLING: size + spacing 
*/
.icon 
{
    font-size: 45px;
    margin-bottom: 15px;
}

/* SUPPLIER NAME */
.card h2 
{
    font-size: 26px;
    margin: 5px 0 10px 0;
    font-weight: 700;
}

/* SUPPLIER DESCRIPTION */
.card p 
{
    margin-bottom: 20px;
    color: #f1f1f1;               /* Softer white */
}

/* "Browse Books" Link */
.card a 
{
    color: white;                 /* White text */
    text-decoration: none;        /* Removes underline */
    font-weight: 600;
}

    </style>

</head>

<body>

    <!-- MAIN WRAPPER FOR THE WHOLE PAGE -->
    <section class="container">

        <!-- PAGE TITLE -->
        <h1 class="title">SELECT A BOOK SUPPLIER</h1>

        <!-- SHORT SUBTEXT BELOW THE TITLE -->
        <p class="subtitle">
            Browse high-quality book collections directly from our three primary distributors.
        </p>

        <!-- CARD HOLDER (flexbox container) -->
        <div class="cards">

            <!-- ========================== -->
            <!-- BANBURY CARD               -->
            <!-- ========================== -->
            <div class="card banbury">

                <!-- Icon for Banbury (using Ionicons) -->
                <ion-icon name="book-outline" class="icon"></ion-icon>

                <!-- Supplier Title -->
                <h2>BANBURY</h2>

                <!-- Supplier Description -->
                <p>Access their full catalog of curated literature.</p>

                <!-- Link to browse books -->
                <a href="CatalogBanbury.php">Browse Banbury Books →</a>
            </div>


            <!-- ========================== -->
            <!-- CEREBRO CARD               -->
            <!-- ========================== -->
            <div class="card cerebro">

                <!-- Icon representing technology/science -->
                <ion-icon name="shield-checkmark-outline" class="icon"></ion-icon>

                <h2>CEREBRO</h2>

                <p>Explore titles focused on science, tech, and innovation.</p>

                <a href="CatalogCerebro.php">Browse Cerebro Books →</a>
            </div>


            <!-- ========================== -->
            <!-- PLUTONIUM CARD             -->
            <!-- ========================== -->
            <div class="card plutonium">

                <!-- Icon representing fantasy/exciting books -->
                <ion-icon name="sparkles-outline" class="icon"></ion-icon>

                <h2>PLUTONIUM</h2>

                <p>Find popular fiction, fantasy, and exciting new releases.</p>

                <a href="CatalogPlutonium.php">Browse Plutonium Books →</a>
            </div>

        </div> <!-- END OF CARDS WRAPPER -->

    </section> <!-- END OF MAIN CONTAINER -->

</body>

</html>
