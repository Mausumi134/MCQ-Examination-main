<?php
$host = 'localhost';
$dbname = 'mcq';
$db_username = 'root';
$db_password = '';

$conn = new mysqli($host, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['uname'];
    $password = $_POST['pwd'];

    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username;
            header('Location: index2.php');
            exit();
        } else {
            header('Location: index.php?error=Invalid%20password');
            exit();
        }
    } else {
        header('Location: index.php?error=Invalid%20username%20or%20password');
        exit();
    }
}

$stmt->close();
$conn->close();
?>
