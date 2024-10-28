<?php
session_start();
include '../db/db_conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $e_id = $_POST['e_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    // Validate inputs (basic example, you may want to do more)
    if (empty($e_id) || empty($firstname) || empty($lastname) || empty($email) || empty($role) || empty($phone_number) || empty($address)) {
        echo json_encode(['error' => 'All fields are required.']);
        exit;
    }

    // Prepare and execute the update statement
    $stmt = $conn->prepare("UPDATE employee_register SET firstname=?, lastname=?, email=?, role=?, phone_number=?, address=? WHERE e_id=?");
    $stmt->bind_param("ssssssi", $firstname, $lastname, $email, $role, $phone_number, $address, $e_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => 'Employee updated successfully.']);
    } else {
        echo json_encode(['error' => 'Failed to update employee.']);
    }

    $stmt->close();
}

$conn->close();
?>
