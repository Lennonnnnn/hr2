<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root"; // Default username
$password = ""; // Default password
$dbname = "hr2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

$data = json_decode(file_get_contents("php://input"), true);
$qrData = $data['qrData'];

// Split the QR code data (assuming it's in the format: id,name,role)
list($employee_id, $name, $role) = explode(',', $qrData);

$time_now = date('Y-m-d H:i:s');

// Insert attendance record
$sql = "INSERT INTO attendance (employee_id, name, role, time_in) VALUES ('$id', '$e_name', '$e_role', '$e_time_now')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>
