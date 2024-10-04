<?php
session_start();

// Include database connection
include '../db/db_conn.php'; 

// Ensure the user is logged in and is an employee
if (!isset($_SESSION['user_id'])) {
    echo "Please log in to view your evaluation.";
    exit;
}

$employeeId = $_SESSION['user_id'];

// Fetch the average of the employee's evaluations
$sql = "SELECT 
            AVG(quality) AS avg_quality, 
            AVG(communication_skills) AS avg_communication_skills, 
            AVG(teamwork) AS avg_teamwork, 
            AVG(punctuality) AS avg_punctuality, 
            AVG(initiative) AS avg_initiative,
            COUNT(*) AS total_evaluations 
        FROM admin_evaluations 
        WHERE e_id = ?";
        
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employeeId);
$stmt->execute();
$result = $stmt->get_result();

// Check if evaluations exist
if ($result->num_rows > 0) {
    $evaluation = $result->fetch_assoc();
} else {
    echo "No evaluations found.";
    exit;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Evaluation</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Your Evaluation Results</h2>
        <p>Total number of evaluations: <?php echo htmlspecialchars($evaluation['total_evaluations']); ?></p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Average Rating</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Quality of Work</td>
                    <td><?php echo htmlspecialchars(number_format($evaluation['avg_quality'], 2)); ?></td>
                </tr>
                <tr>
                    <td>Communication Skills</td>
                    <td><?php echo htmlspecialchars(number_format($evaluation['avg_communication_skills'], 2)); ?></td>
                </tr>
                <tr>
                    <td>Teamwork</td>
                    <td><?php echo htmlspecialchars(number_format($evaluation['avg_teamwork'], 2)); ?></td>
                </tr>
                <tr>
                    <td>Punctuality</td>
                    <td><?php echo htmlspecialchars(number_format($evaluation['avg_punctuality'], 2)); ?></td>
                </tr>
                <tr>
                    <td>Initiative</td>
                    <td><?php echo htmlspecialchars(number_format($evaluation['avg_initiative'], 2)); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
