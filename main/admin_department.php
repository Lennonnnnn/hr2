<?php

    include '../db/db_conn.php';
        function getDepartmentData($conn, $department) {
            $employeeQuery = "SELECT COUNT(*) as total FROM employee_register WHERE department = '$department'";
            $employeeResult = $conn->query($employeeQuery);
            $totalEmployees = $employeeResult->fetch_assoc()['total'];

            $evaluatedQuery = "SELECT COUNT(*) as evaluated FROM admin_evaluations WHERE department = '$department'";
            $evaluatedResult = $conn->query($evaluatedQuery);
            $evaluated = $evaluatedResult->fetch_assoc()['evaluated'];
            $pendingEmployees = $totalEmployees - $evaluated;

            return array('total' => $totalEmployees, 'evaluated' => $evaluated, 'pending' => $pendingEmployees);
        }

// Fetch data for different departments
            $financeData = getDepartmentData($conn, 'Finance Department');
            $hrData = getDepartmentData($conn, 'Human Resources Department');
            $operationsData = getDepartmentData($conn, 'Operations Department');
            $riskData = getDepartmentData($conn, 'Risk Department');
            $marketingData = getDepartmentData($conn, 'Marketing Department');
            $itData = getDepartmentData($conn, 'IT Department');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
    /* Global cursor pointer for clickable elements */
a.btn, .department-toggle {
  cursor: pointer;
}

/* Global button styles */
.btn {
  position: relative;
  display: inline-block;
  padding: 12px 20px;
  background-color: #f8f9fa;
  color: #212529;
  border: 2px solid #212529;
  border-radius: 8px;
  text-transform: uppercase;
  font-weight: bold;
  transition: all 0.3s ease;
  box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
}

.btn:hover {
  background-color: #343a40;
  color: #fff;
  transform: translateY(-3px);
  box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
}

.btn:active {
  transform: translateY(0);
  box-shadow: none;
}

/* Card design */
.card {
  border-radius: 12px;
  overflow: hidden;
  background: linear-gradient(145deg, #252c38, #1a1e25);
  box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.3), -5px -5px 15px rgba(255, 255, 255, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
}

.card-body {
  background-color: darkslategrey;/* Adjusted for consistency */
  padding: 20px;
  color: #fff;
  font-size: 1.1rem;
}

.card-footer {
  background-color: #333; /* Default background */
  color: #f1f1f1;
  border: 2px solid #444;
  transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
}

.card-footer:hover {
  background-color: #709A29; /* Greenish background on hover */
  color: #e6eed6; /* Light text color on hover */
  transform: translateY(-5px); /* Slight lift effect */
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Shadow for depth */
}


.department-toggle {
  cursor: pointer;
}

.card-footer .small {
  font-size: 0.9rem;
}

.collapse .card-body {
    
    background-color: black;
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.125);

  color: #212529;
}

/* Progress bar styling */
.progress {
  background-color: #f1f1f1;
  border-radius: 10px;
  height: 20px;
  overflow: hidden;
  box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
}

.progress-bar {
  transition: width 0.6s ease;
}

.bg-success {
  background-color: #28a745;
}

.bg-warning {
  background-color: #ffc107;
  color: #212529;
}

