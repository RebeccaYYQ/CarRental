<?php
session_start();

//if there is an AJAX sent here, and it sent carId across
if (isset($_POST['carId'])) {
    //set the session key of chosenCarId to the received Id
    $_SESSION['chosenCarId'] = $_POST['carId'];
    echo "Button value saved to session: " . $_SESSION['chosenCarId'];
}