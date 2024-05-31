<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
    <title>Car Rental</title>
</head>

<body>
    <header class="flex">
        <a href="index.php" class="flex"><img id="shopIcon" src="images/carIcon.png">
            <h1>Car Rental</h1>
        </a>
        <div class="align-right flex">
            <a href="reservations.php" class="flex align-center">
                <span class="material-symbols-outlined md-60">bookmark</span>
                <p><b>My Reservations</b></p>
            </a>
        </div>
    </header>

    <main>
        <h2>Order Confirmation</h2>
        <?php
        $email = $_REQUEST['email'];
        $name = $_REQUEST['name']; 

        echo "<p>Thanks for ordering $name!<br>
        An email with the order details will be sent to $email</p>"
        ?>
        <a href="index.php"><input type="button" value="Return to Home" class="resConfirmBtn" onclick=clearCarSelection()></a>
    </main>

</body>

</html>