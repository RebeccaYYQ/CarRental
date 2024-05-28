<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="script.js"></script>
    <title>Grocery Mart</title>
</head>

<body>
    <header class="flex">
        <a href="index.php" class="flex"><img id="shopIcon" src="images/carIcon.png">
            <h1>Car Rental</h1>
        </a>
        <div class="align-right flex">
            <form method="POST" action="index.php" class="flex" id="searchBar">
                <input type="text" id="search" name="searchQuery" placeholder="Search cars" size="47">
                <button id="searchButton" type="submit" class="align-right"><span
                        class="material-symbols-outlined">search</span></button>
            </form>
            <a href="cart.php" class="flex">
                <span class="material-symbols-outlined md-60">shopping_cart</span>
                <span id="cartQuantity">0</span>
            </a>
        </div>
    </header>
    <?php require 'nav.html'; ?>
    
    <main>
        
        <h2>$title</h2>
        <section class='itemGrid flex'>
            <div class='productItem flex'>
                <img src='images/audi-a3.jpg' class='productItemImage'>
                <p class='productItemContent'><b>Brand Model</b><br>
                    Type | $xxx per day<br>
                    xx seats, {transmission}, {fueltype}<br>
                    Amount available: xxx<br> 
                    Mileage:<br></p>
                <button class='rentBtn' type='button' onClick='itemGridCart("minus")'>Rent</button>
            </div>
            <div class='productItem flex'>
                <img src='images/audi-a3.jpg' class='productItemImage'>
                <p class='productItemContent'><b>Brand Model</b><br>
                    Type | $xxx per day<br>
                    xx seats, {transmission}, {fueltype}<br>
                    Amount available: xxx<br> 
                    Mileage:<br></p>
                <button class='rentBtn' type='button' onClick='itemGridCart("minus")'>Rent</button>
            </div>
        </section>
    </main>

</body>

</html>