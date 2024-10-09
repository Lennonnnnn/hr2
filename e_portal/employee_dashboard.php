<?php
session_start();
if (!isset($_SESSION['e_id']))  {
    header("Location: ../e_portal/employee_login.php"); // Redirect to login if not logged in
    exit();
}

// Database configuration
$servername = "localhost";
$username = "root";        
$password = "";            
$dbname = "hr2";           

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user info
$employeeId = $_SESSION['e_id'];
$sql = "SELECT firstname, middlename, lastname, email, role FROM employee_register WHERE e_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employeeId);
$stmt->execute();
$result = $stmt->get_result();
$employeeInfo = $result->fetch_assoc();
$stmt->close();
$conn->close();

$profilePicture = !empty($employeeInfo['profile_picture']) ? $employeeInfo['profile_picture'] : '../img/defaultpfp.png';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Employee Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css?v=<?php echo time(); ?>" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  </head>
  <style>
  .calendar-cell {
            width: 40px;
            height: 30px;
            line-height: 30px;
            margin: 1px;
            text-align: center;
            cursor: pointer;
            box-sizing: border-box;
        }

        .empty-cell {
            background-color: transparent;
        }

        .holiday {
            background-color: #dc3545;
            color: white;
        }

        #calendar {
            max-width: 300px;
            margin: auto;
        }
    

.bg-danger {
    background-color: #dc3545 !important; /* Bootstrap danger color */
}

.text-white {
    color: white !important;
}

.border {
    border: 1px solid #dee2e6;
}

.shadow-sm {
    box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075);
}

.header {
    display: flex;
    justify-content: space-between; /* Space between prev, month/year, next buttons */
    align-items: center; /* Align items vertically */
    margin-bottom: 10px; /* Space below header */
}

.header button {
    padding: 5px 10px; /* Add padding to buttons for better clickability */
}

.days-row {
    display: flex; 
    justify-content: space-between; /* Space between days of the week */
    margin-bottom: 5px; /* Add spacing below days row */
}

.days-container {
    display: flex;
    flex-wrap: wrap; /* Wrap days into rows */
}

  </style>

