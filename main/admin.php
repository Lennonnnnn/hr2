<?php
session_start();

include '../db/db_conn.php';

// Fetch admin data
$sql = "SELECT a_id, firstname, lastname, email, role, phone_number, address FROM admin_register WHERE role='Admin'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
    <div class="container mt-5">
        <h2 class="mb-4 text-light">Admin Account Management</h2>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr class="text-center text-light">
                    <th>Admin ID</th>
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
                            <td><?php echo $row['a_id']; ?></td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td><?php echo $row['phone_number']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td>
                                <button class="btn btn-success btn-sm"  onclick="fillUpdateForm(<?php echo $row['a_id']; ?>, '<?php echo $row['firstname']; ?>', '<?php echo $row['lastname']; ?>', '<?php echo $row['email']; ?>', '<?php echo $row['role']; ?>', '<?php echo $row['phone_number']; ?>', '<?php echo $row['address']; ?>')">Update</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteAdmin(<?php echo $row['a_id']; ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="8" class="text-center">No admin records found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
            <div class="d-flex justify-content-between mt-4 mb-0">
                <a class="btn btn-primary text-light" href="../main/registeradmin.php">Create Admin</a>
                <a class="btn btn-primary text-light" href="../main/index.php">Back</a>
            </div>
              <!-- Button to trigger the modal (optional) -->
             
<!-- Modal Structure -->
<div class="modal fade" id="updateAdminModal" tabindex="-1" aria-labelledby="updateAdminModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light">
           <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title" id="updateAdminModalLabel">Update Admin Account</h5>
            </div>

            <div class="modal-body">
                <form id="updateForm">
                    <input type="hidden" name="a_id" id="updateId"> <!-- Hidden input for Admin ID -->
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
                            <option value="Admin">Admin</option>
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
                        <!-- Close button using the custom closeModal() function -->
                        <button type="button" class="btn btn-secondary" onclick="closeModal()">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Include Bootstrap JS (if not already included) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

      

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
       let modalInstance;

function fillUpdateForm(id, firstname, lastname, email, role, phone_number, address) {
    // Populate the form fields
    document.getElementById('updateId').value = id;
    document.querySelector('input[name="firstname"]').value = firstname;
    document.querySelector('input[name="lastname"]').value = lastname;
    document.querySelector('input[name="email"]').value = email;
    document.querySelector('select[name="role"]').value = role;
    document.querySelector('input[name="phone_number"]').value = phone_number;
    document.querySelector('input[name="address"]').value = address;

    // Create modal instance
    modalInstance = new bootstrap.Modal(document.getElementById('updateAdminModal'));

    // Show the modal
    modalInstance.show();
}

// Custom function to close the modal
function closeModal() {
    if (modalInstance) {
        modalInstance.hide(); // Manually hide the modal
    }
}

        function deleteAdmin(adminId) {
            if (confirm('Are you sure you want to delete this admin?')) {
                const formData = new FormData();
                formData.append('a_id', adminId);
                fetch('../main/delete_admin.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => alert(data.success || data.error))
                .then(() => location.reload());
            }
        }

        document.getElementById('updateForm').onsubmit = function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch('../main/update_admin.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => alert(data.success || data.error))
            .then(() => location.reload());
        };
    </script>
</body>
</html>

<?php
$conn->close();
?>