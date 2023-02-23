<?php
$sort_by = $_POST['sort_by'] ?? 'price_asc';

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'cars');

// Prepare the sorting query
switch ($sort_by) {
  case 'price_asc':
    $query = "SELECT * FROM cars ORDER BY hire_cost ASC";
    break;
  case 'price_desc':
    $query = "SELECT * FROM cars ORDER BY hire_cost DESC";
    break;
  case 'capacity_asc':
    $query = "SELECT * FROM cars ORDER BY capacity ASC";
    break;
  case 'capacity_desc':
    $query = "SELECT * FROM cars ORDER BY capacity DESC";
    break;
}

// Execute the query
$result = mysqli_query($conn, $query);

// Fetch the car listings
$cars = [];
while ($row = mysqli_fetch_assoc($result)) {
  $cars[] = $row;
}

// Close the connection
mysqli_close($conn);
