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

// Get form data with validation
$firstName = isset($_POST['firstname']) ? trim($_POST['firstname']) : '';
$lastName = isset($_POST['lastname']) ? trim($_POST['lastname']) : '';
$Email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';
$confirm_password = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';
$role = isset($_POST['role']) ? trim($_POST['role']) : '';
$position = isset($_POST['position']) ? trim($_POST['position']) : '';
$department = isset($_POST['department']) ? trim($_POST['department']) : '';

// Basic validation
if (empty($firstName) || empty($lastName) || empty($Email) || empty($password) || empty($confirm_password) || empty($role) || empty($position) || empty($department)) {
    echo json_encode(['error' => 'All fields are required.']);
    exit();
}

// Check if passwords match
if ($password !== $confirm_password) {
    echo json_encode(['error' => 'Passwords do not match.']);
    exit();
}

// Check if the email already exists
$sql = "SELECT COUNT(*) FROM employee_register WHERE email = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(['error' => 'Prepare failed: ' . $conn->error]);
    exit();
}

$stmt->bind_param("s", $Email);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

if ($count > 0) {
    echo json_encode(['error' => 'This email is already registered.']);
    exit();
}

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute SQL statement
$sql = "INSERT INTO employee_register (firstname, lastname, email, password, role, position, department) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode(['error' => 'Prepare failed: ' . $conn->error]);
    exit();
}

$stmt->bind_param("sssssss", $firstName, $lastName, $Email, $hashedPassword, $role, $position, $department);

if ($stmt->execute()) {
    echo json_encode(['success' => 'Registration successful!']);
} else {
    echo json_encode(['error' => 'Error: ' . $stmt->error]);
}

// Close connection
$stmt->close();
$conn->close();
?>