<body class="sb-nav-fixed bg-light">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3 text-light" href="../e_portal/employee_dashboard.php">Employee Portal</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars text-dark"></i></button>
           <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                   
           </form>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
             <li class="nav-item text-dark d-flex flex-column align-items-start">
        <span class="big text-light mb-1">
            <?php echo htmlspecialchars($employeeInfo['firstname'] . ' ' . $employeeInfo['middlename'] . ' ' . $employeeInfo['lastname']); ?>
        </span>
        <span class="big text-light">
            <?php echo htmlspecialchars($employeeInfo['role']); ?>
        </span>
    </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-dark" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../img/defaultpfp.png" class="rounded-circle border border-dark" width="40" height="40" />
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="../e_portal/e_profile.php">Profile</a></li>
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="../e_portal/employee_login.php" onclick="confirmLogout(event)">Logout</a></li>

                </ul>
          </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu ">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading text-center bg-warning text-dark">Logo</div>
                        
                       
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTAD" aria-expanded="false" aria-controls="collapseTAD">
                            <div class="sb-nav-link-icon"><i class="fa fa-address-card"></i></div>
                            Time and Attendance
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseTAD" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../main/tad_display.php">QR for Attendance</a>
                                <a class="nav-link" href="../main/tad_timesheet.php">View Record Attendance</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLM" aria-expanded="false" aria-controls="collapseLM">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar-times"></i></div>
                            Leave Management
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLM" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../e_portal/leave_update.php">File Leave Request</a>
                                <a class="nav-link" href="../e_portal/leave_balance.php">View Remaining Leave</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePM" aria-expanded="false" aria-controls="collapsePM">
                            <div class="sb-nav-link-icon"><i class="fas fa-line-chart"></i></div>
                            Performance Management
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePM" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../e_portal/employee_department.php">Evaluation</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSR" aria-expanded="false" aria-controls="collapseSR">
                            <div class="sb-nav-link-icon"><i class="fa fa-address-card"></i></div>
                            Social Recognition
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseSR" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../e_portal/e_recognition.php">View Your Rating</a>
                            </nav>
                        </div>
                       
                        </div>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as: <?php echo htmlspecialchars($employeeInfo['firstname'] . ' ' . $employeeInfo['lastname']); ?></div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
    <main class="container">
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-6">
                <div class="card mb-3 h-75"> <!-- Changed mb-4 to mb-3 and h-100 to h-75 -->
                    <div class="card-header bg-primary text-white small-card-header"> <!-- Optional: Add a class for smaller headers -->
                        Announcements
                    </div>
                    <div class="card-body small-card-body"> <!-- Optional: Add a class for smaller body text -->
                        <p style="font-size: 0.9rem;">Stay updated with the latest news and events.</p> <!-- Smaller text size -->
                        <ul style="font-size: 0.9rem;"> <!-- Smaller font for list -->
                            <li><a href="../forms/company_meeting.php" class="text-white">Company meeting on October 15th at 10 AM.</a></li>
                            <li><a href="../forms/benefits_package.php" class="text-white">New benefits package available starting November.</a></li>
                            <li><a href="../forms/holiday_party.php" class="text-white">Holiday party scheduled for December 20th.</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-3 h-75"> <!-- Changed mb-4 to mb-3 and h-100 to h-75 -->
                    <div class="card-header bg-info text-white small-card-header"> <!-- Optional: Add a class for smaller headers -->
                        Calendar
                    </div>
                    <div class="card-body small-card-body"> <!-- Optional: Add a class for smaller body text -->
                        <div class="calendar-wrapper" id="calendar"></div>
                        <div class="todo-list mt-3">
                            <h5 class="text-white" style="font-size: 1rem;">To-Do List</h5> <!-- Smaller To-Do List header size -->
                            <input type="text" id="todoInput" class="form-control mb-2" placeholder="Add a new task..." style="font-size: 0.9rem;"> <!-- Smaller input size -->
                            <button id="addTodoBtn" class="btn btn-light btn-sm">Add Task</button> <!-- Smaller button size -->
                            <ul id="todoList" class="list-unstyled mt-2" style="font-size: 0.9rem;"></ul> <!-- Smaller font for list -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

    </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto bg-dark">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/e_dashboard.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../src/assets/demo/chart-area-demo.js"></script>
    <script src="../src/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
    <script>
    // Initialize the current date
    let currentDate = new Date();

        function renderCalendar() {
            const calendar = document.getElementById('calendar');
            calendar.innerHTML = '';

            const header = document.createElement('div');
            header.classList.add('d-flex', 'justify-content-between', 'align-items-center', 'mb-3');

            const prevButton = document.createElement('button');
            prevButton.innerText = 'Prev';
            prevButton.classList.add('btn', 'btn-sm', 'btn-outline-primary');
            prevButton.onclick = () => {
                currentDate.setMonth(currentDate.getMonth() - 1);
                renderCalendar();
            };
            header.appendChild(prevButton);

            const monthYear = document.createElement('div');
            monthYear.innerText = `${currentDate.toLocaleString('default', { month: 'long' })} ${currentDate.getFullYear()}`;
            monthYear.classList.add('fw-bold');
            header.appendChild(monthYear);

            const nextButton = document.createElement('button');
            nextButton.innerText = 'Next';
            nextButton.classList.add('btn', 'btn-sm', 'btn-outline-primary');
            nextButton.onclick = () => {
                currentDate.setMonth(currentDate.getMonth() + 1);
                renderCalendar();
            };
            header.appendChild(nextButton);

            calendar.appendChild(header);

            const yearSelector = document.createElement('select');
            yearSelector.classList.add('form-select', 'form-select-sm', 'mt-2', 'mb-3');
            for (let year = 2020; year <= 2030; year++) {
                const option = document.createElement('option');
                option.value = year;
                option.innerText = year;
                if (year === currentDate.getFullYear()) {
                    option.selected = true;
                }
                yearSelector.appendChild(option);
            }
            yearSelector.onchange = function () {
                currentDate.setFullYear(this.value);
                renderCalendar();
            };
            calendar.appendChild(yearSelector);

            const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            const daysRow = document.createElement('div');
            daysRow.classList.add('d-flex', 'justify-content-between', 'text-muted', 'mb-2');
            daysOfWeek.forEach(day => {
                const dayElement = document.createElement('div');
                dayElement.innerText = day;
                dayElement.classList.add('calendar-cell');
                daysRow.appendChild(dayElement);
            });
            calendar.appendChild(daysRow);

            const firstDayOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1).getDay();
            const lastDateOfMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();

            const daysContainer = document.createElement('div');
            daysContainer.classList.add('d-flex', 'flex-wrap');
            for (let i = 0; i < firstDayOfMonth; i++) {
                const blankCell = document.createElement('div');
                blankCell.classList.add('calendar-cell', 'empty-cell');
                daysContainer.appendChild(blankCell);
            }

            for (let date = 1; date <= lastDateOfMonth; date++) {
                const dayCell = document.createElement('div');
                dayCell.innerText = date;
                dayCell.classList.add('calendar-cell', 'border');

                if (isHoliday(date, currentDate.getMonth())) {
                    dayCell.classList.add('holiday');
                }

                daysContainer.appendChild(dayCell);
            }

            calendar.appendChild(daysContainer);
        }

        function isHoliday(date, month) {
            return (date === 1 && month === 0) || // New Year's Day
                   (date === 25 && month === 11) || // Christmas
                   (date === 1 && month === 10); // November 1st
        }

        renderCalendar();
</script>



</body>

</html>