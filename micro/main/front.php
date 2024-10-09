<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Selection</title>
    <style>
        /* Global Styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #333; /* Dark background */
            color: #777; /* Muted text color */
            padding: 50px;
        }
        
        /* Header Styles */
        h1 {
            margin-bottom: 30px;
            font-size: 36px;
            font-weight: bold;
            color: #fff; /* White text for header */
            text-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a subtle shadow to header */
        }
        
        /* Button Container Styles */
     /* Button Container Styles */
.button-container {
    display: flex;
    justify-content: center;
    gap: 30px;
    margin-top: 200px;
    padding: 20px;
    border-radius: 10px;
    color: white;
}

.button-container button {
    display: flex; /* Use flexbox */
    padding-left: 150px;
    padding-right: 150px;
    padding-top: 40px;
    padding-bottom: 40px;
    justify-content: center; /* Horizontally center the text */
    align-items: center; /* Vertically center the text */
    width: 250px; /* Fixed width */
    height: 60px; /* Fixed height */
    font-size: 20px; /* Adjust the font size */
    border-radius: 5px; /* Rounded corners */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Subtle shadow */
    border: 1px solid rgba(255, 255, 255, 0.1); /* Subtle border */
    margin: 10px; /* Add margin */
    text-align: center; /* Center the text */
    font-weight: bold; /* Make text bold */
}

/* Button Styles */
.login-button.admin {
    background-color: #2ecc71; /* Green for admin */
}
.login-button.admin:hover {
    background-color: #1e8651;
}
.login-button.employee {
    background-color: #e67e73; /* Red for employee */
}
.login-button.employee:hover {
    background-color: #c0392b;
}

/* Add some animations to the buttons */
.login-button {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.1);
    }
    100% {
        transform: scale(1);
    }
}

    </style>
</head>
<body>

    <h1>Select Login Type</h1>
    <div class="button-container">
        <button class="button-container login-button admin text-light" onclick="location.href='../main/adminlogin.php'">Admin Login</button>
        <button class="button-container login-button employee text-light" onclick="location.href='../e_portal/employee_login.php'">Employee Login</button>
    </div>

</body>
</html>