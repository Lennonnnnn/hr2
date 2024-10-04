<?php
    // Database connection
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "hr2";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $your_name = $_POST['your_name'];
        $recipients_name = $_POST['recipients_name'];
        $performance_area = $_POST['performance_area'];
        $recognition_message = $_POST['recognition_message'];

        $sql = "INSERT INTO recognition_db (your_name, recipients_name, performance_area, recognition_message)
                VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $your_name, $recipients_name, $performance_area, $recognition_message);

        if ($stmt->execute()) {
            echo '<div class="alert alert-success" role="alert">Recognition submitted successfully!</div>';
        header("Location: ../main/recognitions.php");
        exit();
        } else {
            echo '<div class="alert alert-danger" role="alert">Error: ' . $stmt->error . '</div>';
        }

        $stmt->close();
    }
    ?>