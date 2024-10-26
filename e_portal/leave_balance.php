<?php
session_start();
include '../db/db_conn.php';

// Ensure the employee is logged in
if (!isset($_SESSION['e_id'])) {
    die("Error: You must be logged in.");
}

// Get the logged-in employee's ID from the session
$employee_id = $_SESSION['e_id'];

// Fetch the employee's details from the database
$sql = "SELECT e_id, firstname, lastname, role, department, available_leaves FROM employee_register WHERE e_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employee_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if the employee's data was found
if ($result->num_rows > 0) {
    $employee = $result->fetch_assoc();
} else {
    die("Error: Employee data not found.");
}

// Close the database connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Tracker</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #333;
        }
        .container {
            background-color: #444;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        .text-light {
            color: #fff;
        }
        .table {
            color: #fff;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #555;
        }
        .table-striped tbody tr:nth-of-type(even) {
            background-color: #666;
        }
        .form-control {
            background-color: #555;
            color: #fff;
            border: 1px solid #666;
        }
        .form-control:focus {
            background-color: #666;
            border: 1px solid #fff;
        }
        .btn-white {
            background-color: #FFFFFF; /* Super white */
            color: #000; /* Black text */
            border: 1px solid #000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            border-radius: 5px; /* Default border radius */
        }

        .btn-white:hover {
            background: #E0E0E0; /* Light gray on hover for contrast */
            color: black; /* Text color */
            border: 2px solid #000; /* Slightly thicker border */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            transform: translateY(-6px) scale(1.05); /* Increase raise effect */
        }

        .modal-content {
            background-color: #444;
        }
        .modal-header {
            background-color: #555;
            border-bottom: 1px solid #666;
        }
        .modal-footer {
            background-color: #555;
            border-top: 1px solid #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center text-light">Leave Tracker</h1>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th style="color: white;">Employee ID</th>
                    <th style="color: white;">Name</th>
                    <th style="color: white;">Role</th>
                    <th style="color: white;">Department</th>
                    <th style="color: white;">Remaining Leave</th>
                </tr>
            </thead>
            <tbody id="leave-table">
                <tr>
                    <td><?php echo htmlspecialchars($employee['e_id']); ?></td>
                    <td><?php echo htmlspecialchars($employee['firstname'] . ' ' . $employee['lastname']); ?></td>
                    <td><?php echo htmlspecialchars($employee['role']); ?></td>
                    <td><?php echo htmlspecialchars($employee['department']); ?></td>
                    <td><?php echo htmlspecialchars($employee['available_leaves']); ?> remaining</td>
                </tr>
            </tbody>
        </table>
    </div>
      <div class="text-center mb-5 mt-4">
            <a href="../e_portal/employee_dashboard.php" class="btn btn-white">Back to Dashboard</a>
        </div>

</body>
</html>