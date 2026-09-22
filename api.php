<?php
header('Content-Type: application/json');
require_once 'db.php';

$type = isset($_GET['type']) ? $_GET['type'] : '';
$max_rent = isset($_GET['max_rent']) ? $_GET['max_rent'] : '';

$sql = "SELECT * FROM properties WHERE 1=1";

if (!empty($type)) {
    $type = $conn->real_escape_string($type);
    $sql .= " AND type = '$type'";
}

if (!empty($max_rent)) {
    $max_rent = (float)$max_rent;
    $sql .= " AND rent <= $max_rent";
}

$result = $conn->query($sql);
$properties = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $properties[] = $row;
    }
}

echo json_encode($properties);
$conn->close();
?>