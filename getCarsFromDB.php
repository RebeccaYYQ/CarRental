<?php
header('Content-Type: application/json'); 

$conn = new mysqli("localhost", "root", "", "progintas2");
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Get the car_id from the request
$car_id = isset($_GET['car_id']) ? intval($_GET['car_id']) : 0;

// set SQL select
$stmt = $conn->prepare("SELECT * FROM cars");
// $stmt = $conn->prepare("SELECT * FROM cars WHERE car_id = ?");
// $stmt->bind_param("i", $car_id);

//get result and return as JSON
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($outp);

$stmt->close();
$conn->close();
