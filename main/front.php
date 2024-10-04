<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Selection</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background: radial-gradient(circle, rgba(0, 0, 0, 1) 0%, rgba(25, 25, 112, 1) 50%, rgba(138, 43, 226, 1) 100%);
            padding: 50px;
        }
        h1 {
            margin-bottom: 30px;
            animation: rainbowText 3s linear infinite; /* Rainbow animation for text */
        }
        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .login-button {
            padding: 15px 30px;
            font-size: 18px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .login-button:hover {
            background-color: #0056b3;
        }
        .login-button.admin {
            background-color: #28a745;
        }
        .login-button.admin:hover {
            background-color: #218838;
        }
        .login-button.employee {
            background-color: #ffc107;
        }
        .login-button.employee:hover {
            background-color: #e0a800;
        }
        .text-light {
            color: #f8f9fa; /* Light color */
            font-weight: lighter; /* Optional for a lighter weight */
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

    <h1 class="text-light">Select Login Type</h1>
    <div class="button-container">
        <button class="login-button admin" 
                onmouseover="this.innerText='Thirdy Pogi'" 
                onmouseout="this.innerText='Admin Login'" 
                onclick="location.href='../main/adminlogin.php'">Admin Login</button>
        <button class="login-button employee" 
                onmouseover="this.innerText='Thirdy Mabaho '" 
                onmouseout="this.innerText='Employee Login'" 
                onclick="location.href='../e_portal/employee_login.php'">Employee Login</button>
    </div>

</body>
</html>
