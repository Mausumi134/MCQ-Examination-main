<?php
// Database connection configuration
$host = 'localhost'; // Database host
$dbname = 'mcq'; // Database name
$db_username = 'root'; // Database username
$db_password = ''; // Database password

// Create connection to the database
$conn = new mysqli($host, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['uname'];
    $password = $_POST['pwd'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the statement
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        // Redirect to login page after successful signup
        header('Location: login.php?signup=success');
        exit();
    } else {
        // Redirect back to signup page with an error message
        header('Location: signup.php?error=user_exists');
        exit();
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
