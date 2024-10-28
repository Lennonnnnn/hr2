<?php
session_start();

// Database configuration
$servername = "localhost";
$username = "root";        
$password = "";            
$dbname = "hr2";           

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(['error' => 'Connection failed: ' . $conn->connect_error]);
    exit();
}

// Get employee ID from request
$employeeId = isset($_POST['e_id']) ? trim($_POST['e_id']) : '';

// Basic validation
if (empty($employeeId)) {
    echo json_encode(['error' => 'Employee ID is required.']);
    exit();
}

// First, delete related leave requests
$deleteLeaveRequestsSql = "DELETE FROM leave_requests WHERE e_id = ?";
$leaveStmt = $conn->prepare($deleteLeaveRequestsSql);
if ($leaveStmt === false) {
    echo json_encode(['error' => 'Prepare failed: ' . $conn->error]);
    exit();
}

$leaveStmt->bind_param("i", $employeeId);
$leaveStmt->execute();
$leaveStmt->close(); // Close the leave statement

// Now delete the employee
$sql = "DELETE FROM employee_register WHERE e_id = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    echo json_encode(['error' => 'Prepare failed: ' . $conn->error]);
    exit();
}

$stmt->bind_param("i", $employeeId);

if ($stmt->execute()) {
    echo json_encode(['success' => 'Employee deleted successfully!']);
} else {
    echo json_encode(['error' => 'Error: ' . $stmt->error]);
}

// Close connection
$stmt->close();
$conn->close();
?>
