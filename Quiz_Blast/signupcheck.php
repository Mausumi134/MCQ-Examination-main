<?php
$host = 'sql203.infinityfree.com'; 
$dbname = 'if0_37699836_mcq'; 
$db_username = 'if0_37699836'; 
$db_password = 'LE6eGyY2hsEXxc';


$conn = new mysqli($host, $db_username, $db_password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['uname'];
    $password = $_POST['pwd'];

 
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
       
        header('Location: login.php?signup=success');
        exit();
    } else {
     
        header('Location: signup.php?error=user_exists');
        exit();
    }

    $stmt->close();
}


$conn->close();
?>
