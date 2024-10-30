<?php
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

session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['uname'];
    $password = $_POST['pwd'];

    // Prepare the statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Login successful
            $_SESSION['username'] = $username; // Store username in session
            echo "<script>alert('Login successful');</script>";
            header('Location: index2.php');
            exit();
        } else {
            // Incorrect password
            echo "<script>alert('Invalid username or password');</script>";
            header('Location: index.php');
            exit();
        }
    } else {
        // User not found
        echo "<script>alert('Invalid username or password');</script>";
        header('Location: index.php');
        exit();
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