</style>
<body class="bg-dark">
<main>
    <div class="container-fluid px-3">
        <h1 class="mt-5 text-center text-light">Admin Evaluation Dashboard</h1>
        <div class="row justify-content-center">
             <div class="col-xl-4 col-md-6 mt-5">
                <div class="card mb-4">
                    <div class="card-body bg-primary text-center">
                        <a href="../main/finance.php" class="btn card-button text-dark font-weight-bold bg-light border border-dark w-100">Finance Department</a>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between bg-dark border border-light department-toggle" data-target="#financeInfo">
                        <div class="small text-warning">Click to View Details</div>
                        <div class="small text-warning">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </div>
                    <div id="financeInfo" class="collapse bg-dark text-dark">
                        <div class="card-body">
                            <h5 class="text-center mb-4 text-light">Finance Department Evaluation Status</h5>
                            <div class="text-center mb-3">
                                <span class="badge badge-primary mx-1">Total Employees: <?php echo $financeData['total']; ?></span>
                                <span class="badge badge-success mx-1">Evaluated: <?php echo $financeData['evaluated']; ?></span>
                                <span class="badge badge-warning mx-1">Pending Evaluation: <?php echo $financeData['pending']; ?></span>
                            </div>
                            <div class="progress mb-2">
                               <?php if ($financeData['total'] > 0): ?>
                        <div class="progress-bar bg-success font-weight-bold" role="progressbar" 
                            style="width: <?php echo ($financeData['evaluated'] / $financeData['total']) * 100; ?>%;" 
                            aria-valuenow="<?php echo $financeData['evaluated']; ?>" 
                            aria-valuemin="0" 
                            aria-valuemax="<?php echo $financeData['total']; ?>">
                             Evaluated (<?php echo $financeData['evaluated']; ?>)
                        </div>
                        <div class="progress-bar bg-warning text-dark font-weight-bold" role="progressbar" 
                            style="width: <?php echo ($financeData['pending'] / $financeData['total']) * 100; ?>%;" 
                            aria-valuenow="<?php echo $financeData['pending']; ?>" 
                            aria-valuemin="0" 
                            aria-valuemax="<?php echo $financeData['total']; ?>">
                            Pending (<?php echo $financeData['pending']; ?>)
                        </div>
                    <?php else: ?>
                        <div class="progress-bar bg-secondary font-weight-bold w-100" role="progressbar" 
                             aria-valuenow="0" 
                             aria-valuemin="0" 
                             aria-valuemax="100">
                             No employees available
                        </div>
                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-xl-4 col-md-6 mt-5">
                <div class="card mb-4">
                    <div class="card-body bg-primary text-center">
                        <a href="../main/hr.php" class="btn card-button text-dark font-weight-bold bg-light border border-dark w-100">Human Resources Department</a>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between bg-dark border border-light department-toggle" data-target="#hrInfo">
                        <div class="small text-warning">Click to View Details</div>
                        <div class="small text-warning">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </div>
                    <div id="hrInfo" class="collapse bg-dark text-dark">
                        <div class="card-body">
                            <h5 class="text-center mb-4 text-light">Human Resources Evaluation Status</h5>
                            <div class="text-center mb-3">
                                <span class="badge badge-primary mx-1">Total Employees: <?php echo $hrData['total']; ?></span>
                                <span class="badge badge-success mx-1">Evaluated: <?php echo $hrData['evaluated']; ?></span>
                                <span class="badge badge-warning mx-1">Pending Evaluation: <?php echo $hrData['pending']; ?></span>
                            </div>
                            <div class="progress mb-2">
                               <?php if ($hrData['total'] > 0): ?>
                        <div class="progress-bar bg-success font-weight-bold" role="progressbar" 
                             style="width: <?php echo ($hrData['evaluated'] / $hrData['total']) * 100; ?>%;" 
                            aria-valuenow="<?php echo $hrData['evaluated']; ?>" 
                            aria-valuemin="0" 
                            aria-valuemax="<?php echo $hrData['total']; ?>">
                             Evaluated (<?php echo $hrData['evaluated']; ?>)
                        </div>
                        <div class="progress-bar bg-warning text-dark font-weight-bold" role="progressbar" 
                            style="width: <?php echo ($hrData['pending'] / $hrData['total']) * 100; ?>%;" 
                            aria-valuenow="<?php echo $hrData['pending']; ?>" 
                            aria-valuemin="0" 
                            aria-valuemax="<?php echo $hrData['total']; ?>">
                            Pending (<?php echo $hrData['pending']; ?>)
                        </div>
                    <?php else: ?>
                        <div class="progress-bar bg-secondary font-weight-bold w-100" role="progressbar" 
                             aria-valuenow="0" 
                             aria-valuemin="0" 
                             aria-valuemax="100">
                             No employees available
                        </div>
                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-xl-4 col-md-6 mt-5">
                <div class="card mb-4">
                    <div class="card-body bg-primary text-center">
                        <a href="../main/operations.php" class="btn card-button text-dark font-weight-bold bg-light border border-dark w-100">Operations Department</a>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between bg-dark border border-light department-toggle" data-target="#operationsInfo">
                        <div class="small text-warning">Click to View Details</div>
                        <div class="small text-warning">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </div>
                    <div id="operationsInfo" class="collapse bg-dark text-dark">
                        <div class="card-body">
                            <h5 class="text-center mb-4 text-light">Opearations Evaluation Status</h5>
                            <div class="text-center mb-3">
                                <span class="badge badge-primary mx-1">Total Employees: <?php echo $operationsData['total']; ?></span>
                                <span class="badge badge-success mx-1">Evaluated: <?php echo $operationsData['evaluated']; ?></span>
                                <span class="badge badge-warning mx-1">Pending Evaluation: <?php echo $operationsData['pending']; ?></span>
                            </div>
                            <div class="progress mb-2">
                               <?php if ($operationsData['total'] > 0): ?>
                        <div class="progress-bar bg-success font-weight-bold" role="progressbar" 
                             style="width: <?php echo ($operationsData['evaluated'] / $operationsData['total']) * 100; ?>%;" 
                            aria-valuenow="<?php echo $operationsData['evaluated']; ?>" 
                            aria-valuemin="0" 
                            aria-valuemax="<?php echo $operationsData['total']; ?>">
                             Evaluated (<?php echo $operationsData['evaluated']; ?>)
                        </div>
                        <div class="progress-bar bg-warning text-dark font-weight-bold" role="progressbar" 
                            style="width: <?php echo ($operationsData['pending'] / $operationsData['total']) * 100; ?>%;" 
                            aria-valuenow="<?php echo $operationsData['pending']; ?>" 
                            aria-valuemin="0" 
                            aria-valuemax="<?php echo $operationsData['total']; ?>">
                            Pending (<?php echo $operationsData['pending']; ?>)
                        </div>
                    <?php else: ?>
                        <div class="progress-bar bg-secondary font-weight-bold w-100" role="progressbar" 
                             aria-valuenow="0" 
                             aria-valuemin="0" 
                             aria-valuemax="100">
                             No employees available
                        </div>
                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mt-5">
                <div class="card mb-4">
                    <div class="card-body bg-primary text-center">
                        <a href="../main/risk.php" class="btn card-button text-dark font-weight-bold bg-light border border-dark w-100">Risk Department</a>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between bg-dark border border-light department-toggle" data-target="#riskInfo">
                        <div class="small text-warning">Click to View Details</div>
                        <div class="small text-warning">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </div>
                    <div id="riskInfo" class="collapse bg-dark text-dark">
                        <div class="card-body">
                            <h5 class="text-center mb-4 text-light">Risk Evaluation Status</h5>
                            <div class="text-center mb-3">
                                <span class="badge badge-primary mx-1">Total Employees: <?php echo $riskData['total']; ?></span>
                                <span class="badge badge-success mx-1">Evaluated: <?php echo $riskData['evaluated']; ?></span>
                                <span class="badge badge-warning mx-1">Pending Evaluation: <?php echo $riskData['pending']; ?></span>
                            </div>
                            <div class="progress mb-2">
                               <?php if ($riskData['total'] > 0): ?>
                        <div class="progress-bar bg-success font-weight-bold" role="progressbar" 
                             style="width: <?php echo ($riskData['evaluated'] / $riskData['total']) * 100; ?>%;" 
                            aria-valuenow="<?php echo $riskData['evaluated']; ?>" 
                            aria-valuemin="0" 
                            aria-valuemax="<?php echo $riskData['total']; ?>">
                             Evaluated (<?php echo $riskData['evaluated']; ?>)
                        </div>
                        <div class="progress-bar bg-warning text-dark font-weight-bold" role="progressbar" 
                            style="width: <?php echo ($riskData['pending'] / $riskData['total']) * 100; ?>%;" 
                            aria-valuenow="<?php echo $riskData['pending']; ?>" 
                            aria-valuemin="0" 
                            aria-valuemax="<?php echo $riskData['total']; ?>">
                            Pending (<?php echo $riskData['pending']; ?>)
                        </div>
                    <?php else: ?>
                        <div class="progress-bar bg-secondary font-weight-bold w-100" role="progressbar" 
                             aria-valuenow="0" 
                             aria-valuemin="0" 
                             aria-valuemax="100">
                             No employees available
                        </div>
                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mt-5">
                <div class="card mb-4">
                    <div class="card-body bg-primary text-center">
                        <a href="../main/marketing.php" class="btn card-button text-dark font-weight-bold bg-light border border-dark w-100">Marketing Department</a>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between bg-dark border border-light department-toggle" data-target="#marketingInfo">
                        <div class="small text-warning">Click to View Details</div>
                        <div class="small text-warning">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </div>
                    <div id="marketingInfo" class="collapse bg-dark text-dark">
                        <div class="card-body">
                            <h5 class="text-center mb-4 text-light">Marketing Evaluation Status</h5>
                            <div class="text-center mb-3">
                                <span class="badge badge-primary mx-1">Total Employees: <?php echo $marketingData['total']; ?></span>
                                <span class="badge badge-success mx-1">Evaluated: <?php echo $marketingData['evaluated']; ?></span>
                                <span class="badge badge-warning mx-1">Pending Evaluation: <?php echo $marketingData['pending']; ?></span>
                            </div>
                            <div class="progress mb-2">
                               <?php if ($marketingData['total'] > 0): ?>
                        <div class="progress-bar bg-success font-weight-bold" role="progressbar" 
                             style="width: <?php echo ($marketingData['evaluated'] / $marketingData['total']) * 100; ?>%;" 
                            aria-valuenow="<?php echo $marketingData['evaluated']; ?>" 
                            aria-valuemin="0" 
                            aria-valuemax="<?php echo $marketingData['total']; ?>">
                             Evaluated (<?php echo $marketingData['evaluated']; ?>)
                        </div>
                        <div class="progress-bar bg-warning text-dark font-weight-bold" role="progressbar" 
                            style="width: <?php echo ($marketingData['pending'] / $marketingData['total']) * 100; ?>%;" 
                            aria-valuenow="<?php echo $marketingData['pending']; ?>" 
                            aria-valuemin="0" 
                            aria-valuemax="<?php echo $marketingData['total']; ?>">
                            Pending (<?php echo $marketingData['pending']; ?>)
                        </div>
                    <?php else: ?>
                        <div class="progress-bar bg-secondary font-weight-bold w-100" role="progressbar" 
                             aria-valuenow="0" 
                             aria-valuemin="0" 
                             aria-valuemax="100">
                             No employees available
                        </div>
                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mt-5">
                <div class="card mb-4">
                    <div class="card-body bg-primary text-center">
                        <a href="../main/it.php" class="btn card-button text-dark font-weight-bold bg-light border border-dark w-100">IT Department</a>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between bg-dark border border-light department-toggle" data-target="#itInfo">
                        <div class="small text-warning">Click to View Details</div>
                        <div class="small text-warning">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </div>
                    <div id="itInfo" class="collapse bg-dark text-dark">
                        <div class="card-body">
                            <h5 class="text-center mb-4 text-light">It Evaluation Status</h5>
                            <div class="text-center mb-3">
                                <span class="badge badge-primary mx-1">Total Employees: <?php echo $itData['total']; ?></span>
                                <span class="badge badge-success mx-1">Evaluated: <?php echo $itData['evaluated']; ?></span>
                                <span class="badge badge-warning mx-1">Pending Evaluation: <?php echo $itData['pending']; ?></span>
                            </div>
                            <div class="progress mb-2">
                               <?php if ($itData['total'] > 0): ?>
                        <div class="progress-bar bg-success font-weight-bold" role="progressbar" 
                             style="width: <?php echo ($itData['evaluated'] / $itData['total']) * 100; ?>%;" 
                            aria-valuenow="<?php echo $itData['evaluated']; ?>" 
                            aria-valuemin="0" 
                            aria-valuemax="<?php echo $itData['total']; ?>">
                             Evaluated (<?php echo $itData['evaluated']; ?>)
                        </div>
                        <div class="progress-bar bg-warning text-dark font-weight-bold" role="progressbar" 
                            style="width: <?php echo ($itData['pending'] / $itData['total']) * 100; ?>%;" 
                            aria-valuenow="<?php echo $itData['pending']; ?>" 
                            aria-valuemin="0" 
                            aria-valuemax="<?php echo $itData['total']; ?>">
                            Pending (<?php echo $itData['pending']; ?>)
                        </div>
                    <?php else: ?>
                        <div class="progress-bar bg-secondary font-weight-bold w-100" role="progressbar" 
                             aria-valuenow="0" 
                             aria-valuemin="0" 
                             aria-valuemax="100">
                             No employees available
                        </div>
                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Add event listener to all elements with class "department-toggle"
    document.querySelectorAll('.department-toggle').forEach(function (toggle) {
        toggle.addEventListener('click', function () {
            const target = this.getAttribute('data-target');
            const icon = this.querySelector('i');

            // Toggle the collapse
            $(target).collapse('toggle');

            // Toggle the icon classes between angle-down and angle-up
            icon.classList.toggle('fa-angle-down');
            icon.classList.toggle('fa-angle-up');
        });
    });
</script>
</body>
</html>