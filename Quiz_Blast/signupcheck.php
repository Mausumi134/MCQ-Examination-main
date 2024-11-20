<?php
$host = 'localhost';
$dbname = 'mcq';
$db_username = 'root';
$db_password = '';

$conn = new mysqli($host, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['uname'];
    $password = $_POST['pwd'];

    if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z]).{5,}$/', $username)) {
        header('Location: signup.php?error=invalid_username');
        exit();
    }

    // Validate password step-by-step
    if (strlen($password) < 4) {
        header('Location: signup.php?error=password_too_short');
        exit();
    } else if (!preg_match('/[A-Z]/', $password)) {
        header('Location: signup.php?error=password_missing_uppercase');
        exit();
    } else if (!preg_match('/[a-z]/', $password)) {
        header('Location: signup.php?error=password_missing_lowercase');
        exit();
    } else if (!preg_match('/\d/', $password)) {
        header('Location: signup.php?error=password_missing_digit');
        exit();
    } else if (!preg_match('/[@$!%*?&]/', $password)) {
        header('Location: signup.php?error=password_missing_special');
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
       
        header('Location: index.php?signup=success');
        exit();
    } else {
     
        header('Location: signup.php?error=user_exists');
        exit();
    }

}

$stmt->close();
$conn->close();
?>
