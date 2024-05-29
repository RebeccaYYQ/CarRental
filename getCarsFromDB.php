<?php
//get wanted cars from the DB, based on a query
header('Content-Type: application/json'); 

$conn = new mysqli("localhost", "root", "", "progintas2");
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Get the car_id from the request
$car_id = isset($_GET['car_id']) ? intval($_GET['car_id']) : 0;

// set SQL select
$query = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';

$sql = "SELECT * FROM cars WHERE 
        type LIKE ? OR 
        brand LIKE ? OR 
        model LIKE ? OR 
        fuel_type LIKE ? OR 
        transmission LIKE ? OR
        car_id LIKE ?";

$stmt = $conn->prepare($sql);

// Bind the parameters, using wildcards for the LIKE operator
$searchTerm = '%' . $query . '%';
$stmt->bind_param('ssssss', $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm);

//get result and return as JSON
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($outp);

$stmt->close();
$conn->close();
