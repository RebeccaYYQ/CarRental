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

<?php session_start(); ?>

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
        <h2>My Reservations</h2>
        <div class="flex">
            <section class='itemGrid flex' id="result">
            </section>
            <div class="resFormDisplay">
                <form id="resForm" class="flex" action="orderConfirm.php" onsubmit="return validEmail()" method="post">
                    <div>
                        <h3>Edit Rent Details</h3>
                        <label for="quantity">Quantity of Cars:</label>
                        <input type="number" id="quantityField" value="1" min="1" required><br>

                        <label for="startDate">Start Date:</label>
                        <input type="date" id="startDate" required><br>

                        <label for="endDate">End Date:</label>
                        <input type="date" id="endDate" required><br>

                        <p><b>Total cost:</b></p>
                    </div>
                    <div>
                        <h3>Submit Reservation</h3>
                        <label class="formLabel" for="name">Name:</label>
                        <input type="text" id="name" name="name" required><br>

                        <label for="mobile">Mobile Number:</label>
                        <input type="text" id="mobile" name="mobile" pattern="\d{10}" title="Please enter a 10-digit mobile number" required><br>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required><br>

                        <label for="license">Do you have a valid driver's licence?</label>
                        <select id="state" name="license" required>
                            <option value="">Select Option</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select><br>

                        <input type="submit" value="Submit" class="resConfirmBtn"><a href="index.php"><input type="button" value="Cancel" class="resCancelBtn" onclick=clearCarSelection()></a>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <script>
        //get the chosen car from session variables
        var chosenCarId = "<?php echo $_SESSION['chosenCarId']; ?>";
        if (chosenCarId != null) {
            console.log("carId: " + chosenCarId);
        }

        //when the document is ready, fill it with the car the user wanted. 
        $(document).ready(function() {
            getCarDetails(chosenCarId);
        });

        //get the chosen car's details for calculation, i.e. price and quantity
        // var carPrice = document.getElementById('car_price');
        // console.log(carPrice);
        
    </script>

</body>

</html>