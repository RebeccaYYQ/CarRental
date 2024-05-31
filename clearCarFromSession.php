<?php
session_start();
//remove the chosenCarId session variable
if (isset($_SESSION['chosenCarId'])) {
    unset($_SESSION['chosenCarId']);
    echo "carId session variable removed";
}