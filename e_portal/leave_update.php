<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Request Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-dark text-muted">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 border border-light rounded p-4 mt-5">
                <form id="leave-request-form">
                    <h2 class="text-center text-light">Leave Request Form</h2>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="first-name" class="text-muted">First Name:</label>
                                <input type="text" class="form-control text-muted" id="first-name" placeholder="Enter your first name">
                            </div>
                            <div class="col-md-6">
                                <label for="last-name" class="text-muted">Last Name:</label>
                                <input type="text" class="form-control text-muted" id="last-name" placeholder="Enter your last name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="role" class="text-muted">Role:</label>
                                <select class="form-control text-muted" id="role">
                                    <option value="">Select a role</option>
                                    <option value="admin">Admin</option>
                                    <option value="manager">Manager</option>
                                    <option value="employee">Employee</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="department" class="text-muted">Department:</label>
                                <div class="input-group">
                                    <select class="form-control text-muted" id="department">
                                        <option value="">Select a department</option>
                                        <option value="hr">HR</option>
                                        <option value="finance">Finance</option>
                                        <option value="marketing">Marketing</option>
                                    </select>
                                    <div class="input-group-append">
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="start-date" class="text-muted">Start Date:</label>
                                <input type="date" class="form-control text-muted" id="start-date">
                            </div>
                            <div class="col-md-6">
                                <label for="end-date" class="text-muted">End Date:</label>
                                <input type="date" class="form-control text-muted" id="end-date">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="leave-type" class="text-muted">Type of Leave:</label>
                        <select class="form-control text-muted" id="leave-type">
                            <option value="">Select a leave type</option>
                            <option value="annual">Annual Leave</option>
                            <option value="sick">Sick Leave</option>
                            <option value="family">Family Leave</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="reason" class="text-muted">Reason for Leave:</label>
                        <textarea class="form-control text-muted" id="reason" placeholder="Enter the reason for your leave"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-muted  border border-muted text-muted">Submit Leave</button>
                    </div>
                    <div class="text-center mt-3">
                        <a class="btn btn-muted border border-muted text-light" href="../e_portal/leave_balance.php">Check Remaining Leave</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js"></script>
    <script src="../js/leave.js"></script>
</body>
</html>
