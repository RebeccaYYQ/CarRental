<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Grocery Mart</title>
</head>

<!-- AJAX call to PHP server to get data and display it -->
<script>
    $(document).ready(function() {
        //var carId = $('#carIdInput').val(); // Get the car ID from input
        $.ajax({
            url: 'getCarsFromDB.php',
            type: 'GET',
            //data: { car_id: carId }, // Send the car_id
            success: function(data) {
                var car;
                for (var i = 0; i < data.length; i++) {
                    car = data[i];
                    $('#result').append(`<p>Car ID: ${car.car_id} Model: ${car.model} </p>`);
                }
            },
            error: function(xhr, status, error) {
                $('#result').html('Error: ' + error);
            }
        });

    });
</script>

<body>
    <header class="flex">
        <a href="index.php" class="flex"><img id="shopIcon" src="images/carIcon.png">
            <h1>Car Rental</h1>
        </a>
        <div class="align-right flex">
            <form method="POST" action="index.php" class="flex" id="searchBar">
                <input type="text" id="search" name="searchQuery" placeholder="Search cars" size="47">
                <button id="searchButton" type="submit" class="align-right"><span class="material-symbols-outlined">search</span></button>
            </form>
            <a href="cart.php" class="flex">
                <span class="material-symbols-outlined md-60">shopping_cart</span>
                <span id="cartQuantity">0</span>
            </a>
        </div>
    </header>
    <?php require 'nav.html'; ?>

    <main>
        <section class='itemGrid flex' id="result">
        </section>
    </main>

</body>

</html>