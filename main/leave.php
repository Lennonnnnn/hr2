<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Request Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: black;
        }
        .container {
            background-color: #343a40;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #ffffff;
            animation: rainbowText 3s linear infinite; /* Rainbow animation for text */
        }
        label {
            color: #ffffff;
        }
        .form-control {
            height: 38px; /* Reduced height for shorter input fields */
        }
        .form-group {
            margin-bottom: 15px; /* Reduced bottom margin for compactness */
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease; /* Smooth transition */
        }
        .btn-primary:hover {
            animation: rainbow 1s linear infinite; /* Start rainbow animation */
            border-color: #0056b3;
            transform: scale(1.05); /* Scale effect on hover */
            box-shadow: 0 4px 20px rgba(0, 123, 255, 0.5); /* Box shadow on hover */
        }

        @keyframes rainbow {
            0% { background-color: red; }
            14% { background-color: orange; }
            28% { background-color: yellow; }
            42% { background-color: green; }
            57% { background-color: blue; }
            71% { background-color: indigo; }
            85% { background-color: violet; }
            100% { background-color: red; }
        }

        @keyframes rainbowText {
            0% { color: red; }
            14% { color: orange; }
            28% { color: yellow; }
            42% { color: green; }
            57% { color: blue; }
            71% { color: indigo; }
            85% { color: violet; }
            100% { color: red; }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Leave Request Form</h2>
        <form id="leaveForm" action="submit_leave.php" method="post">
            <div class="form-group">
                <label for="employee_name">Employee Name:</label>
                <input type="text" class="form-control" id="employee_name" name="employee_name" required>
            </div>

            <div class="form-group">
                <label for="employee_id">Employee ID:</label>
                <input type="text" class="form-control" id="employee_id" name="employee_id" required>
            </div>

            <div class="form-group">
                <label for="Department">Department:</label>
                <select id="Department" name="Department" class="form-control" required>
                    <option value="Marketing and Business Department">Marketing</option>
                    <option value="Finance and Accounting Department">Finance</option>
                    <option value="Human Resources Department">HR</option>
                    <option value="Customer Service and Service Department">Customer Service</option>
                </select>
            </div>

            <div class="form-group">
                <label for="leave_type">Type of Leave:</label>
                <select id="leave_type" name="leave_type" class="form-control" required>
                    <option value="Sick Leave">Sick Leave</option>
                    <option value="Vacation Leave">Vacation Leave</option>
                    <option value="Emergency Leave">Emergency Leave</option>
                    <option value="Maternity Leave">Maternity Leave</option>
                </select>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>

            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" class="form-control" id="end_date" name="end_date" required>
            </div>

            <div class="form-group">
                <label for="reason">Reason:</label>
                <textarea id="reason" name="reason" class="form-control" rows="3" required></textarea>
            </div>

            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#confirmationModal">
                Submit Leave Request
            </button>
        </form>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Submission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to submit this leave request?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmSubmit">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Waiting for Approval Modal -->
    <div class="modal fade" id="waitingForApprovalModal" tabindex="-1" role="dialog" aria-labelledby="waitingForApprovalModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="waitingForApprovalModalLabel">Waiting for Approval</h5>
                </div>
                <div class="modal-body">
                    Your leave request is being processed. Please wait for approval.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="okayButton">Okay</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('confirmSubmit').addEventListener('click', function() {
            $('#confirmationModal').modal('hide');
            $('#waitingForApprovalModal').modal('show');
        });

        document.getElementById('okayButton').addEventListener('click', function() {
            $('#waitingForApprovalModal').modal('hide');
            document.getElementById('leaveForm').submit();
        });
    </script>
</body>
</html>
