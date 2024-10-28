<?php
session_start();
include '../db/db_conn.php';

// Fetch employee data
$sql = "SELECT e_id, firstname, lastname, email, role, phone_number, address FROM employee_register WHERE role='employee'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .btn {
            transition: transform 0.3s ease;
            border-radius: 50px;
        }

        .btn:hover {
            transform: translateY(-4px); /* Raise effect on hover */
        }

        table {
            margin-top: 20px; /* Space above the table */
        }
    </style>
</head>
<body class="bg-dark">
    <div class="container mt-5">
        <h2 class="mb-4 text-light text-center">Employee Account Management</h2>
        <table class="table table-bordered table-dark">
            <thead class="thead-light">
                <tr class="text-center text-light">
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr class="text-center text-light">
                            <td><?php echo htmlspecialchars($row['e_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                            <td><?php echo htmlspecialchars($row['lastname']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['role']); ?></td>
                            <td><?php echo htmlspecialchars($row['phone_number']); ?></td>
                            <td><?php echo htmlspecialchars($row['address']); ?></td>
                            <td>
                                <button class="btn btn-success btn-sm" 
                                        onclick="fillUpdateForm(<?php echo $row['e_id']; ?>, '<?php echo htmlspecialchars($row['firstname']); ?>', '<?php echo htmlspecialchars($row['lastname']); ?>', '<?php echo htmlspecialchars($row['email']); ?>', '<?php echo htmlspecialchars($row['role']); ?>', '<?php echo htmlspecialchars($row['phone_number']); ?>', '<?php echo htmlspecialchars($row['address']); ?>')">Update</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteEmployee(<?php echo $row['e_id']; ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="8" class="text-center">No records found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-between mt-4 mb-0">
            <a class="btn btn-primary text-light" href="../main/register_employee.php">Create Employee</a>
            <a class="btn btn-primary text-light" href="../main/index.php">Back</a>
        </div>

        <div class="modal fade" id="updateEmployeeModal" tabindex="-1" aria-labelledby="updateEmployeeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-dark text-light">
                    <div class="modal-header d-flex justify-content-center">
                        <h5 class="modal-title" id="updateEmployeeModalLabel">Update Employee Account</h5>
                    </div>
                    <div class="modal-body">
                        <form id="updateForm">
                            <input type="hidden" name="e_id" id="updateId">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control" name="role" required>
                                    <option disabled selected>Select a role</option>
                                    <option value="Employee">Employee</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Address" required>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-secondary" onclick="closeModal()">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        let modalInstance;

        function fillUpdateForm(id, firstname, lastname, email, role, phone_number, address) {
            document.getElementById('updateId').value = id;
            document.querySelector('input[name="firstname"]').value = firstname;
            document.querySelector('input[name="lastname"]').value = lastname;
            document.querySelector('input[name="email"]').value = email;
            document.querySelector('select[name="role"]').value = role;
            document.querySelector('input[name="phone_number"]').value = phone_number;
            document.querySelector('input[name="address"]').value = address;

            modalInstance = new bootstrap.Modal(document.getElementById('updateEmployeeModal'));
            modalInstance.show();
        }

        function closeModal() {
            if (modalInstance) {
                modalInstance.hide();
            }
        }

        function deleteEmployee(id) {
            if (confirm('Are you sure you want to delete this employee?')) {
                const formData = new FormData();
                formData.append('e_id', id);

                fetch('delete_employee.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.success || data.error);
                    if (data.success) {
                        location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the employee.');
                });
            }
        }

        document.getElementById('updateForm').onsubmit = function(e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('../main/update_employee.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                alert(data.success || data.error);
                if (data.success) {
                    closeModal();
                    location.reload();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating the employee.');
            });
        };
    </script>
</body>
</html>

<?php
$conn->close();
?>
